@extends('template.plantilla2')


@section('crear')

@endsection

@section('content')


    <h3><strong>Editar : {{$tipocuenta->nombre}}</strong> </h3>

    <div class="container">
        <div class="card">
    
        
         <div class="card-body">
           
            
            
            <table class="table table-bordered table-hover">
    
                    
<form action="{{ url('/tipocuentas/'.$tipocuenta->id) }}" method="POST">
    <input type="hidden" name="_method" value="PUT">


        {{ csrf_field() }}

        <div class="form-group">
            <label for="nombre">Nombre </label>
            <input type="text" name="nombre" value="{{ $tipocuenta->nombre}}" class="form-control" >
        </div>


        <div class="form-group">
            <label for="descripcion">Descripción </label>
            <input type="text" name="descripcion" value="{{ $tipocuenta->descripcion }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="subtipo">Subtipo </label>
            <input type="text" name="subtipo" value="{{ $tipocuenta->subtipo }}" class="form-control" >
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