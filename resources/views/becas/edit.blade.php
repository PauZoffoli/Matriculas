@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Beca
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($beca, ['route' => ['becas.update', $beca->id], 'method' => 'patch']) !!}

                        @include('becas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection