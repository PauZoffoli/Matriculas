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
               <div class="row">
                   {!! Form::model($alumno, ['route' => ['alumnosPostulantes.update', $alumno->id], 'method' => 'patch']) !!}

                        @include('MatriculaPostulante.alumnos.fields')
                        @include('MatriculaPostulante.alumnos.fields_ficha_alumno')

                        
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