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
        
          <form action=""  method="POST" role="form">
        
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        

                <div class="form-group">
                <div class="row">
                
              
            <tr>
   
              <th scope="col">Cuentas</th>
              <th scope="col"><label for="monto[]" class="control-label">{{'Monto'}}</label></th>
              <!--<th scope="col">Fecha Inicio</th>
              <th scope="col">Fecha Finalizacion</th>-->
    
            </tr>
          </thead>
          <tbody>
            @foreach ($balances as $balance)
             <tr>
             <?php if($balance->nombre == "ACTIVO" || $balance->nombre == "ACTIVO CORRIENTE" || $balance->nombre == "ACTIVO NO CORRIENTE"
                   || $balance->nombre == "PASIVO" || $balance->nombre == "PASIVO CORRIENTE" || $balance->nombre == "PASIVO NO CORRIENTE"
                   || $balance->nombre == "PATRIMONIO"){ ?>
              <td style="font-weight:bold; font-family: cursive;">{{$balance->nombre}}</td>
              <td align="right" style="font-family: cursive;" >$ {{$balance->monto}}</td>
              <?php }else{ ?>
              <td>{{$balance->nombre}}</td>
              <td align="right">$ {{$balance->monto}}</td>
              <?php } ?>   
             </tr>
           @endforeach
  
         </tbody>
        </table>
        
        <br>
        <form>
            <div align="left">
              <input type="button" value="VOLVER ATRÁS" name="Back2" onclick="history.back()" />
              </div>
             </form>
   </form>
           </div>
   </div>
</div>

@endsection