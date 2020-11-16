<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Tipocuenta;


class TipocuentasController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        
        if ($request)
       {
        $query=trim($request->get('search'));
        $tipocuenta= TipoCuenta::where('nombre', 'LIKE', '%' . $query . '%')
        ->orderBy('id','asc')
        ->paginate(5);
        return view('tipocuentas.index', ['tipocuenta' => $tipocuenta, 'search' => $query]);
        }


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipocuentas.create');
    
    }

 
    public function store(Request $request)
    {
            $tipocuenta = new Tipocuenta();
            $tipocuenta->nombre = $request->get('nombre');
            $tipocuenta->subtipo = $request->get('subtipo');
            $tipocuenta->descripcion = $request->get('descripcion');
            $tipocuenta->save();
            return redirect('tipocuentas');
          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipocuenta=TipoCuenta::findOrFail($id);
        return view('tipocuentas.show', compact('tipocuenta'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $tipocuenta=Tipocuenta::findOrFail($id);
        return view('tipocuentas.edit',compact('tipocuenta'));
       
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
        
        $tipocuenta=Tipocuenta::findOrFail($id);
        $tipocuenta->nombre = $request->input('nombre');
        $tipocuenta->subtipo = $request->input('subtipo');
        $tipocuenta->descripcion = $request->input('descripcion');
        $tipocuenta->update();
        return redirect()->route('tipocuentas.index',compact('tipocuenta'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Tipocuenta::destroy($id);
        return back();
      
    }
}
