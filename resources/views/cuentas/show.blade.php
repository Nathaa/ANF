@extends('template.plantilla2')

@section('content')


<div class="container">
    
    <div class="card">
     <div class="card-body">
        <tr>
        
        </tr>
        <table class="table table-bordered thead-dark table-hover table-sm">
            <form action="{{ route('cuentas.show', $empresas) }}" method="get" role="form">
              {{ csrf_field() }}
            <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Codigo precedente</th>
            <th scope="col">Cuentas</th>
            <th scope="col">Editar</th>
              
              
              
    
            </tr>
          </thead>
          <tbody>
             @foreach ($cuentas as $cuenta)
              <tr>
                
                <td style="font-weight:bold; font-family: cursive;">{{$cuenta->codigo}}</td>
                <td style="font-weight:bold; font-family: cursive;">{{$cuenta->codigo_padre}}</td>
                <td style="font-weight:bold; font-family: cursive;">{{$cuenta->nombre}}</td>
                <td width="10px">
                    <a href="{{ url('/cuentas/'.$cuenta->id.'/edit') }}" class="btn btn-default btn-flat" title="Editar">
                        <i class="fa fa-wrench" aria-hidden="true"></i>
                      </a>
                    </td>
         
               
              </tr>
            @endforeach
   
          </tbody>
         </table>
    
         <br>
         <form>
          <div align="left">
            <input type="button" value="VOLVER ATRÁS" name="Back2" onclick="history.back()" />
            </div>
           </form>
    </form>
        </div>
    </div>
</div>

@endsection