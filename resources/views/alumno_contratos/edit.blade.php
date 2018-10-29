@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Alumno Contrato
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($alumnoContrato, ['route' => ['alumnoContratos.update', $alumnoContrato->id], 'method' => 'patch']) !!}

                        @include('alumno_contratos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection