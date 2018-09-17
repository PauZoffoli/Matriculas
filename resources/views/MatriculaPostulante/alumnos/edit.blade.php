@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Alumno
        </h1>
   </section>
   <div class="content">
@include('adminlte-templates::common.errors')
       <div class="alert alert-warning"><span class="glyphicon glyphicon-ok"></span><em> ERROR en Repitencias</em></div>
  @if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
       <div class="box box-primary">
           <div class="box-body">
               <div class="">
                   {!! Form::model($alumno, ['route' => ['alumnosPostulantes.update', $alumno->id], 'method' => 'patch']) !!}


<section class="content-header">
        <h1>
            1) Datos del Alumno/a {{ $alumno->PNombre . ' ' . $alumno->ApPat }}
        </h1> <br>
</section>
       <div class="box box-success" style="background-color: #E4FDE4!important;">
           <div class="box-body">
               <div class="row">
                 
                 @include('MatriculaPostulante.alumnos.fields')
                  
               </div>
           </div>
       </div>

<section class="content-header">
        <h1>
           2) Ficha Social del Alumno/a {{ $alumno->PNombre . ' ' . $alumno->ApPat }}
        </h1> <br>
</section>
       <div class="box box-success" style="background-color: #E4FDE4!important;">
           <div class="box-body">
               <div class="row">
                 
                @include('MatriculaPostulante.alumnos.fields_ficha_alumno')
                  
               </div>
           </div>
       </div>

<section class="content-header">
        <h1>
           3) Padre del Alumno/a {{ $alumno->PNombre . ' ' . $alumno->ApPat }}
        </h1> <br>
</section>
       <div class="box box-success" style="background-color: #E4FDE4!important;">
           <div class="box-body">
               <div class="row">
                 
                @include('MatriculaPostulante.alumnos.fieldsPadre')
                  
               </div>
           </div>
       </div>

<section class="content-header">
        <h1>
           4) Madre del Alumno/a {{ $alumno->PNombre . ' ' . $alumno->ApPat }}
        </h1> <br>
</section>
       <div class="box box-success" style="background-color: #E4FDE4!important;">
           <div class="box-body">
               <div class="row">
                 
                @include('MatriculaPostulante.alumnos.fieldsMadre')
                  
               </div>
           </div>
       </div>

<section class="content-header">
        <h1>
           5) Contacto Nro 1 del Alumno/a {{ $alumno->PNombre . ' ' . $alumno->ApPat }}
        </h1> <br>
</section>
       <div class="box box-success" style="background-color: #E4FDE4!important;">
           <div class="box-body">
               <div class="row">
                 
                @include('MatriculaPostulante.alumnos.fieldsContacto1')
                  
               </div>
           </div>
       </div>


<section class="content-header">
        <h1>
          6)  Contacto Nro 2 del Alumno/a {{ $alumno->PNombre . ' ' . $alumno->ApPat }}
        </h1> <br>
</section>
       <div class="box box-success" style="background-color: #E4FDE4!important;">
           <div class="box-body">
               <div class="row">
                 
                @include('MatriculaPostulante.alumnos.fieldsContacto2')
                  
               </div>
           </div>
       </div>



                      
                        
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('alumnos.index') !!}" class="btn btn-default">Cancel</a>
</div>


                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection