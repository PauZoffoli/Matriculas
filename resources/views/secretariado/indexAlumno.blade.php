@extends('layouts.app')

@section('content')

    <section class="content-header">
       <h1 class="pull-left">
            <table>
                <tr>
                    <td>Matriculas IDOP</td>
                    <td>&nbsp;</td> 
                    <td><a class="btn btn-primary "  href="{!! route('apoSecretariadoContr.index') !!}"><span class="glyphicon glyphicon-repeat"></span></a></td>
                </tr>
            </table>
        </h1>
 

        <h1 class="pull-right">
<table>

 
</table>

        </h1>
    
  
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
<table class="table table-responsive" id="postulacions-table">
    <thead>
        <tr>
        <th>Primer Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Rut</th>
        <th>Género</th>
         <th>tipos</th>
            <th colspan="3">Acción</th>
        </tr>

    </thead>
    <tbody >
    @foreach($personas as $persona)
        <tr>
            <td>{!! $persona->PNombre  !!}</td>
            <td>{!! $persona->ApPat !!}</td>
            <td>{!! $persona->ApMat  !!}</td>
            <td>{!! $persona->rut !!}</td>
            <td>{!! $persona->genero !!}</td>
            
            <td>
                @foreach ($persona->tipos as $element)
                    {{ $element->nombre }}
                @endforeach
            </td>
            <td>
                {!! Form::open() !!}
                <div class='btn-group'>
                    <a href="{!! route('apoSecretariadoContr.edit', [$persona->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i>Revisar datos alumno</a>
                   
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

