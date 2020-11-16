
<div class="container">
    <div class="card">

    
     <div class="card-body">
       
<div class="form-group">
    <div class="row">
        <div class="col">
                <label for="codigo" class="control-label">{{'Codigo'}}:</label><br>
                <input type="text" class="form-control" id="codigo" name="codigo" value="{{ isset($cuentas->codigo)?$cuentas->codigo:'' }}"><br>
        </div>
        <div class="col">
            <label for="codigo_padre" class="control-label">{{'Codigo Precedente'}}:</label><br>
            <input type="text" class="form-control" id="codigo_padre" name="codigo_padre" value="{{ isset($cuentas->codigo_padre)?$cuentas->codigo_padre:'' }}"><br>
        </div>
    </div>

<div class="form-group">
    <div class="row">
        <div class="col">
            <label for="nombre" class="control-label">{{'Nombre'}}:</label><br>
            <input type="text" class="form-control"id="nombre" name="nombre" value="{{ isset($cuentas->nombre)?$cuentas->nombre:'' }}"><br>
        </div>
        
        <div class="col">
            <label for="tipocuentas_id" class="control-label">{{'Tipo de cuenta'}}:</label><br>
            <select class="form-control" id="tipocuentas_id" name="tipocuentas_id">
               
                @foreach ($tipocuentas as $tp)
                <option value="{{ $tp->id }}">{{$tp->nombre}}</option>
                @endforeach
            </select>
        </div>
       
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col">
            <label for="descripcion" class="control-label">{{'Catalogo'}}:</label><br>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ isset($cuentas->descripcion)?$cuentas->descripcion:'' }}"><br>
        </div>
        <div class="col">
            <label for="empresas_id"class="control-label">{{'Empresa'}}:</label><br>
            <select class="form-control" id="empresas_id" name="empresas_id">
                @foreach ($empresa as $emp)
            <option value="{{ isset($emp->id)?$emp->id:'' }}">{{$emp->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>


            <input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar nueva cuenta':'Modificar Cuenta' }}">
            <a class="btn btn-primary" href="{{ url('cuentas') }}">Regresar</a>

        </div>
</div>
     </div>
          </div>
            </div>
    
    

