@extends('template.plantilla2')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>
function suma() {
      var add = 0;
      $('.amt').each(function() {
          if (!isNaN($(this).val())) {
              add += Number($(this).val());
          }
      });
      $('#spTotal').val(add);
  };

  function suma2() {
      var add = 0;
      var total = 0;
      var valor = 0;
      $('.amt8').each(function() {
          if (!isNaN($(this).val())) {
              total = Number($(this).val());
          }
      });
      $('.amt2').each(function() {
          if (!isNaN($(this).val())) {
            if ($(this).val() > 0){
              valor = Number($(this).val())*-1;
            }
            else{
              valor = Number($(this).val());
            }
            add+=valor;
          }
      });

      total = total + add;
      $('#spTotal2').val(total);
  };

  function suma3() {
      var add = 0;
      $('.amt3').each(function() {
          if (!isNaN($(this).val())) {
              add += Number($(this).val());
          }
      });
      $('#spTotal3').val(add);
  };

  function suma4() {
      var add = 0;
      $('.amt4').each(function() {
          if (!isNaN($(this).val())) {
              add += Number($(this).val());
          }
      });
      $('#spTotal4').val(add);
  };
</script>

<div class="container">
    <div class="card">
     <div class="card-body">
     @if(Session::has('message'))
                <div class="alert alert-warning alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  {{Session::get('message')}}
                </div>
                @endif
        <table class="table table-bordered thead-dark table-hover table-sm">
        
          <form action="{{ url('/resultados/'.$empresas) }}"  method="POST" role="form">
        
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                <div class="row">
                
                <div class="col">
                <label for="fecha_inicio" class="control-label">{{'Fecha Inicio'}}:</label><br>
                <input type="date" class="form-control"id="fecha_inicio" name="fecha_inicio" value=""><br>
                </div>
                <div class="col">
                <label for="fecha_final" class="control-label">{{'Fecha Finalizacion'}}:</label><br>
                <input type="date" class="form-control"id="fecha_final" name="fecha_final" value=""><br>
                </div>
                </div>
                </div>
            <tr>
   
              <th scope="col">Cuentas</th>
              <th scope="col"><label for="monto[]" class="control-label">{{'Monto'}}</label></th>
              <!--<th scope="col">Fecha Inicio</th>
              <th scope="col">Fecha Finalizacion</th>-->
    
            </tr>
          </thead>
          <tbody>
             @foreach ($cuentas as $cuenta) 
             <tr>
               <?php   if($cuenta->nombre == "UTILIDAD BRUTA"){ ?>
                <td><input readonly type="text" style="font-weight:bold;" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input readonly type="float" style="font-weight:bold;" class="form-control amt8" id="spTotal" name="monto[]" value="0" placeholder="0.00"><br></td>
                <td><input readonly type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
               <?php } if($cuenta->codigo_padre == 8){ ?>
                <td><input readonly type="text" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input type="float" class="form-control amt" id="monto" name="monto[]" value="0" onChange="suma();" required placeholder="0.00"><br></td>
                <td><input type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
               <?php }  if($cuenta->nombre == "UTILIDAD DE OPERACION"){ ?>
                <td><input readonly type="text" style="font-weight:bold;" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input readonly type="float" style="font-weight:bold;" class="form-control amt3" id="spTotal2" name="monto[]" value="0" placeholder="0.00"><br></td>
                <td><input readonly type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
               <?php } if($cuenta->codigo_padre == 9){ ?>
                <td><input readonly type="text" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input type="float" class="form-control amt2" id="monto" name="monto[]" value="0" onChange="suma2();" required placeholder="0.00"><br></td>
                <td><input type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
               <?php }  if($cuenta->nombre == "UTILIDADES ANTES DE PART E IMP"){ ?>
                <td><input readonly type="text" style="font-weight:bold;" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input readonly type="float" style="font-weight:bold;" class="form-control amt4" id="spTotal3" name="monto[]" value="0" placeholder="0.00"><br></td>
                <td><input readonly type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
               <?php } if($cuenta->codigo_padre == 7){ ?>
                <td><input readonly type="text" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input type="float" class="form-control amt3" id="monto" name="monto[]" value="0" onChange="suma3();" required placeholder="0.00"><br></td>
                <td><input type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
               <?php }  if($cuenta->nombre == "UTILIDAD (PERDIDA) NETA"){ ?>
                <td><input readonly type="text" style="font-weight:bold;" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input readonly type="float" style="font-weight:bold;" class="form-control" id="spTotal4" name="monto[]" value="0" placeholder="0.00"><br></td>
                <td><input readonly type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
               <?php }  if($cuenta->codigo_padre == 6){ ?>
                <td><input readonly type="text" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input type="float" class="form-control amt4" id="monto" name="monto[]" value="0" onChange="suma4();" required placeholder="0.00"><br></td>
                <td><input type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
               <?php }?>                       
                             
              </tr>
             
            @endforeach
              
          </tbody>
         </table>
         <br>
         <div class="form-group">
            <button class="btn btn-primary" type="submit" onclick="validar();"> Guardar </button>
            <a class="btn btn-primary" href="">Regresar</a>
        </div>
     </div>
    </div>
</div>

@endsection

