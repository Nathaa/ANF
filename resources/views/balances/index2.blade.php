@extends('template.plantilla2')


@section('content')
<div class="container">
 <div class="container-fluid">
    <div class="card">
      <div class="card-header">
      
          
      </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <a href=""><i class="fa fa-align-justify"></i> Listado de Catalogos de Balances</a>
                </div>
            </div>
            <table class="table table-bordered thead-dark table-hover table-sm">
         <tr>

           
           <th scope="col">Fecha</th>
           
           <th colspan="3">&nbsp;Opciones</th>
         </tr>
       </thead>
       <tbody>
          @foreach ($balances as $balance)
           <tr>
            
            <td>{{$balance->fecha_inicio}} a {{$balance->fecha_final}}</td>
          
             
             <td width="10px">
    
                <a href="{{ url('/balances2/'.$balance->id.'/edit2') }}" class="btn btn-default btn-flat" title="Editar">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                  </a>
                  
                </td>
                <td width="10px">
                <a href="{{ route('balances.index') }}" class="btn btn-info btn-flat" title="Visualizar">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                  </a>
                </td>
                <td width="10px">
                <form method="POST" action="{{ url('/balances/'.$balance->id) }}">
               {{ csrf_field() }}
               {{ method_field('DELETE') }}
               <button class="btn btn-danger" class="btn btn-info btn-flat" onclick="return confirm('¿Borrar?')" title="Eliminar">
                <i class="fas fa-trash" aria-hidden="true"></i>
              </button> 
              </form>
                
    
                </td>
           </tr>

         @endforeach

       </tbody>
      </table>
      <div class="row">
   
      </div>
</div>
</div>
</div>
</div>
@endsection
