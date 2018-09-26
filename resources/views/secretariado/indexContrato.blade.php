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
 Generar Contrato
</table>

        </h1>
    
  
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
<table class="table table-responsive" id="alumnos-table">
    <thead>
        <tr>
            <th>Apoderado</th>
            
        <th>Parentesco</th>
        <th>Nombre Alumno(a)</th>
        <th>Segundo Nombre Alumno(a)</th>
        <th>Apellido Alumno(a)</th>
        <th>Arancel</th>
        <th>Rut</th>
        <th colspan="3">Acción</th>
        </tr>
    </thead>
     <tbody >
        <?php $numero = 0; $total = 0; $montoCuota = 0;?>
    @foreach($alumnos as $alumno)
     @php 
     $total+=($alumno->curso['arancelAnual']);
     $idApo = $alumno->apoderado['id']; 
     $now = new \DateTime();
    @endphp
        <tr>
             <td>{!!  ( isset($alumno->apoderado->persona['PNombre'] ) ? $alumno->apoderado->persona['PNombre']  : null ) !!}
             {!!  ( isset($alumno->apoderado->persona['ApPat'] ) ? $alumno->apoderado->persona['ApPat']  : null ) !!}</td>
            <td>{!!  ( isset($alumno['parentesco'] ) ? $alumno['parentesco']  : null ) !!}</td>
            <td>{!!  ( isset($alumno->persona['PNombre']) ? $alumno->persona['PNombre'] : null ) !!}</td> 
            <td>{!!  ( isset($alumno->persona['SNombre']) ? $alumno->persona['SNombre'] : null ) !!}</td>
            <td>{!!  ( isset($alumno->persona['ApPat']) ? $alumno->persona['ApPat'] : null ) !!}</td>
            <td>{!!  ( isset($alumno->curso['arancelAnual']) ? $alumno->curso['arancelAnual'] : null ) !!}</td>
            <td>{!!  ( isset($alumno->persona['rut']) ? $alumno->persona['rut'] : null ) !!}</td>
               <td>
                {!! Form::open() !!}
                <div class='btn-group'>
                    <a href="{!! route('alumnoSecretariadoContr.ficha', ['alumno'=>$alumno]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i>Ver Ficha Alumno</a>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    <thead>
  <tr>
      <th>Total Escolaridad: </th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th><width="20px">${{$total}}</th>
      <th></th>
  </tr>
</thead>
     </tbody>

</table>
<br><br>
      </div>
        </div>
        <div class="">
           <td>
        {!! Form::open(['route' => 'ContratoSecretariadoContr.store']) !!}


              
<div class="form-group col-sm-6">
    {!! Form::label('nroCuotas', 'Número cuotas:') !!}
    {!! Form::number('nroCuotas', 11, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('anioAContratar', 'Año a contratar:') !!}
    {!! Form::number('anioAContratar', 2019, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('totalAPagar', 'Total a pagar:') !!}
    {!! Form::text('totalAPagar', $total, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('fechaContrato', 'Fecha contrato:') !!}
    {!! Form::date('fechaContrato', $now, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
   
    {!! Form::hidden('idApoderado', $idApo, ['class' => 'form-control']) !!}
</div>  

                <div class='btn-group'>
                  <input id='btnContrato' class="btn btn-primary" type='submit' name = 'btnContratoPagare' value = 'contrato'>
                  <input id='btnPagare' class="btn btn-primary" type='submit' name = 'btnContratoPagare' value = 'pagare'>
                  <input id='btnFicha' class="btn btn-primary" type='submit' name = 'btnContratoPagare' value = 'ficha'>                    
                </div>
                {!! Form::close() !!}
            </td>
        </div>
    </div>
@endsection

