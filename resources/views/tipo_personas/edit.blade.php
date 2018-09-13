@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipo Persona
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipoPersona, ['route' => ['tipoPersonas.update', $tipoPersona->id], 'method' => 'patch']) !!}

                        @include('tipo_personas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection