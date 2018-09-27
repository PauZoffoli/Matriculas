@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Repitencias
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($repitencias, ['route' => ['repitencias.update', $repitencias->id], 'method' => 'patch']) !!}

                        @include('repitencias.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection