<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Balance;
use Illuminate\Support\Facades\Input;
use Session;

class AnalisisController extends Controller
{
    //


    public function show($id)
    {
        //
     
     $empress=($id);

    //$fi=$id->fecha_inicial;
    
    //dd($fecha_inicial);

      $balances=DB::table('balances')
      ->join('cuentas','cuentas.id','=', 'balances.cuentas_id')
      ->select('balances.fecha_inicio','balances.fecha_final')
      ->where('cuentas.empresas_id', $id)
      ->groupBy('balances.fecha_inicio','balances.fecha_final')
      ->get();

       return view('analisis.show',compact('balances','empress'));
    }

    public function showR($id)
    {
        //
     
     $empress=($id);

    //$fi=$id->fecha_inicial;
    
    //dd($fecha_inicial);

      $resultados=DB::table('resultados')
      ->join('cuentas','cuentas.id','=', 'resultados.cuentas_id')
      ->select('resultados.fecha_inicio','resultados.fecha_final')
      ->where('cuentas.empresas_id', $id)
      ->groupBy('resultados.fecha_inicio','resultados.fecha_final')
      ->get();

       return view('analisisR.showR',compact('resultados','empress'));
    }

    public function show1($id)
    {
      $emp = $id;
      $fini = Input::get('fecha_inicial');
      $ffin = Input::get('fecha_final');
      setlocale(LC_TIME, "spanish");
      $mesanio1 = date("F",strtotime($fini)).' '.date("Y",strtotime($fini));       
      $mesanio2 = date("F",strtotime($ffin)).' '.date("Y",strtotime($ffin));  
       
      if (isset($_GET['AV']) && $_GET['AV'] == 'Generar Analisis Vertical') {
        // aqui ira analisis vertical        
        $balances=DB::select("Select d.nombre,round(c.monto/(select a.monto 
                                from balances a, cuentas b 
                            where b.empresas_id =d.empresas_id
                                and a.cuentas_id = b.id
                                and b.codigo_padre is null 
                                and b.codigo = 1
                                and a.fecha_inicio = c.fecha_inicio
                                and a.fecha_final = c.fecha_final) * 100,2) as AV
                        from balances c, cuentas d
                        where c.cuentas_id = d.id
                        and d.tipocuentas_id in(1,2)
                        and d.empresas_id=".$emp."
                        and c.fecha_inicio='".$fini."'
                        UNION
                        Select d.nombre,round(c.monto/(select a.monto 
                                from balances a, cuentas b 
                            where b.empresas_id =d.empresas_id
                                and a.cuentas_id = b.id
                                and b.codigo_padre is null 
                                and b.codigo = 2
                                and a.fecha_inicio = c.fecha_inicio
                                and a.fecha_final = c.fecha_final) * 100,2) as AV
                        from balances c, cuentas d
                        where c.cuentas_id = d.id
                        and d.tipocuentas_id in(3,4)
                        and d.empresas_id=".$emp."
                        and c.fecha_inicio='".$fini."'
                        UNION
                        Select d.nombre,round(c.monto/(select a.monto 
                                from balances a, cuentas b 
                            where b.empresas_id =d.empresas_id
                                and a.cuentas_id = b.id
                                and b.codigo_padre is null 
                                and b.codigo = 3
                                and a.fecha_inicio = c.fecha_inicio
                                and a.fecha_final = c.fecha_final) * 100,2) as AV
                        from balances c, cuentas d
                        where c.cuentas_id = d.id
                        and d.tipocuentas_id in(5)
                        and d.empresas_id=".$emp."
                        and c.fecha_inicio='".$fini."'");

        $balances2=DB::select("Select d.nombre,round(c.monto/(select a.monto 
                        from balances a, cuentas b 
                    where b.empresas_id =d.empresas_id
                        and a.cuentas_id = b.id
                        and b.codigo_padre is null 
                        and b.codigo = 1
                        and a.fecha_inicio = c.fecha_inicio
                        and a.fecha_final = c.fecha_final) * 100,2) as AV
                from balances c, cuentas d
                where c.cuentas_id = d.id
                and d.tipocuentas_id in(1,2)
                and d.empresas_id=".$emp."
                and c.fecha_final='".$ffin."'
                UNION
                Select d.nombre,round(c.monto/(select a.monto 
                        from balances a, cuentas b 
                    where b.empresas_id =d.empresas_id
                        and a.cuentas_id = b.id
                        and b.codigo_padre is null 
                        and b.codigo = 2
                        and a.fecha_inicio = c.fecha_inicio
                        and a.fecha_final = c.fecha_final) * 100,2) as AV
                from balances c, cuentas d
                where c.cuentas_id = d.id
                and d.tipocuentas_id in(3,4)
                and d.empresas_id=".$emp."
                and c.fecha_final='".$ffin."'
                UNION
                Select d.nombre,round(c.monto/(select a.monto 
                        from balances a, cuentas b 
                    where b.empresas_id =d.empresas_id
                        and a.cuentas_id = b.id
                        and b.codigo_padre is null 
                        and b.codigo = 3
                        and a.fecha_inicio = c.fecha_inicio
                        and a.fecha_final = c.fecha_final) * 100,2) as AV
                from balances c, cuentas d
                where c.cuentas_id = d.id
                and d.tipocuentas_id in(5)
                and d.empresas_id=".$emp."
                and c.fecha_final='".$ffin."'");   
                
          $boton = 'AV';      
          
