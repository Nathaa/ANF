@extends('template.plantilla2')

@section('content')

<Script language="javascript">
function checkKeyCode(evt)
{

var evt = (evt) ? evt : ((event) ? event : null);
var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
if(event.keyCode==116)
{
evt.keyCode=0;
return false
}
}
document.onkeydown=checkKeyCode;
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
        
          <form action="{{ url('/balances/'.$empresas) }}"  method="POST" role="form">
        
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
               <?php if($cuenta->nombre == "ACTIVO"){ ?>
                <td><input readonly type="text" style="font-weight:bold;" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input readonly type="float" style="font-weight:bold;" class="form-control" id="spTotal" name="monto[]" value="0" placeholder="0.00"><br></td>
                <td><input readonly type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
                <?php }if($cuenta->nombre == "ACTIVO CORRIENTE"){ ?>
                <td><input readonly type="text" style="font-weight:bold;" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input readonly type="float" style="font-weight:bold;" class="form-control act2" id="spSubTotal" name="monto[]" value="0" placeholder="0.00"><br></td>
                <td><input readonly type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
                <?php }if($cuenta->codigo_padre ==10){ ?>
                <td><input readonly type="text" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input type="float" class="form-control act" id="monto" name="monto[]" value="0" onChange="suma();" required placeholder="0.00"><br></td>
                <td><input type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
               <?php } if($cuenta->nombre == "ACTIVO NO CORRIENTE"){ ?>
                <td><input readonly type="text" style="font-weight:bold;" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input readonly type="float" style="font-weight:bold;" class="form-control act2" id="spSubTotalAC" name="monto[]" value="0" placeholder="0.00"><br></td>
                <td><input readonly type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
                <?php }if($cuenta->codigo_padre ==11){ ?>
                <td><input readonly type="text" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input type="float" class="form-control act3" id="monto" name="monto[]" value="0" onChange="suma();" required placeholder="0.00"><br></td>
                <td><input type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
               <?php } if($cuenta->nombre == "PASIVO"){ ?>
                <td><input readonly type="text" style="font-weight:bold;" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input readonly type="float" style="font-weight:bold;" class="form-control" id="spTotalP" name="monto[]" value="0" placeholder="0.00"><br></td>
                <td><input readonly type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
                <?php }if($cuenta->nombre == "PASIVO CORRIENTE"){ ?>
                <td><input readonly type="text" style="font-weight:bold;" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input readonly type="float" style="font-weight:bold;" class="form-control act5" id="spSubTotalP" name="monto[]" value="0" placeholder="0.00"><br></td>
                <td><input readonly type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
                <?php }if($cuenta->codigo_padre ==20){ ?>
                <td><input readonly type="text" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input type="float" class="form-control act4" id="monto" name="monto[]" value="0" onChange="suma2();" required placeholder="0.00"><br></td>
                <td><input type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
               <?php } if($cuenta->nombre == "PASIVO NO CORRIENTE"){ ?>
                <td><input readonly type="text" style="font-weight:bold;" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input readonly type="float" style="font-weight:bold;" class="form-control act5" id="spSubTotalAP" name="monto[]" value="0" placeholder="0.00"><br></td>
                <td><input readonly type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
                <?php }if($cuenta->codigo_padre ==21){ ?>
                <td><input readonly type="text" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input type="float" class="form-control act6" id="monto" name="monto[]" value="0" onChange="suma2();" required placeholder="0.00"><br></td>
                <td><input type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
               <?php } if($cuenta->nombre == "PATRIMONIO"){ ?>
                <td><input readonly type="text" style="font-weight:bold;" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input readonly type="float" style="font-weight:bold;" class="form-control" id="spSubTotalC" name="monto[]" value="0" placeholder="0.00"><br></td>
                <td><input readonly type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
                <?php }if($cuenta->codigo_padre ==3){ ?>
                <td><input readonly type="text" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input type="float" class="form-control act7" id="monto" name="monto[]" value="0" onChange="suma3();" required placeholder="0.00"><br></td>
                <td><input type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
               <?php } ?>                      
                             
              </tr>
            @endforeach
              
          </tbody>
         </table>
         <!--<span>El resultado es: </span> <span id="spTotal"></span>-->
         <div class="form-group">
            <button class="btn btn-primary" type="submit" onclick="validar();"> Guardar </button>
            <a class="btn btn-primary" href="{{ url('cuentas') }}">Regresar</a>
        </div>
       
    </form>
        </div>
        
    </div>
</div>
<script>

function suma() {
      var add = 0;
      var add2 = 0;
      var total = 0;
      $('.act').each(function() {
          if (!isNaN($(this).val())) {
              add += Number($(this).val());
          }
      });
      $('#spSubTotal').val(add);

      $('.act3').each(function() {
          if (!isNaN($(this).val())) {
              add2 += Number($(this).val());
          }
      });
      $('#spSubTotalAC').val(add2);

      $('.act2').each(function() {
          if (!isNaN($(this).val())) {
              total += Number($(this).val());
          }
      });
      $('#spTotal').val(total);
  };

  function suma2() {
      var add = 0;
      var add2 = 0;
      var total = 0;
      $('.act4').each(function() {
          if (!isNaN($(this).val())) {
              add += Number($(this).val());
          }
      });
      $('#spSubTotalP').val(add);

      $('.act6').each(function() {
          if (!isNaN($(this).val())) {
              add2 += Number($(this).val());
          }
      });
      $('#spSubTotalAP').val(add2);

      $('.act5').each(function() {
          if (!isNaN($(this).val())) {
              total += Number($(this).val());
          }
      });
      $('#spTotalP').val(total);
  };

  function suma3() {
      var add = 0;
      var total = 0;
      $('.act7').each(function() {
          if (!isNaN($(this).val())) {
              add += Number($(this).val());
          }
      });
      $('#spSubTotalC').val(add);
      
  };

function validar(){

var total_activo = 0;
var total_pasivo = 0;
//
var f1 ; //31 de diciembre de 2015
var f2 ; //30 de noviembre de 2014
//
f1=Date.parse(document.getElementById('fecha_inicio').value);

f2=Date.parse(document.getElementById('fecha_final').value);
//
valor1 = parseFloat(document.getElementById('spTotal').value);
valor2 = parseFloat(document.getElementById('spTotalP').value);
valor3 = parseFloat(document.getElementById('spSubTotalC').value);
  
  // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
  valor1 = (valor1 == null || valor1 == undefined || valor1 == "" || valor1 === NaN) ? 0 : valor1;
  valor2 = (valor2 == null || valor2 == undefined || valor2 == "" || valor1 === NaN) ? 0 : valor2;
  valor3 = (valor3 == null || valor3 == undefined || valor3 == "" || valor3 === NaN) ? 0 : valor3;
   
  total_activo = parseFloat(valor1);
  total_pasivo = parseFloat(valor2) + parseFloat(valor3)  ; 
  /* Esta es la suma. */
  total = total_activo - total_pasivo;

  if (total != 0){
      alert("El Balance General tiene una diferencia de: $ " + total +" favor verificar");
      event.preventDefault();
   }

  if(f1 ==null || f1 == undefined || f1 == ""||f2 ==null || f2 == undefined || f2 == "") {
    alert("Las fechas no púeden quedar vacias");
    event.preventDefault();
   }

  if(f2 < f1){
    alert("La fecha final no puede ser menor a la inicial");
    event.preventDefault();
  }


};



</script>

@endsection