@extends('template.plantilla2')

@section('crear')


@endsection

@section('content')
<div class="container">
    <div class="card">

    
     <div class="card-body">
       
        
        
        <table class="table table-bordered table-hover">

                

    <form action="{{route('tipocuentas.store') }}" method="POST" role="form">

            {{ csrf_field() }}

            

            <div class="form-group">
                <label for="nombre">Nombre </label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control" placeholder="Nombre del tipo de cuenta">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción </label>
                <input type="text" name="descripcion" value="{{ old('descripcion') }}" class="form-control" placeholder="Descripcion del Tipo de Cuenta">
            </div>

            <div class="form-group">
                <label for="rubro">Subtipo </label>
                <input type="text" name="subtipo" value="{{ old('subtipo') }}" class="form-control" placeholder="Subtipo, por ejemplo: Activo no Corriente">
            </div>
            
            <div class="form-group">
            <button class="btn btn-primary" type="submit"> Guardar </button>
            <a class="btn btn-primary" href="{{ url('cuentas') }}">Regresar</a>
            </div>

    </form>

   
        </table>
        </div>
    </div>
</div>
@endsection
