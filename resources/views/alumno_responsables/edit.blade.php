@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Alumno Responsable
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($alumnoResponsable, ['route' => ['alumnoResponsables.update', $alumnoResponsable->id], 'method' => 'patch']) !!}

                        @include('alumno_responsables.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection