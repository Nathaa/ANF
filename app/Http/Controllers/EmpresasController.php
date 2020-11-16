<?php

namespace App\Http\Controllers;
use App\Empresa;
use App\User;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
        //
        public function __construct()
        {
            $this->middleware('auth');
        }
    
    
        public function index($user_id)
        {
            /*if($request){
                $query = trim($request->get('search'));
            
                $empresas=DB::table('empresas as emp')
                ->join('users as us', 'us.id', '=', 'emp.user_id')
                ->select('emp.id','emp.nombre', 'emp.codigo', 'emp.rubro', 'emp.descripcion', 'us.name as nombre_usu')
                ->where('emp.nombre','LIKE','%'.$query.'%')
                ->orderBy('emp.id','asc')
                ->paginate(5);
                return view("empresas.index", ["empresas"=>$empresas, "search"=>$query]);
            
            }*/

            $empresa = Empresa::where("user_id", $user_id)->first();

            if($empresa){

            return view('empresas.index', compact('empresa'));
        
            }
            else{


                return view("empresas.create");

            }

        }

        public function index2($user_id)
        {
            /*
            if($request){
                $query = trim($request->get('search'));
            
                $empresas=DB::table('empresas as emp')
                ->join('users as us', 'us.id', '=', 'emp.user_id')
                ->select('emp.id','emp.nombre', 'emp.codigo', 'emp.rubro', 'emp.descripcion', 'us.name as nombre_usu')
                ->where('emp.nombre','LIKE','%'.$query.'%')
                ->orderBy('emp.id','asc')
                ->paginate(5);
                return view("empresas.index2", ["empresas"=>$empresas, "search"=>$query]);
            
            }

            */

            $empresa = Empresa::where("user_id", $user_id)->first();

            if($empresa){

            return view('empresas.index2', compact('empresa'));
        
            }
            else{


                return view("empresas.create");

            }
    
        }
   
        public function create()
        {
           
            return view("empresas.create");
        
        }
    
        public function store(Request $request)
        {
                $user = Auth::user();
                $empresa = $user->empresa;
                if(!$empresa) {
            
            $request->user()->empresa()->create([
                'nombre' => $request->nombre,
                'codigo' => $request->codigo,
                'descripcion' => $request->descripcion,
                'rubro' => $request->rubro
               
            ]);
            } else{
                Session::flash('info','Este usuario, ya tiene asignada una empresa');
              
            }

           
            return redirect()->to('empresas/'.$user->id);
          
           
           
        }
    
       
        public function show($id)
        {
            $empresa=empresa::findOrFail($id);
            return view('empresas.show', compact('empresa'));
            
        }
    
       
        public function edit($id)
        {
            $empresa=empresa::findOrFail($id);
            return view('empresas.edit',compact('empresa'));
            
           
        }
    
    
        public function update(Request $request,$id)
        {
            $empresa=Empresa::findOrFail($id);
            $empresa->update($request->all());
            return redirect()->route('empresas.index',compact('empresa'));
            
        }
    
     
        public function destroy($id)
        {
        
           Empresa::destroy($id);
            return back();
    
        }

  
}
