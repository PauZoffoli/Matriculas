@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipo
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipo, ['route' => ['tipos.update', $tipo->id], 'method' => 'patch']) !!}

                        @include('tipos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection