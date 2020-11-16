<?php

namespace App\Http\Controllers;

use App\Resultado;
use Illuminate\Http\Request;
use DB;

class ResultadosController extends Controller
{
    //

    public function index(Request $request)
    {

        
          $resultados=Resultado::get();
       

          return view('resultados.index',compact('resultados'));
    }

    
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        //DB::select("CALL micursor()");  

        //$resultados=DB::table('resultados')->get();
       
 
       $empresas=$id;
   
      $cuentas=DB::table('cuentas')
      ->join('empresas','cuentas.empresas_id','=', 'empresas.id')
      ->select('cuentas.nombre','cuentas.id','cuentas.codigo_padre')
      ->where('cuentas.empresas_id', $empresas)
      ->get();
      
        //$cuentas=Cuenta::findOrFail($id);
                
        return view('resultados.edit',["cuentas"=>$cuentas],["empresas"=>$empresas]);
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
                $resultado = new resultado;
                //resultado::updateOrCreate($request->resultados_id[$key]);
                $resultado->nombre= $value;
                $resultado->monto = $request->monto[$key];
                $resultado->fecha_inicio = $request->get('fecha_inicio');
                $resultado->fecha_final = $request->get('fecha_final');
                $resultado->cuentas_id = $request->cuentas_id[$key];
                $resultado->save();

                $fini =  $request->get('fecha_inicio');
                $ffin =  $request->get('fecha_final');
            }
            
        } 
        
          DB::select('CALL micursor2(?,?,?)',[$id,$fini,$ffin]); 
          DB::select('CALL micursor2(?,?,?)',[$id,$fini,$ffin]); 

          return redirect('principal');
          //return view('empresas2');
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

        //$fechas=DB::table('resultados')->get();
 
       //$empresas=$id;
       $str_arr = preg_split("/\|/", $id);
       $x = $str_arr[0];
       $inicio = $str_arr[1];
       $final = $str_arr[2];

       //dd($id,$inicio,$final);

      $resultados=DB::table('resultados')
      ->select('resultados.id','resultados.nombre','resultados.fecha_inicio','resultados.fecha_final','resultados.monto','resultados.cuentas_id','cuentas.codigo_padre')
      ->join('cuentas','cuentas.id' ,'=', 'resultados.cuentas_id')
      ->where('cuentas.empresas_id', $x)
   ->where('resultados.fecha_inicio', $inicio)
  ->where('resultados.fecha_final', $final)
  ->get();
         
        
        
        return view('resultados.edit2',["resultados"=>$resultados],["id"=>$id]);
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
                $resultado = resultado::find($request->get('resultados_id')[$key]);
                $resultado->id = $request->get('resultados_id')[$key];
                $resultado->monto =  $request->get('monto')[$key];
                $resultado->fecha_inicio = $inicio;
                $resultado->fecha_final = $final;
                //$resultado->cuentas_id = $request->get('cuentas_id')[$key];
                $resultado->update();

               
                    /*$asistencia = resultado::find($request->get('id')[$key]);
                    $asistencia->resultados_id = $request->get('id')[$key];
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

      $resultados=DB::table('resultados')
      ->join('cuentas','cuentas.id','=', 'resultados.cuentas_id')
      ->select('resultados.fecha_inicio','resultados.fecha_final')
      ->where('cuentas.empresas_id', $id)
      ->groupBy('resultados.fecha_inicio','resultados.fecha_final')
      ->get();

          return view('resultados.show',compact('resultados','empress'));
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
      
        $resultados=DB::table('resultados')
        ->join('cuentas','cuentas.id' ,'=', 'resultados.cuentas_id')
        ->where('cuentas.empresas_id', $id)
     ->where('resultados.fecha_inicio', $inicio)
    ->where('resultados.fecha_final', $final)
    ->get();
         
         
         return view('resultados.show1',["resultados"=>$resultados]);
    }

   

  
    public function destroy($id)
    {
        //
  // $resultado=resultado::findOrFail($id);
      //$fecha=($id);
      //dd($fecha);

    $str_arr = preg_split("/\|/", $id);
    $ids = $str_arr[0];
    $inicio = $str_arr[1];
    $final = $str_arr[2];
     //dd($ids,$inicio,$final);

     $borrar=DB::table('resultados')
     ->where('resultados.fecha_inicio', $inicio)
     ->where('resultados.fecha_final', $final)
     ->whereIn('resultados.cuentas_id',function($query) use ($ids){
        $query->select('id')->from('cuentas')->where('cuentas.empresas_id',$ids);
     });
     
     $borrar->delete();
    return redirect()->back();
 }
}
