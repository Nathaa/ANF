@extends('template.plantilla2')

@section('crear')

@endsection

@section('content')
<div class="container">
  <div class="container">
    <div class="card">

    
     <div class="card-body">

    
    <form action="{{route('cuentas.store') }}" method="POST" role="form">

        {{ csrf_field() }}
      

        <div class="form-group">
            <div class="row">
                <div class="col">
                        <label for="codigo" class="control-label">{{'Codigo'}}:</label><br>
                        <input type="text" class="form-control" id="codigo" name="codigo" value="{{ old('codigo') }}"><br>
                </div>
                <div class="col">
                    <label for="codigo_padre" class="control-label">{{'Codigo Precedente'}}:</label><br>
                    <input type="text" class="form-control" id="codigo_padre" name="codigo_padre" value="{{ old('codigo_padre') }}"><br>
                </div>
            </div>
        
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="nombre" class="control-label">{{'Nombre'}}:</label><br>
                    <input type="text" class="form-control"id="nombre" name="nombre" value="{{ old('nombre') }}"><br>
                </div>
                
                <div class="col">
                    <label for="tipocuentas_id" class="control-label">{{'Tipo de cuenta'}}:</label><br>
                    <select class="form-control" id="tipocuentas_id" name="tipocuentas_id" >
                      <option value="">Debe seleccionar una opción</option> 
                      @foreach ($tipocuentas as $tp)
                     <option value="{{ $tp->id }}">{{$tp->subtipo}}</option>
                        @endforeach
                    </select>
                </div>
               
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="descripcion" class="control-label">{{'Catalogo'}}:</label><br>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion') }}"><br>
                </div>
                <div class="col">
                    <label for="empresas_id"class="control-label">{{'Empresa'}}:</label><br>
                    <select class="form-control" id="empresas_id" name="empresas_id">
                        @foreach ($empresa as $emp)
                    <option value="{{ $emp->id }}">{{$emp->nombre}}</option>
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