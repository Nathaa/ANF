@extends('template.plantilla2')


@section('crear')

@endsection

@section('content')


    <h3><strong>Editar Empresa: {{$empresa->nombre}}</strong> </h3>

    <div class="container">
        <div class="card">
    
        
         <div class="card-body">
           
            
            <table class="table table-bordered table-hover">
    
                    
<form action="{{ url('/empresas/'.$empresa->id) }}" method="POST">
    <input type="hidden" name="_method" value="PUT">


        {{ csrf_field() }}

        <div class="form-group">
            <label for="nombre">Nombre </label>
            <input type="text" name="nombre" value="{{ $empresa->nombre}}" class="form-control" placeholder="Nombre de la Empresa">
        </div>

        <div class="form-group">
            <label for="codigo">Código </label>
            <input type="text" name="codigo" value="{{ $empresa->codigo }}" class="form-control" placeholder="Codigo de la Empresa">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción </label>
            <input type="text" name="descripcion" value="{{ $empresa->descripcion }}" class="form-control" placeholder="Descripcion de la Empresa">
        </div>

        <div class="form-group">
            <label for="rubro">Rubro </label>
            <input type="text" name="rubro" value="{{ $empresa->rubro }}" class="form-control" placeholder="Rubro de la Empresa">
        </div>

        <div class="form-group">
        <button class="btn btn-primary" type="submit">Guardar </button>
        <a class="btn btn-primary" href="{{ url('cuentas') }}">Regresar</a>
    </div>

</form>

</table>
</div>
</div>
</div>    
@endsection