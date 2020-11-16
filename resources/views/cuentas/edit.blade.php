@extends('template.plantilla2')

@section('crear')

@endsection

@section('content')
<div class="container">
    <div class="container">
      <div class="card">
  
      
       <div class="card-body">

<form action="{{ url('/cuentas/'.$cuentas->id) }}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <div class="row">
          <div class="col">
                  <label for="codigo" class="control-label">{{'Codigo'}}:</label><br>
                  <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $cuentas->codigo }}"><br>
          </div>
          <div class="col">
              <label for="codigo_padre" class="control-label">{{'Codigo Precedente'}}:</label><br>
              <input type="text" class="form-control" id="codigo_padre" name="codigo_padre" value="{{ $cuentas->codigo_padre }}"><br>
          </div>
      </div>
  
  <div class="form-group">
      <div class="row">
          <div class="col">
              <label for="nombre" class="control-label">{{'Nombre'}}:</label><br>
              <input type="text" class="form-control"id="nombre" name="nombre" value="{{ $cuentas->nombre }}"><br>
          </div>

          <div class="col">
            <label for="tipocuentas_id" class="control-label">{{'Tipo de cuenta'}}:</label><br>
            <select class="form-control" id="tipocuentas_id" name="tipocuentas_id" >
               @foreach($tipocuentas as $tp)
               @if ($tp->id ==  $cuentas->tipocuentas_id)
               <option value="{{ $tp->id }}" selected>{{ $tp->subtipo }}</option>
               @else
            <option value="{{ $tp->id }}">{{ $tp->subtipo}}</option>
               @endif
               @endforeach
            </select>
        </div>
          
         
      </div>
  </div>
  <div class="form-group">
      <div class="row">
          <div class="col">
              <label for="descripcion" class="control-label">{{'Catalogo'}}:</label><br>
              <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $cuentas->descripcion }}"><br>
          </div>
          <div class="col">
            <label for="empresas_id"class="control-label">{{'Empresa'}}:</label><br>
            <select class="form-control" id="empresas_id" name="empresas_id">
                @foreach($empresa as $emp)
               @if ($emp->id ==  $cuentas->empresas_id)
               <option value="{{ $emp->id }}" selected>{{ $emp->nombre }}</option>
               @else
               <option value="{{ $emp->id }}">{{ $emp->nombre }}</option>
               @endif
               @endforeach
            </select>
        </div>
      </div>
  
  
              <button class="btn btn-primary" type="submit"> Guardar </button>
              <a class="btn btn-primary" href="{{ url('cuentas') }}">Regresar</a>
  
    </div>
  </div>
</form>



</div>


</div>
</div>
  </div>
@endsection