          return view('analisis.show1',compact('balances','balances2','mesanio1','mesanio2','boton','empress'));
        }
        elseif (isset($_GET['AH']) && $_GET['AH'] == 'Generar Analisis Horizontal') {
          
          // aqui ira analisis horizontal        
        $balances=DB::select("select c.nombre,(c.monto-e.monto) as monto,round((c.monto-e.monto)/e.monto*100,4) as porcentaje,c.cuentas_id,d.empresas_id
                                from balances c
                                inner join cuentas d on (c.cuentas_id = d.id and d.tipocuentas_id in(1,2) and d.empresas_id=".$emp." )
                                left join (select a.nombre,a.monto ,a.cuentas_id,b.empresas_id
                                            from balances a, cuentas b 
                                            where a.cuentas_id = b.id
                                                and b.tipocuentas_id in(1,2)
                                                and b.empresas_id=".$emp."
                                                and a.fecha_inicio = '".$fini."') e
                                                on (e.cuentas_id = c.cuentas_id and e.empresas_id = d.empresas_id)
                                            where c.fecha_final= '".$ffin."'
                                 UNION
                                select c.nombre,(c.monto-e.monto) as monto,round((c.monto-e.monto)/e.monto*100,4) as porcentaje,c.cuentas_id,d.empresas_id
                                 from balances c
                                 inner join cuentas d on (c.cuentas_id = d.id and d.tipocuentas_id in(3,4) and d.empresas_id=2 )
                                 left join (select a.nombre,a.monto ,a.cuentas_id,b.empresas_id
                                                from balances a, cuentas b 
                                               where a.cuentas_id = b.id
                                                 and b.tipocuentas_id in(3,4)
                                                 and b.empresas_id=".$emp."
                                                 and a.fecha_inicio = '".$fini."') e
                                                  on (e.cuentas_id = c.cuentas_id and e.empresas_id = d.empresas_id)
                                 where c.fecha_final='".$ffin."'
                                UNION
                                SELECT c.nombre,(c.monto-e.monto) as monto,round((c.monto-e.monto)/e.monto*100,4) as porcentaje,c.cuentas_id,d.empresas_id
                                 from balances c
                                             inner join cuentas d on (c.cuentas_id = d.id and d.tipocuentas_id in(5) and d.empresas_id=2 )
                                             left join (select a.nombre,a.monto ,a.cuentas_id,b.empresas_id
                                                            from balances a, cuentas b 
                                                           where a.cuentas_id = b.id
                                                             and b.tipocuentas_id in(5)
                                                             and b.empresas_id=".$emp."
                                                             and a.fecha_inicio = '".$fini."') e
                                                              on (e.cuentas_id = c.cuentas_id and e.empresas_id = d.empresas_id)
                                             where c.fecha_final='".$ffin."'");

                        $boton = 'AH';             

                        return view('analisis.show1',compact('balances','mesanio1','mesanio2','boton','empress'));  

        }
         
    }
    
    public function show1R($id)
    {
      $emp = $id;
      $fini = Input::get('fecha_inicial');
      $ffin = Input::get('fecha_final');
      setlocale(LC_TIME, "spanish");
      $mesanio1 = date("F",strtotime($fini)).' '.date("Y",strtotime($fini));       
      $mesanio2 = date("F",strtotime($ffin)).' '.date("Y",strtotime($ffin));  
       
      if (isset($_GET['AV']) && $_GET['AV'] == 'Generar Analisis Vertical') {
        // aqui ira analisis vertical        
        $resultados=DB::select("Select d.nombre,round(c.monto/(select a.monto 
                                from resultados a, cuentas b 
                            where b.empresas_id =d.empresas_id
                                and a.cuentas_id = b.id
                                and a.nombre ='VENTAS NETAS'
                                and a.fecha_inicio = c.fecha_inicio
                                and a.fecha_final = c.fecha_final) * 100,2) as AV
                        from resultados c, cuentas d
                        where c.cuentas_id = d.id
                        and d.tipocuentas_id in(6)
                        and d.empresas_id=".$emp."
                        and c.fecha_inicio='".$fini."'"); 


        $resultados2=DB::select("Select d.nombre,round(c.monto/(select a.monto 
                                from resultados a, cuentas b 
                            where b.empresas_id =d.empresas_id
                                and a.cuentas_id = b.id
                                and a.nombre ='VENTAS NETAS'
                                and a.fecha_inicio = c.fecha_inicio
                                and a.fecha_final = c.fecha_final) * 100,2) as AV
                        from resultados c, cuentas d
                        where c.cuentas_id = d.id
                        and d.tipocuentas_id in(6)
                        and d.empresas_id=".$emp."
                        and c.fecha_final='".$ffin."'");   
                
          $boton = 'AV';      
          
          return view('analisisR.show1R',compact('resultados','resultados2','mesanio1','mesanio2','boton','empress'));
        }
        elseif (isset($_GET['AH']) && $_GET['AH'] == 'Generar Analisis Horizontal') {
          
          // aqui ira analisis horizontal
          $resultados=DB::select("select c.nombre,(c.monto-e.monto) as monto,round((c.monto-e.monto)/e.monto*100,4) as porcentaje,c.cuentas_id,d.empresas_id
                                from resultados c
                                inner join cuentas d on (c.cuentas_id = d.id and d.tipocuentas_id in(6) and d.empresas_id=".$emp." )
                                left join (select a.nombre,a.monto ,a.cuentas_id,b.empresas_id
                                            from resultados a, cuentas b 
                                            where a.cuentas_id = b.id
                                                and b.tipocuentas_id in(6)
                                                and b.empresas_id=".$emp."
                                                and a.fecha_inicio = '".$fini."') e
                                                on (e.cuentas_id = c.cuentas_id and e.empresas_id = d.empresas_id)
                                            where c.fecha_final= '".$ffin."'");        
        
        
               $boton = 'AH';             

               return view('analisis.show1',compact('resultados','mesanio1','mesanio2','boton','empress'));  
                    
         }
         
    }

}
