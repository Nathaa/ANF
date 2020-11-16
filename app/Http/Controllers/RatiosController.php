<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Balance;
use Illuminate\Support\Facades\Input;
use Session;

class RatiosController extends Controller
{
    //

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

          return view('ratios.show',compact('balances','empress'));
    }

    public function show1($id)
    {
        
      $emp = $id;
      $fini = Input::get('fecha_inicial');
      $ffin = Input::get('fecha_final');
      setlocale(LC_TIME, "spanish");
      $mesanio1 = date("F",strtotime($fini)).' '.date("Y",strtotime($fini));       
      $mesanio2 = date("F",strtotime($ffin)).' '.date("Y",strtotime($ffin));  
       
      
      $ratiosl=DB::select("select 'Razón de Circulante' nombre, b.monto/(select a.monto 
                            from balances a , cuentas d
                        where a.nombre='PASIVO CORRIENTE' 
                        and a.cuentas_id =d.id
                        and d.empresas_id=c.empresas_id
                        and a.fecha_inicio = b.fecha_inicio
                        and a.fecha_final=b.fecha_final
                        ) resultado
                        from balances b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='ACTIVO CORRIENTE'
                        and c.empresas_id=".$emp."
                        and b.fecha_inicio ='".$fini."'
                        union
                        select 'Prueba Acida' nombre, (b.monto-(select a.monto 
                                                                from balances a , cuentas d
                                                            where a.nombre='INVENTARIO' 
                                                            and a.cuentas_id =d.id
                                                            and d.empresas_id=c.empresas_id
                                                            and a.fecha_inicio = b.fecha_inicio
                                                            and a.fecha_final=b.fecha_final))/(select a.monto 
                            from balances a , cuentas d
                        where a.nombre='PASIVO CORRIENTE' 
                        and a.cuentas_id =d.id
                        and d.empresas_id=c.empresas_id
                        and a.fecha_inicio = b.fecha_inicio
                        and a.fecha_final=b.fecha_final
                        ) resultado
                        from balances b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='ACTIVO CORRIENTE'
                        and c.empresas_id=".$emp."
                        and b.fecha_inicio ='".$fini."'
                        UNION
                        select 'Razón de Activo Neto' nombre, (b.monto-(select a.monto 
                                                                from balances a , cuentas d
                                                            where a.nombre='PASIVO CORRIENTE' 
                                                            and a.cuentas_id =d.id
                                                            and d.empresas_id=c.empresas_id
                                                            and a.fecha_inicio = b.fecha_inicio
                                                            and a.fecha_final=b.fecha_final))/(select a.monto 
                            from balances a , cuentas d
                        where a.nombre='ACTIVO' 
                        and a.cuentas_id =d.id
                        and d.empresas_id=c.empresas_id
                        and a.fecha_inicio = b.fecha_inicio
                        and a.fecha_final=b.fecha_final
                        ) resultado
                        from balances b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='ACTIVO CORRIENTE'
                        and c.empresas_id=".$emp."
                        and b.fecha_inicio ='".$fini."'
                        UNION
                        select 'Razón de Efectivo' nombre, (b.monto+(select a.monto 
                                                                from balances a , cuentas d
                                                            where a.nombre='VALORES DE CORTO PLAZO' 
                                                            and a.cuentas_id =d.id
                                                            and d.empresas_id=c.empresas_id
                                                            and a.fecha_inicio = b.fecha_inicio
                                                            and a.fecha_final=b.fecha_final))/(select a.monto 
                            from balances a , cuentas d
                        where a.nombre='PASIVO CORRIENTE' 
                        and a.cuentas_id =d.id
                        and d.empresas_id=c.empresas_id
                        and a.fecha_inicio = b.fecha_inicio
                        and a.fecha_final=b.fecha_final
                        ) resultado
                        from balances b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='EFECTIVO'
                        and c.empresas_id=".$emp."
                        and b.fecha_inicio ='".$fini."'");

        $ratiosl2=DB::select("select 'Razón de Circulante' nombre, b.monto/(select a.monto 
                        from balances a , cuentas d
                    where a.nombre='PASIVO CORRIENTE' 
                    and a.cuentas_id =d.id
                    and d.empresas_id=c.empresas_id
                    and a.fecha_inicio = b.fecha_inicio
                    and a.fecha_final=b.fecha_final
                    ) resultado
                    from balances b, cuentas c
                    where  b.cuentas_id=c.id
                    and b.nombre='ACTIVO CORRIENTE'
                    and c.empresas_id=".$emp."
                    and b.fecha_final ='".$ffin."'
                    union
                    select 'Prueba Acida' nombre, (b.monto-(select a.monto 
                                                            from balances a , cuentas d
                                                        where a.nombre='INVENTARIO' 
                                                        and a.cuentas_id =d.id
                                                        and d.empresas_id=c.empresas_id
                                                        and a.fecha_inicio = b.fecha_inicio
                                                        and a.fecha_final=b.fecha_final))/(select a.monto 
                        from balances a , cuentas d
                    where a.nombre='PASIVO CORRIENTE' 
                    and a.cuentas_id =d.id
                    and d.empresas_id=c.empresas_id
                    and a.fecha_inicio = b.fecha_inicio
                    and a.fecha_final=b.fecha_final
                    ) resultado
                    from balances b, cuentas c
                    where  b.cuentas_id=c.id
                    and b.nombre='ACTIVO CORRIENTE'
                    and c.empresas_id=".$emp."
                    and b.fecha_final ='".$ffin."'
                    UNION
                        select 'Razón de Activo Neto' nombre, (b.monto-(select a.monto 
                                                                from balances a , cuentas d
                                                            where a.nombre='PASIVO CORRIENTE' 
                                                            and a.cuentas_id =d.id
                                                            and d.empresas_id=c.empresas_id
                                                            and a.fecha_inicio = b.fecha_inicio
                                                            and a.fecha_final=b.fecha_final))/(select a.monto 
                            from balances a , cuentas d
                        where a.nombre='ACTIVO' 
                        and a.cuentas_id =d.id
                        and d.empresas_id=c.empresas_id
                        and a.fecha_inicio = b.fecha_inicio
                        and a.fecha_final=b.fecha_final
                        ) resultado
                        from balances b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='ACTIVO CORRIENTE'
                        and c.empresas_id=".$emp."
                        and b.fecha_final ='".$ffin."'
                        UNION
                        select 'Razón de Efectivo' nombre, (b.monto+(select a.monto 
                                                                from balances a , cuentas d
                                                            where a.nombre='VALORES DE CORTO PLAZO' 
                                                            and a.cuentas_id =d.id
                                                            and d.empresas_id=c.empresas_id
                                                            and a.fecha_inicio = b.fecha_inicio
                                                            and a.fecha_final=b.fecha_final))/(select a.monto 
                            from balances a , cuentas d
                        where a.nombre='PASIVO CORRIENTE' 
                        and a.cuentas_id =d.id
                        and d.empresas_id=c.empresas_id
                        and a.fecha_inicio = b.fecha_inicio
                        and a.fecha_final=b.fecha_final
                        ) resultado
                        from balances b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='EFECTIVO'
                        and c.empresas_id=".$emp."
                        and b.fecha_final ='".$ffin."'");

        // aqui ira calculo de ratios     
        $ratios=DB::select("select 'Razón de Rotación de Inventario' nombre, b.monto/(select a.monto 
                                from balances a , cuentas d
                            where a.nombre='INVENTARIOS' 
                            and a.cuentas_id =d.id
                            and d.empresas_id=c.empresas_id
                            and a.fecha_inicio = b.fecha_inicio
                            and a.fecha_final=b.fecha_final
                            ) resultado
                        from resultados b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='COSTO DE VENTAS'
                        and c.empresas_id=".$emp."
                        and b.fecha_inicio ='".$fini."'
                        union  
                        select 'Razón de Dias de Inventario' nombre, b.monto/((select a.monto 
                                from resultados a , cuentas d
                            where a.nombre='COSTO DE VENTAS' 
                            and a.cuentas_id =d.id
                            and d.empresas_id=c.empresas_id
                            and a.fecha_inicio = b.fecha_inicio
                            and a.fecha_final=b.fecha_final
                            )/365) resultado
                        from balances b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='INVENTARIOS'
                        and c.empresas_id=".$emp."
                        and b.fecha_inicio ='".$fini."'
                        union  
                        select 'Razón de Rotación CXC' nombre, b.monto/(select a.monto 
                                        from balances a , cuentas d
                                    where a.nombre='CXC' 
                                    and a.cuentas_id =d.id
                                    and d.empresas_id=c.empresas_id
                                    and a.fecha_inicio = b.fecha_inicio
                                    and a.fecha_final=b.fecha_final
                                    ) resultado
                        from resultados b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='VENTAS NETAS'
                        and c.empresas_id=2
                        and c.empresas_id=".$emp."
                        and b.fecha_inicio ='".$fini."'");


            $ratios2=DB::select("select 'Razón de Rotación de Inventario' nombre, b.monto/(select a.monto 
                                    from balances a , cuentas d
                                where a.nombre='INVENTARIOS' 
                                and a.cuentas_id =d.id
                                and d.empresas_id=c.empresas_id
                                and a.fecha_inicio = b.fecha_inicio
                                and a.fecha_final=b.fecha_final
                                ) resultado
                            from resultados b, cuentas c
                            where  b.cuentas_id=c.id
                            and b.nombre='COSTO DE VENTAS'
                            and c.empresas_id=".$emp."
                            and b.fecha_final  ='".$ffin."'
                            union  
                            select 'Razón de Dias de Inventario' nombre, b.monto/((select a.monto 
                                    from resultados a , cuentas d
                                where a.nombre='COSTO DE VENTAS' 
                                and a.cuentas_id =d.id
                                and d.empresas_id=c.empresas_id
                                and a.fecha_inicio = b.fecha_inicio
                                and a.fecha_final=b.fecha_final
                                )/365) resultado
                            from balances b, cuentas c
                            where  b.cuentas_id=c.id
                            and b.nombre='INVENTARIOS'
                            and c.empresas_id=".$emp."
                            and b.fecha_final  ='".$ffin."'
                            union  
                            select 'Razón de Rotación CXC' nombre, b.monto/(select a.monto 
                                            from balances a , cuentas d
                                        where a.nombre='CXC' 
                                        and a.cuentas_id =d.id
                                        and d.empresas_id=c.empresas_id
                                        and a.fecha_inicio = b.fecha_inicio
                                        and a.fecha_final=b.fecha_final
                                        ) resultado
                            from resultados b, cuentas c
                            where  b.cuentas_id=c.id
                            and b.nombre='VENTAS NETAS'
                            and c.empresas_id=".$emp."
                            and b.fecha_final  ='".$ffin."'");            
        
        
        return view('ratios.show1',compact('ratiosl','ratiosl2','ratios','ratios2','mesanio1','mesanio2','empress'));
    }

}
