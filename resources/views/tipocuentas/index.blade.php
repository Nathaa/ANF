@extends('template.plantilla2')

@section('content')
<h6>
  @if($search)
 <div class="alert alert-info" role="alert">
   Los resultados de tu busqueda : {{ $search }}
 </div>
 @endif
</h6>


<div class="container">
 <div class="container-fluid">
    <div class="card">
      <div class="card-header">
      
          <a href="{{ route('tipocuentas.create') }}"> <button type="button" class="btn btn-dark btn-xs">
          <i class="fas fa-plus"></i>Crear Tipo de Cuenta </button> </a>
       
      </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <a href="{{ route('tipocuentas.index') }}"><i class="fa fa-align-justify"></i> Listado de Tipo de Cuentas</a>
                </div>
            </div>
            <table class="table table-bordered thead-dark table-hover table-sm">
         <tr>
           <th scope="col">Nombre</th>
           <th scope="col">Descripción</th>
           <th scope="col">Subtipo</th>
           <th colspan="3">&nbsp;Opciones</th>
         </tr>
       </thead>
       <tbody>
          @foreach ($tipocuenta as $tc)
          <tr>
            <td>{{$tc->nombre}}</td>
             <td>{{$tc->descripcion}}</td>
             <td>{{$tc->subtipo}}</td>
             <td width="10px">
                <a href="{{ url('/tipocuentas/'.$tc->id.'/edit') }}" class="btn btn-default btn-flat" title="Editar">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                  </a>
            </td>
            <td width="10px">
                <a href="{{ route('tipocuentas.show', $tc->id) }}" class="btn btn-info btn-flat" title="Visualizar">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                  </a>
            </td>
            <td width="10px">
              <form method="POST" action="{{ url('/tipocuentas/'.$tc->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
               <button class="btn btn-danger" class="btn btn-info btn-flat" onclick="return confirm('¿Desea eliminar el tipo de cuenta?')" title="Eliminar">
                <i class="fas fa-trash" aria-hidden="true"></i>
              </button> 
              </form>
            </td>
          </tr>

         @endforeach
       
       </tbody>
      </table>
      <div class="row">
        <div class="mr-auto">
          {{$tipocuenta->links()}}
        </div>
      </div>
         
        </div>
     </div>
  </div>
</div>
@endsection
