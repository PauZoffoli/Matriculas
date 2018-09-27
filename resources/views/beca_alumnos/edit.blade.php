@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Beca Alumno
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($becaAlumno, ['route' => ['becaAlumnos.update', $becaAlumno->id], 'method' => 'patch']) !!}

                        @include('beca_alumnos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection