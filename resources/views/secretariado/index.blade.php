@extends('layouts.app')

@section('content')

    <section class="content-header">
       <h1 class="pull-left">
            <table>
                <tr>
                    <td>Matriculas IDOP</td>
                </tr>
            </table>
        </h1>
 

        <h1 class="pull-right">
<table>

  <tr>
       {!! Form::open(array('method' => 'Get', 'route' => array('secretariadoContr.searchApoderado') )) !!}
    <td>     {!! Form::text('rutApoderado', null, ['class' => 'form-control', 'placeholder' => 'Buscar rut apoderado','oninput'=>"checkRut(this)",'maxlength'=>"11"]) !!}</td>
    <td>  <button  class="btn btn-primary ">Buscar Apoderado</button></td>
     {!! Form::close() !!}
  </tr>

 
</table>

        </h1>
    
  
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('secretariado.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

