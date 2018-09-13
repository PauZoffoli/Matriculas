@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Apoderado
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($apoderado, ['route' => ['apoderados.update', $apoderado->id], 'method' => 'patch']) !!}

                        @include('apoderados.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection