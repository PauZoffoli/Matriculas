@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Alumno
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
  @if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($alumno, ['route' => ['alumnosPostulantes.update', $alumno->id], 'method' => 'patch']) !!}

                        @include('MatriculaPostulante.alumnos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection