<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cuenta;
use App\Empresa;
use App\Tipocuenta;
use DB;

class CuentasController extends Controller
{
    //
   


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $cuentas=Cuenta::paginate(4);
        $empresas = Empresa::get();


     
        //dd($balan);

      

        return view('cuentas.index',compact('cuentas','empresas'));


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresa = Empresa::get();
        $tipocuentas = Tipocuenta::get();
        return view('cuentas.create', ["empresa"=>$empresa, "tipocuentas" => $tipocuentas]);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cuentas = Cuenta::create($request->all());
        $cuentas->save();

        return redirect()->route('cuentas.index', ["cuentas" => $cuentas]);
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
        
        $empresas=$id;
   
      $cuentas=DB::table('cuentas')
      ->join('empresas','cuentas.empresas_id','=', 'empresas.id')
      ->select('cuentas.nombre','cuentas.codigo','cuentas.codigo_padre','cuentas.id')
      ->where('cuentas.empresas_id', $empresas)
      ->get();

        
      return view('cuentas.show',["cuentas"=>$cuentas],["empresas"=>$empresas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuentas=Cuenta::findOrFail($id);
        $empresa = Empresa::get();
        $tipocuentas = Tipocuenta::get();
      
        return view('cuentas.edit',['cuentas'=> $cuentas,'tipocuentas' => $tipocuentas, 'empresa' => $empresa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $cuentas=Cuenta::findOrFail($id);
        $cuentas->codigo = $request->input('codigo');
        $cuentas->codigo_padre = $request->input('codigo_padre');
        $cuentas->nombre = $request->input('nombre');
        $cuentas->descripcion = $request->input('descripcion');
        $cuentas->empresas_id = $request->get('empresas_id');
        $cuentas->tipocuentas_id = $request->get('tipocuentas_id');
        $cuentas->update();
        return redirect()->route('cuentas.index',['cuentas'=> $cuentas]);

            
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
  // $Cuenta=Cuenta::findOrFail($id);
  $empresas=$id;
   
   $cuentas = cuenta::where('cuentas.empresas_id', $empresas);
   $cuentas->delete();
   

 
  return redirect('cuentas');
 }


}