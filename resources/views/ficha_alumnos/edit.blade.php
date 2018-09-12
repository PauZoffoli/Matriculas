@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ficha Alumno
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($fichaAlumno, ['route' => ['fichaAlumnos.update', $fichaAlumno->id], 'method' => 'patch']) !!}

                        @include('ficha_alumnos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection