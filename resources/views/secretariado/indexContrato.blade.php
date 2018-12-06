@extends('layouts.app')

@section('content')

<section class="content-header">
 <h1 class="pull-left">
  <table>
    <tr>
      <td>Matriculas IDOP
        <a   class="btn btn-primary " href="{{ URL::previous() }}">Regresar</a>
      </td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>
        <a class="btn btn-primary "  href="{!! route('apoSecretariadoContr.index') !!}"><span class="glyphicon glyphicon-home"></span></a></td>
      <td>Volver a inicio</td>
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
    {{ Form::open(array('route' => array('ContratoSecretariadoContr.store'

    ))) }}


  <div class="clearfix"></div>
  <div class="box box-primary">
    <div class="box-body">
      <table class="table table-responsive" id="alumnos-table">
        <thead>
          <tr>
            <th>Nombre Apoderado(a)</th>
            <th>Parentezco</th>
            <th>Nombre Alumno(a)</th>
            <th>Arancel</th>
            <th>Rut</th>
            <th >% Beca (0 a 100)</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody >
          <?php $numero = 0; $total = 0; $montoCuota = 0;?>
         
          @foreach($alumnos  as $key =>  $alumno)
          @php 
          $total+=($alumno->curso['arancelAnual']);
          $idApo = $alumno->apoderado['id']; 
          $now = new \DateTime();
          @endphp
          <tr>
            <td>
              {!!  ( isset($alumno->apoderado->persona['PNombre'] ) ? $alumno->apoderado->persona['PNombre']  : null ) !!}
              {!!  ( isset($alumno->apoderado->persona['ApPat'] ) ? $alumno->apoderado->persona['ApPat']  : null ) !!}
            </td>
            <td>
              {!!  ( isset($alumno['parentesco'] ) ? $alumno['parentesco']  : null ) !!}
            </td>
            <td>
              {!!  ( isset($alumno->persona['PNombre']) ? $alumno->persona['PNombre'] : null ) !!}
              {!!  ( isset($alumno->persona['SNombre']) ? $alumno->persona['SNombre'] : null ) !!}
              {!!  ( isset($alumno->persona['ApPat']) ? $alumno->persona['ApPat'] : null ) !!}
              <td>
                <label id="alumno->curso['arancelAnual']" name="alumno->curso['arancelAnual']">
                 {!!  ( isset($alumno->curso['arancelAnual']) ? $alumno->curso['arancelAnual'] : null ) !!}
               </label> 
             </td>
             <td>
              {!!  ( isset($alumno->persona['rut']) ? $alumno->persona['rut'] : null ) !!}
            </td>

            <td class="form-group col-sm-2">
              {{-- TRAER LA BECA MÁS GRANDE DEPENDIENDO DEL AÑO --}}
              @if (strrpos(url()->full(),"Anio"))
                @php
                   $ultimaBeca = $alumno->becas()->where('anioBeca',  date('Y'))->orderBy('porcentaje', 'desc')->first()
                 @endphp 
              @else
               @php
                   $ultimaBeca = $alumno->becas()->where('anioBeca',  date('Y')+1)->orderBy('porcentaje', 'desc')->first()
                 @endphp 
              @endif

               @if ( ( isset($ultimaBeca['porcentaje'] ) ? $ultimaBeca['porcentaje']  : 0 ) == 100)
                  {!! Form::number('beca[' . $key  . ']',
                      ( isset($ultimaBeca['porcentaje'] ) ? $ultimaBeca['porcentaje']  : 0 ),
                        ['class' => 'form-control', 'readOnly' => '','name' => 'beca[' . $key  . ']']) 
                   !!}    
               @else
                   {!! Form::number('beca[' . $key  . ']',
                      ( isset($ultimaBeca['porcentaje'] ) ? $ultimaBeca['porcentaje']  : 0 ),
                        ['class' => 'form-control', 'required' => '',  'name' => 'beca[' . $key  . ']']) 
                   !!}    
               @endif
                             
           </td>

            <td>
              {!! Form::open() !!}
              <div class='btn-group'>
                <a href="{!! route('alumnoSecretariadoContr.edit', [$alumno->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i>Ver Ficha Alumno</a>
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
              <th><width="20px">${{ Form::label('arancelAnualAlumnos', $total, array('id' => 'arancelAnualAlumnos', 'name' => 'arancelAnualAlumnos')) }}</th>
              <input type="hidden" name="arancelAnualAlumnos" value="<?php echo $total; ?>">
              
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



    {{-- https://stackoverflow.com/questions/38412091/get-only-specific-attributes-with-from-laravel-collection --}}

    <div class="form-group col-sm-6">
      {!! Form::label('nroCuotas', 'Número cuotas:') !!}
      {!! Form::number('nroCuotas', 11, ['class' => 'form-control','required' => 'true']) !!}
    </div>

    <div class="form-group col-sm-6">
      {!! Form::label('PorcentajeBeca', '% Total Beca:') !!}
      {!! Form::number('PorcentajeBeca', 0, ['class' => 'form-control','required' => 'true' ,'step' => '0.1']) !!}
    </div>

{{-- DEPENDE DE LA SELECCIÓN DEL USUARIO SI SE CONTRATARÁ PARA ESTE O EL SIGUIENTE AÑO, ESTO SE REFLEJARÁ EN LA EXISTENCIA O NO DE  --}}
{{-- LA VARIABLE ANIO EN LA URL --}}

@if (strrpos(url()->full(),"Anio"))
  <div class="form-group col-sm-6">
      {!! Form::label('anioAContratar', 'Año a contratar:') !!}
       {!! Form::number('anioAContratar',  date('Y'), ['class' => 'form-control','required' => 'true', 'readOnly' => "" ]) !!}
    </div>
@else
  <div class="form-group col-sm-6">
      {!! Form::label('anioAContratar', 'Año a contratar:') !!}
       {!! Form::number('anioAContratar',  date('Y') +1, ['class' => 'form-control','required' => 'true', 'readOnly' => "" ]) !!}
    </div>
@endif


    <div class="form-group col-sm-6">
      {!! Form::label('totalAPagar', 'Total a pagar:') !!}
      {!! Form::text('totalAPagar', $total, ['class' => 'form-control','required' => 'true']) !!}
    </div>

    <div class="form-group col-sm-6">
      {!! Form::label('fechaContrato', 'Fecha contrato:') !!}
      {!! Form::date('fechaContrato', $now, ['class' => 'form-control','required' => 'true']) !!}
    </div>
    <div class="form-group col-sm-6">

      {!! Form::hidden('idApoderado', $idApo, ['class' => 'form-control']) !!}
    </div>  

    @php
    $idAlumnos = collect($alumnos)->map(function ($user) {
      return collect($user->toArray())
      ->only(['id'])
      ->all();
    });
    @endphp

    <input type="hidden" id="idAlumnos" name="idAlumnos" value="{{$idAlumnos }}">




    <!--MÉTODO PARA SOLO SACAR EL ID DEL ALUMNO DE LA COLECCION $ALUMNOS-->

    <div class='btn-group'>
      <input id='btnContrato' class="btn btn-primary" type='submit' name = 'btnContratoPagare' value = 'contrato'>
      <input id='btnPagare' class="btn btn-primary" type='submit' name = 'btnContratoPagare' value = 'pagare'>

    </div>
    {!! Form::close() !!}
  </td>
</div>
</div>


@endsection

