@extends('template.plantilla2')


@section('crear')

@endsection


@section('content')

 <div class="container">
     <th scope="row"></th>


     <div class="card">

        <div class="card-body">

         <table class="table table-bordered table-hover">
             <thead class="bg-primary">
                 <tr>
                 <th>Datos de Tipo de cuenta</th>
                 </tr>

                </thead>
         </table>
         <table class="table table-bordered table-hover">


     <tbody>

         <tr>
             <th scope="row"><strong>Nombre:</strong></th>
             <td><p><strong> {{$tipocuenta->nombre}}<strong></p></td>
           
              <th scope="row"><strong>Descripción :</strong></th>
                <td><p><strong>{{ $tipocuenta->descripcion }}</strong></p></td>
         </tr>
          
         <tr>

        </tr>
           <tr>
            <th scope="row"><strong>Subtipo: </strong></th>
            <td><p><strong> {{$tipocuenta->subtipo}}</strong></p></td>
           </tr>
        <tr>

        </tr>
            </tbody>
    </table>
  <br>
    <form>
      <div align="left">
        <input type="button" value="VOLVER ATRÁS" name="Back2" onclick="history.back()" />
        </div>
       </form>
            </div>
    </div>
</div>
@endsection