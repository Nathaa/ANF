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
                 <th>Datos de la Empresa</th>
                 </tr>

                </thead>
         </table>
         <table class="table table-bordered table-hover">


     <tbody>

         <tr>
             <th scope="row"><strong>Código:</strong></th>
             <td> <p> {{$empresa->codigo}}</p></td>
             <th scope="row"><strong>Descripción: </strong></th>
              <td><p> {{$empresa->descripcion}}</p></td>
         </tr>
          
         <tr>

        </tr>
           <tr>
               <th scope="row"><strong>Nombre:</strong></th>
                <td><p>{{ $empresa->nombre }}</p></td>
               <th scope="row"><strong>Rubro</strong></th>
               <td> <p> {{$empresa->rubro}}</p></td>
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
</form>

            </div>
    </div>
</div>
@endsection