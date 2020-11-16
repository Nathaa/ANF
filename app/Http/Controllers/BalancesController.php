<?php

namespace App\Http\Controllers;

use App\Balance;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\HomeController;
use DB;
Use Redirect;
use Illuminate\Support\Facades;

class BalancesController extends Controller
{
    
    //public function index(Request $request)
   // {

        
      //    $balances=balance::get();
       
        //  return redirect('balances');
          
    //}

   // public function index2(Request $request)
    //{

       
      //  $balances=DB::table('balances')
        //->join('cuentas','cuentas.id','=', 'balances.cuentas_id')
        //->select('balances.fecha_inicio','balances.fecha_final','balances.id')
        //->where('cuentas.empresas_id', $id)
        //->groupBy('balances.fecha_inicio','balances.fecha_final','balances.id')
       // ->get();
       

         // return view('balances2',compact('balances'));
    //}
    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        //DB::select("CALL micursor()");  

        //$balances=DB::table('balances')->get();
       
 
       $empresas=$id;
   
      $cuentas=DB::table('cuentas')
      ->join('empresas','cuentas.empresas_id','=', 'empresas.id')
      ->select('cuentas.nombre','cuentas.id','cuentas.codigo_padre')
      ->where('cuentas.empresas_id', $empresas)
      ->get();
      
        //$cuentas=Cuenta::findOrFail($id);
                
        return view('balances.edit',["cuentas"=>$cuentas],["empresas"=>$empresas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        if(count($request->nombre)>0)
        {
        

            foreach ($request->nombre as $key=>$value) {
                $balance = new balance;
                //balance::updateOrCreate($request->balances_id[$key]);
                $balance->nombre= $value;
                $balance->monto = $request->monto[$key];
                $balance->fecha_inicio = $request->get('fecha_inicio');
                $balance->fecha_final = $request->get('fecha_final');
                $balance->cuentas_id = $request->cuentas_id[$key];
                $balance->save();

                $fini =  $request->get('fecha_inicio');
                $ffin =  $request->get('fecha_final');
            }
            
        } 
        
          DB::select('CALL micursor2(?,?,?)',[$id,$fini,$ffin]); 
          DB::select('CALL micursor2(?,?,?)',[$id,$fini,$ffin]); 

          
          return redirect()->route('cuentas.index',compact('balance'));
         // return view('empresas.index',compact('balance'));
    }

    
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit2($id)
    {
        
        //DB::select("CALL micursor()");  

        //$fechas=DB::table('balances')->get();
 
       //$empresas=$id;
        $str_arr = preg_split("/\|/", $id);
        $x = $str_arr[0];
        $inicio = $str_arr[1];
        $final = $str_arr[2];

        //dd($id,$inicio,$final);

       $balances=DB::table('balances')
       ->select('balances.id','balances.nombre','balances.fecha_inicio','balances.fecha_final','balances.monto','balances.cuentas_id','cuentas.codigo_padre')
       ->join('cuentas','cuentas.id' ,'=', 'balances.cuentas_id')
       ->where('cuentas.empresas_id', $x)
    ->where('balances.fecha_inicio', $inicio)
   ->where('balances.fecha_final', $final)
   ->get();
        
 

       // $balances=balance::findOrFail($id);
        
        
        return view('balances.edit2',["balances"=>$balances],["id"=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update2(Request $request, $id)
    {
        //dd($id);

        $str_arr = preg_split("/\|/", $id);
        $emp = $str_arr[0];
        $inicio = $str_arr[1];
        $final = $str_arr[2];

        if(count($request->nombre)>0)
        { 
            foreach ($request->monto as $key=>$value) 
            {
                $balance = balance::find($request->get('balances_id')[$key]);
                $balance->id = $request->get('balances_id')[$key];
                $balance->monto =  $request->get('monto')[$key];
                $balance->fecha_inicio = $inicio;
                $balance->fecha_final = $final;
                //$balance->cuentas_id = $request->get('cuentas_id')[$key];
                $balance->update();

               
                    /*$asistencia = balance::find($request->get('id')[$key]);
                    $asistencia->balances_id = $request->get('id')[$key];
                    $asistencia->monto = $value;
                    $asistencia->fecha_inicial = $request->get('fecha_inicial')[$key];
                    $asistencia->fecha_final = $request->get('fecha_final')[$key];
                    $asistencia->update();*/
                
            }
        }
        /*DB::select('CALL micursor2(?,?,?)',[$id,$fini,$ffin]); 
        DB::select('CALL micursor2(?,?,?)',[$id,$fini,$ffin]); */
 
            return redirect('principal');


    }
    /**
     * Display the specified resource. 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
     
     $empress=($id);
    // dd($empress);

      $balances=DB::table('balances')
      ->join('cuentas','cuentas.id','=', 'balances.cuentas_id')
      ->select('balances.fecha_inicio','balances.fecha_final')
      ->where('cuentas.empresas_id', $id)
      ->groupBy('balances.fecha_inicio','balances.fecha_final')
      ->get();

          return view('balances.show',compact('balances','empress'));
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show1($id)
    {
        $fecha=($id);
       // dd($fecha);
        $str_arr = preg_split("/\|/", $id);
        $id = $str_arr[0];
        $inicio = $str_arr[1];
        $final = $str_arr[2];

        //dd($id,$inicio,$final);
      
        $balances=DB::table('balances')
        ->join('cuentas','cuentas.id' ,'=', 'balances.cuentas_id')
        ->where('cuentas.empresas_id', $id)
     ->where('balances.fecha_inicio', $inicio)
    ->where('balances.fecha_final', $final)
    ->get();
         
         
         return view('balances.show1',["balances"=>$balances]);
    }

   

  
    public function destroy($id)
    {
        //
  // $balance=balance::findOrFail($id);
      //$fecha=($id);
      //dd($fecha);

    $str_arr = preg_split("/\|/", $id);
    $ids = $str_arr[0];
    $inicio = $str_arr[1];
    $final = $str_arr[2];
     //dd($ids,$inicio,$final);

     $borrar=DB::table('balances')
     ->where('balances.fecha_inicio', $inicio)
     ->where('balances.fecha_final', $final)
     ->whereIn('balances.cuentas_id',function($query) use ($ids){
        $query->select('id')->from('cuentas')->where('cuentas.empresas_id',$ids);
     });
     
     $borrar->delete();
    return redirect()->back();
 }
}