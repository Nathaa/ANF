@extends('template.plantilla2')
@section('content')

<div class="container">
     <th scope="row"></th>


     <div class="card">

        <div class="card-body">

<!-- LIQUIDEZ -->
<div align="center">
<p> Calculo de Razones de Liquidez </p>
</div>


<div style="float:left;width:50%;">
<p align="center">{{$mesanio1}}</p> 
    <table class="table table-bordered thead-dark table-hover table-sm">
            
            <tr>
   
              <th scope="col">Razon</th>
              
              <th scope="col">Resultado</th>
              
    
            </tr>
          </thead>
          <tbody>
             @foreach ($ratiosl as $ratiol)
              <tr>
              
               <td style="font-weight:bold;">{{$ratiol->nombre}}</td>
               <td align="right"> {{$ratiol->resultado}} %</td>
               
              </tr>
            @endforeach
   
          </tbody>
         </table>
</div>
<div style="float:left;width:50%;">
    <p align="center">{{$mesanio2}}</p>
    <table class="table table-bordered thead-dark table-hover table-sm">
            
            <tr>
   
            <th scope="col">Razon</th>
              
            <th scope="col">Resultado</th>
              
    
            </tr>
          </thead>
          <tbody>
          @foreach ($ratiosl2 as $ratiol2)
              <tr>
              
               <td style="font-weight:bold;">{{$ratiol2->nombre}}</td>
               <td align="right"> {{$ratiol2->resultado}} %</td>
               
              </tr>
        @endforeach
   
          </tbody>
         </table>

</div>

<!-- EFICIENCIA-->
<div align="center">
<p> Calculo de razones de Eficiencia o Actividad </p>
</div>


<div style="float:left;width:50%;">
<p align="center">{{$mesanio1}}</p> 
    <table class="table table-bordered thead-dark table-hover table-sm">
            
            <tr>
   
              <th scope="col">Razon</th>
              
              <th scope="col">Resultado</th>
              
    
            </tr>
          </thead>
          <tbody>
             @foreach ($ratios as $ratio)
              <tr>
              
               <td style="font-weight:bold;">{{$ratio->nombre}}</td>
               <td align="right"> {{$ratio->resultado}} %</td>
               
              </tr>
            @endforeach
   
          </tbody>
         </table>
</div>
<div style="float:left;width:50%;">
    <p align="center">{{$mesanio2}}</p>
    <table class="table table-bordered thead-dark table-hover table-sm">
            
            <tr>
   
            <th scope="col">Razon</th>
              
            <th scope="col">Resultado</th>
              
    
            </tr>
          </thead>
          <tbody>
          @foreach ($ratios2 as $ratio2)
              <tr>
              
               <td style="font-weight:bold;">{{$ratio2->nombre}}</td>
               <td align="right"> {{$ratio2->resultado}} %</td>
               
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

 
</div>
</div>
</div>

@endsection