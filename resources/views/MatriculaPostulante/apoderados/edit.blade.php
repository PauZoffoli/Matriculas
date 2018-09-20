@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Apoderado
        </h1>
   </section>
   <div class="content">

<!--CAPTURANDO LA VARIABLE DE ERROR QUE VIENE DDESDE EL CONTROLADOR-->
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($persona, ['route' => ['apoderadosPostulantes.update', $persona->id], 'method' => 'patch']) !!}

                        @include('MatriculaPostulante.apoderados.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection