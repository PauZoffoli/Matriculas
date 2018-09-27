

@extends('layouts.app')



@section('content')
    <section class="content-header">
        <h1>
            Persona
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
<div class="content-header ">
                    {!! Form::open(['route' => 'contactos.store']) !!}
                    <br>
 {!! Form::label('cantidadDeContactos', 'Seleccione la cantidad de contactos que desea inscribir:') !!}
{!! Form::select('cantidadDeContactos', [0, 1,2,3,4,5, 6],  ( isset($_GET['cantidad']) ? $_GET['cantidad'] : null ),  array('id' => 'cantidadDeContactos', 'class' => 'form-control','placeholder' =>"Seleccione una opción", 'required' =>'true', 'onchange'=>"document.location.href = '/contactos/create/?cantidad=' + this.value")) !!}
</div>
{{ $array = null }}



@if(isset($_GET['cantidad']))
@php
  $start = $_GET['cantidad'];
@endphp



@if ($start != null)
 

                      
@php
   for ($i = 1; $i <= $start; $i++) {  @endphp
                       
<section class="content-header">
        <h1>
           {{ $i }} ) Datos de Contacto
        </h1> <br>
</section>
       <div class="box box-success" style="background-color: #E4FDE4!important;">
           <div class="box-body">
               <div class="row">
                 
                 @include('MatriculaPostulante.alumnos.fieldsContacto1', ['myValue' => $i])

                  
               </div>
           </div>
       </div>
                 
               
                

            
                    @php  } @endphp

                   
 
                    

@endif

@endif



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
   
</div>

                  
                    {!! Form::close() !!}
             
        </div>
    </div>

<script >


</script>

@endsection
