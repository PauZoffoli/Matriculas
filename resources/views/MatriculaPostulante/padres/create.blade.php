

@extends('layouts.app')



@section('content')
    <section class="content-header">
        <h1>
            Padres
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
<div class="content-header ">
                    {!! Form::open(['route' => 'contactos.store']) !!}
                    <br>
 {!! Form::label('cantidadDeContactos', 'Seleccione la cantidad de contactos que desea inscribir:') !!}
{!! Form::select('cantidadDeContactos', [0, 1,2,3,4,5, 6],  ( isset($_GET['cantidad']) ? $_GET['cantidad'] : null ),  array('id' => 'cantidadDeContactos', 'class' => 'form-control','placeholder' =>"Seleccione una opción", 'required' =>'true', 'onchange'=>"document.location.href = '/padres/create/?cantidad=' + this.value")) !!}
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
           {{ $i }} ) Datos del Padre o Madre
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
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
   
</div>

                  
                    {!! Form::close() !!}
             
        </div>
    </div>

<script >


</script>

@endsection
