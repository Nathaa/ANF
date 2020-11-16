@extends('template.plantilla2')
@section('content')

<div class="container">
     <th scope="row"></th>


     <div class="card">

        <div class="card-body">
 <?php if ($boton == 'AV') { ?>
<div align="center">
<p> ANÁLISIS VÉRTICAL </p>
</div>


<div style="float:left;width:50%;">
<p align="center">{{$mesanio1}}</p> 
    <table class="table table-bordered thead-dark table-hover table-sm">
            
            <tr>
   
              <th scope="col">Cuenta</th>
              
              <th scope="col">Porcentaje</th>
              
    
            </tr>
          </thead>
          <tbody>
             @foreach ($balances as $balance)
              <tr>
              
               <td style="font-weight:bold;">{{$balance->nombre}}</td>
               <td align="right"> {{$balance->AV}} %</td>
               
              </tr>
            @endforeach
   
          </tbody>
         </table>
</div>
<div style="float:left;width:50%;">
    <p align="center">{{$mesanio2}}</p>
    <table class="table table-bordered thead-dark table-hover table-sm">
            
            <tr>
   
              <th scope="col">Cuenta</th>
              
              <th scope="col">Porcentaje</th>
              
    
            </tr>
          </thead>
          <tbody>
             @foreach ($balances2 as $balance2)
              <tr>
              
               <td style="font-weight:bold;">{{$balance2->nombre}}</td>
               <td align="right"> {{$balance2->AV}} %</td>
               
              </tr>
            @endforeach
   
          </tbody>
         </table>

</div>
<form>
        <div align="left">
          <input type="button" value="VOLVER ATRÁS" name="Back2" onclick="history.back()" />
          </div>
         </form>

  <?php } else { ?> 
    <div align="center">
<p> ANÁLISIS HORIZONTAL </p>
</div>


<div style="float:left;width:100%;">
<p align="center">{{$mesanio1}} y {{$mesanio2}}</p> 
    <table class="table table-bordered thead-dark table-hover table-sm">
            
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Variacion</th>              
              <th scope="col">Porcentaje</th>
              
    
            </tr>
          </thead>
          <tbody>
             @foreach ($resultados as $resultado)
              <tr>
              
               <td style="font-weight:bold;">{{$resultado->nombre}}</td>
               <td align="right">${{$resultado->monto}}</td>
               <td align="right">{{$resultado->porcentaje}} %</td>
               
              </tr>
            @endforeach
   
          </tbody>
         </table>
</div>

        <form>
        <div align="left">
          <input type="button" value="VOLVER ATRÁS" name="Back2" onclick="history.back()" />
          </div>
         </form>  
         
   <?php } ?>
</div>
</div>
</div>
@endsection