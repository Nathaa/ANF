@extends('template.plantilla2')

@section('content')


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
        
          <form action="{{route('balances.store') }}"  method="POST" role="form">
        

                {{ csrf_field() }}

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
               <!--<td></td>-->
               <?php if($cuenta->nombre == "ACTIVO"){ ?>
                <td><input readonly type="text" style="font-weight:bold;" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input readonly type="float" style="font-weight:bold;" class="form-control" id="spTotal" name="monto[]" value="0" placeholder="0.00"><br></td>
                <!--<td><input readonly type="text" class="form-control" id="" name="" value=""><br></td>
                <td><input readonly type="text" class="form-control" id="" name="" value=""><br></td>-->
                <td><input readonly type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
                <?php }if($cuenta->nombre == "ACTIVO CORRIENTE"){ ?>
                <td><input readonly type="text" style="font-weight:bold;" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input readonly type="float" style="font-weight:bold;" class="form-control" id="spSubTotal" name="monto[]" value="0" placeholder="0.00"><br></td>
                <!--<td><input readonly type="text" class="form-control" id="" name="" value=""><br></td>
                <td><input readonly type="text" class="form-control" id="" name="" value=""><br></td>-->
                <td><input readonly type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
                <?php }if($cuenta->codigo_padre ==10){ ?>
                <td><input readonly type="text" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input type="float" class="form-control" id="monto" name="monto[]" value="0" onchange="sumar(this.value);sumar2();" required placeholder="0.00"><br></td>
                <!--<td><input type="text" class="form-control" id="" name="" value=""><br></td>
                <td><input type="text" class="form-control" id="" name="" value=""><br></td>-->
                <td><input type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
               <?php } if($cuenta->nombre == "ACTIVO NO CORRIENTE"){ ?>
                <td><input readonly type="text" style="font-weight:bold;" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input readonly type="float" style="font-weight:bold;" class="form-control" id="spSubTotalAC" name="monto[]" value="0" placeholder="0.00"><br></td>
                <!--<td><input readonly type="text" class="form-control" id="" name="" value=""><br></td>
                <td><input readonly type="text" class="form-control" id="" name="" value=""><br></td>-->
                <td><input readonly type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
                <?php }if($cuenta->codigo_padre ==11){ ?>
                <td><input readonly type="text" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input type="float" class="form-control" id="monto" name="monto[]" value="0" onchange="sumar3(this.value);sumar2();" required placeholder="0.00"><br></td>
                <!--<td><input type="text" class="form-control" id="" name="" value=""><br></td>
                <td><input type="text" class="form-control" id="" name="" value=""><br></td>-->
                <td><input type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
               <?php } if($cuenta->nombre == "PASIVO"){ ?>
                <td><input readonly type="text" style="font-weight:bold;" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input readonly type="float" style="font-weight:bold;" class="form-control" id="spTotalP" name="monto[]" value="0" placeholder="0.00"><br></td>
                <!--<td><input readonly type="text" class="form-control" id="" name="" value=""><br></td>
                <td><input readonly type="text" class="form-control" id="" name="" value=""><br></td>-->
                <td><input readonly type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
                <?php }if($cuenta->nombre == "PASIVO CORRIENTE"){ ?>
                <td><input readonly type="text" style="font-weight:bold;" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input readonly type="float" style="font-weight:bold;" class="form-control" id="spSubTotalP" name="monto[]" value="0" placeholder="0.00"><br></td>
                <!--<td><input readonly type="text" class="form-control" id="" name="" value=""><br></td>
                <td><input readonly type="text" class="form-control" id="" name="" value=""><br></td>-->
                <td><input readonly type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
                <?php }if($cuenta->codigo_padre ==20){ ?>
                <td><input readonly type="text" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input type="float" class="form-control" id="monto" name="monto[]" value="0" onchange="sumar4(this.value);sumar5();" required placeholder="0.00"><br></td>
                <!--<td><input type="text" class="form-control" id="" name="" value=""><br></td>
                <td><input type="text" class="form-control" id="" name="" value=""><br></td>-->
                <td><input type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
               <?php } if($cuenta->nombre == "PASIVO NO CORRIENTE"){ ?>
                <td><input readonly type="text" style="font-weight:bold;" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input readonly type="float" style="font-weight:bold;" class="form-control" id="spSubTotalAP" name="monto[]" value="0" placeholder="0.00"><br></td>
                <!--<td><input readonly type="text" class="form-control" id="" name="" value=""><br></td>
                <td><input readonly type="text" class="form-control" id="" name="" value=""><br></td>-->
                <td><input readonly type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
                <?php }if($cuenta->codigo_padre ==21){ ?>
                <td><input readonly type="text" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input type="float" class="form-control" id="monto" name="monto[]" value="0" onchange="sumar6(this.value);sumar5();" required placeholder="0.00"><br></td>
                <!--<td><input type="text" class="form-control" id="" name="" value=""><br></td>
                <td><input type="text" class="form-control" id="" name="" value=""><br></td>-->
                <td><input type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
               <?php } if($cuenta->nombre == "PATRIMONIO"){ ?>
                <td><input readonly type="text" style="font-weight:bold;" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input readonly type="float" style="font-weight:bold;" class="form-control" id="spSubTotalC" name="monto[]" value="0" placeholder="0.00"><br></td>
                <!--<td><input readonly type="text" class="form-control" id="" name="" value=""><br></td>
                <td><input readonly type="text" class="form-control" id="" name="" value=""><br></td>-->
                <td><input readonly type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
                <?php }if($cuenta->codigo_padre ==3){ ?>
                <td><input readonly type="text" class="form-control" name="nombre[]" value="{{$cuenta->nombre}}"></td>
                <td><input type="float" class="form-control" id="monto" name="monto[]" value="0" onchange="sumar7(this.value);" required placeholder="0.00"><br></td>
                <!--<td><input type="text" class="form-control" id="" name="" value=""><br></td>
                <td><input type="text" class="form-control" id="" name="" value=""><br></td>-->
                <td><input type="hidden" name="cuentas_id[]" value="{{$cuenta->id}}"></td>
               <?php } ?>                      
                             
              </tr>
            @endforeach
              
          </tbody>
         </table>
         <!--<span>El resultado es: </span> <span id="spTotal"></span>-->
         <div class="form-group">
            <button class="btn btn-primary" type="submit" onclick="validar();"> Guardar </button>
        </div>
         <input type="submit" class="btn btn-success" value="">
         <a class="btn btn-primary" href="{{ url('cuentas') }}">Regresar</a>
    </form>
        </div>
        
    </div>
