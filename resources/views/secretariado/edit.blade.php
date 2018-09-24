@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Revisar Contrato Matricula
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       
       
  @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
   
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">

                   {!! Form::model($persona, ['route' => ['PersonaSecretariadoContr.update', $persona->id], 'method' => 'patch']) !!}

                        @include('secretariado.fieldsPersona')

                   {!! Form::close() !!}


              
               </div>
           </div>
       </div>



<section class="content-header">
        <h1>
            Apoderado
        </h1> <br>
</section>
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                 
                   {!! Form::model($persona, ['route' => ['PersonaSecretariadoContr.update', $persona->id], 'method' => 'patch']) !!}

                        @include('secretariado.fieldsApoderado')
                        

                   {!! Form::close() !!}
               </div>
           </div>
       </div>

        <h1 class="pull-right">
<table>

  <tr>
        {!! Form::model($persona, ['route' => ['alumnoSecretariadoContr.update', $persona->apoderado->id], 'method' => 'patch']) !!}    
        
    <td>  <button  class="btn btn-primary ">Siguiente</button></td>
     {!! Form::close() !!}
  </tr>

 
</table>

        </h1>       
@endsection
   

