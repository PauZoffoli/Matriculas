@extends('layouts.app')

@section('ajax')
  <script src="{{ asset('js/Search/advertirQueLaPersonaYaExiste.js') }}"></script>
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Crear Persona Apoderado
        </h1>
    </section>
    <div class="content">
         <div class="clearfix">
            @include('flash::message')
        </div>
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
                {!! Form::open(array('route' => 'agregarApoPersona', 'method' => 'post')) !!}
            <div class="box-body">
                <div class="row">
         <div class="form-group col-sm-12">
                {!! Form::label('rut', 'Rut:') !!}
                {!! Form::text('rut', null, ['id' => 'rut', 'class' => 'form-control', 'placeholder' => 'Buscar rut apoderado','oninput'=>"checkRut(this)",'maxlength'=>"11"]) !!}
            </div>
            <div class="form-group col-sm-12">
                <center>
                    {!! Form::label('','' ,array('id' => 'error', 'style' => 'color:red;')) !!}   
                </center>
            </div>
            @include('MatriculaPostulante.personas.fieldsPersona')

                
            <!-- Email Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'required' => '', 'placeholder' => 'ejemplo@gmail.com', 'maxlength' => "100"]) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('tipoApoderado', 'Tipo Apoderado:') !!}
                {!! Form::select('tipoApoderado', ['1' => 'Apoderado Nuevo', '2' => 'Apoderado Antiguo'], null, array( 'class' => 'form-control')) !!}
            </div>
            {{-- POR ERROR NUESTRO ESTO QUEDARÁ ASÍ AHORA, CORREGIR, TODOS QUEDARON COMO 3 --}}
             <div class="form-group col-sm-6" style="display: none;">
                {!! Form::label('userRol', 'Rol Usuario:') !!}
    
                {!! Form::text('userRol', 3,  array( 'readonly'=>'', 'class' => 'form-control')) !!}
            </div>


            <div class="form-group col-sm-12">
              <div class="pull-right">
                {!! Form::submit('Guardar', [ 'class' => 'btn btn-primary', 'onclick' => 'inputTextToUpperCase()']) !!}
            </div>
        </div>
            
        
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    document.getElementById("rut").addEventListener("change", advertirQueExiste);
  </script>
        <script src="/js/validarRUT.js"></script>
@endsection