</div>
<script>
function sumar (valor) {
  var total = 0;	
  valor = parseFloat(valor); // Convertir el valor a un entero (número).

  total = document.getElementById('spSubTotal').innerHTML;
  // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
  total = (total == null || total == undefined || total == "") ? 0 : total;
  /* Esta es la suma. */
  total = (parseFloat(total) + parseFloat(valor));
  // Colocar el resultado de la suma en el control "span".
  document.getElementById('spSubTotal').value = total;
  
};

function sumar3 (valor) {
  var total = 0;	
  valor = parseFloat(valor); // Convertir el valor a un entero (número).

  total = document.getElementById('spSubTotalAC').innerHTML;

  // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
  total = (total == null || total == undefined || total == "") ? 0 : total;

  /* Esta es la suma. */
  total = (parseFloat(total) + parseFloat(valor));

  // Colocar el resultado de la suma en el control "span".
  document.getElementById('spSubTotalAC').value = total;
};

function sumar2 () {
  var total = 0;	
  
  valor1 = parseFloat(document.getElementById('spSubTotal').value);
  valor2 = parseFloat(document.getElementById('spSubTotalAC').value);
  
  // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
  valor1 = (valor1 == null || valor1 == undefined || valor1 == "" || valor1 === NaN) ? 0 : valor1;
  valor2 = (valor2 == null || valor2 == undefined || valor2 == "" || valor1 === NaN) ? 0 : valor2;
   
  total = parseFloat(valor1) + parseFloat(valor2); 
  /* Esta es la suma. */
  //total = (parseInt(total));

  // Colocar el resultado de la suma en el control "span".
  document.getElementById('spTotal').value = total;
};

function sumar4 (valor) {
  var total = 0;	
  valor = parseFloat(valor); // Convertir el valor a un entero (número).

  total = document.getElementById('spSubTotalP').innerHTML;
  // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
  total = (total == null || total == undefined || total == "") ? 0 : total;
  /* Esta es la suma. */
  total = (parseFloat(total) + parseFloat(valor));
  // Colocar el resultado de la suma en el control "span".
  document.getElementById('spSubTotalP').value = total;
  
};

function sumar6 (valor) {
  var total = 0;	
  valor = parseFloat(valor); // Convertir el valor a un entero (número).

  total = document.getElementById('spSubTotalAP').innerHTML;

  // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
  total = (total == null || total == undefined || total == "") ? 0 : total;

  /* Esta es la suma. */
  total = (parseFloat(total) + parseFloat(valor));

  // Colocar el resultado de la suma en el control "span".
  document.getElementById('spSubTotalAP').value = total;
};

function sumar5 () {
  var total = 0;	
  
  valor1 = parseFloat(document.getElementById('spSubTotalP').value);
  valor2 = parseFloat(document.getElementById('spSubTotalAP').value);
  
  // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
  valor1 = (valor1 == null || valor1 == undefined || valor1 == "" || valor1 === NaN) ? 0 : valor1;
  valor2 = (valor2 == null || valor2 == undefined || valor2 == "" || valor1 === NaN) ? 0 : valor2;
   
  total = parseFloat(valor1) + parseFloat(valor2); 
  /* Esta es la suma. */
  //total = (parseInt(total));

  // Colocar el resultado de la suma en el control "span".
  document.getElementById('spTotalP').value = total;
};

function sumar7 (valor) {
  var total = 0;	
  valor = parseFloat(valor); // Convertir el valor a un entero (número).

  total = document.getElementById('spSubTotalC').innerHTML;
  // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
  total = (total == null || total == undefined || total == "") ? 0 : total;
  /* Esta es la suma. */
  total = (parseFloat(total) + parseFloat(valor));
  // Colocar el resultado de la suma en el control "span".
  document.getElementById('spSubTotalC').value = total;
  
};

function validar(){

var total_activo = 0;
var total_pasivo = 0;
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

};


</script>

@endsection