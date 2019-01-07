@extends('layouts.app')

@section('ajax')
  <script src="{{ asset('js/Search/advertirQueLaPersonaYaExiste.js') }}"></script>
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Crear Alumno
        </h1>
    </section>
    <div class="content">
         <div class="clearfix">
            @include('flash::message')
        </div>
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
                {!! Form::open(array('route' => 'agregarAluPersona', 'method' => 'post')) !!}
            <div class="box-body">
                <div class="row">
         <div class="form-group col-sm-12">
                {!! Form::label('rut', 'Rut:') !!}
                {!! Form::text('rut', null, ['id' => 'rut', 'class' => 'form-control', 'placeholder' => 'Buscar rut alumno','oninput'=>"checkRut(this)",'maxlength'=>"11"]) !!}
            </div>
            <div class="form-group col-sm-12">
                <center>
                    {!! Form::label('','' ,array('id' => 'error', 'style' => 'color:red;')) !!}   
                </center>
            </div>

<div id="rellenarDatos" >
            @include('MatriculaPostulante.personas.fieldsPersona')

                
            <!-- Email Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'required' => '', 'placeholder' => 'ejemplo@gmail.com', 'maxlength' => "100"]) !!}
            </div>
           <!-- Parentesco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parentesco', 'Parentesco del APODERADO con el alumno:') !!}
    {!! Form::select('alumno[parentesco]', App\Enums\ParentescoAlumnoEnum::getPossibleENUM(), ( isset($persona->alumno->parentesco) ? $persona->alumno->parentesco : null ) ,  array('id'=> 'alumno[parentesco]', 'class' => 'form-control', 'placeholder' => 'Seleccione el parentesco del Apoderado con el alumno', 'required' => 'true')) !!}
</div>
        <div class="form-group col-sm-6">
                {!! Form::label('tipoAlumno', 'Tipo Alumno:') !!}
                {!! Form::select('tipoAlumno', ['11' => 'Alumno Nuevo', '3' => 'Alumno Antiguo', '4' => 'Alumno Postulante'], null, array( 'class' => 'form-control')) !!}
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
    </div>

<script type="text/javascript">
    document.getElementById("rut").addEventListener("change", advertirQueExiste);
  </script>
        <script src="/js/validarRUT.js"></script>
@endsection