@extends('layouts.app')

@section('content')


     <section class="content-header">
        <h1>
            Cambio de Apoderado Alumnos
        </h1>
   </section>
   <div class="content">


    <div class="clearfix">
        @include('flash::message')
    </div>
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   
                    {!! Form::open(array('method' => 'Post', 'route' => 'cambioApoderado') ) !!}
                    <!-- Rut Apoderado -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('Rut Apoderado', 'Rut Apoderado:') !!}
                        {!! Form::text('rutApoderado', null, ['class' => 'form-control','placeholder' => 'Ingrese Rut Apoderado','oninput'=>"checkRut(this)",'maxlength'=>"11", 'required'=>""]) !!}
                    </div>

                    <!-- Rut Alumno -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('Rut Alumno', 'Rut Alumno:') !!}
                        {!! Form::text('rutAlumno', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Rut Alumno','oninput'=>"checkRut(this)",'maxlength'=>"11", 'required'=>""]) !!}
                    </div>
                    <div class="form-group col-sm-6">
                   {!! Form::submit('Asignar Apoderado Alumno', ['class' => 'btn btn-primary']) !!}
                   {!! Form::close() !!}
                   </div>
               </div>
           </div>
       </div>
   </div>
 
    <script src="/js/validarRUT.js"></script>
@endsection

