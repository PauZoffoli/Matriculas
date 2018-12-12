
@extends('layouts.app')

@section('content')
    <section class="content-header"  style="color: #5B5494;">
        <h1>
            DATOS DEL ALUMNO  
           
        </h1>
   </section>
   <div class="content">
@include('adminlte-templates::common.errors')
       <div class="alert alert-warning"><span class="glyphicon glyphicon-ok"></span><em>LOS SIGUIENTES DATOS SON ÚNICA Y EXCLUSIVAMENTE REFERIDOS AL ALUMNO</em></div>
  @if(Session::has('flash_message'))
    <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif


       <div class="">
           <div class="box-body">
               <div class="">

<!-- -->


@php
  $var = 'alumnosPostulantes';
  $estaGenerandoContrato = (strrpos(url()->full(), "generandoContrato"));
@endphp
  
 @if ( $estaGenerandoContrato)
   @php
   $var = 'alumnosPostulantesRevisor'
   @endphp
@endif


@php
  $thisYear = '';
  $anio = (strrpos(url()->full(), "Anio"));
@endphp
  
 @if ( $anio)
   @php
   $thisYear = 'Anio'
   @endphp
@endif

    {!! Form::model($persona, ['route' => [

                   $var.'.update', $persona->id , $thisYear 

                    ], 'method' => 'patch']) !!}
                    

 @csrf
<input type="hidden" name="clear" value="Clear Form" onclick="clearForm(this.form);">
 <div class="box box-solid box-primary" style="background-color: #E5ECFB!important;">

@if( auth()->user()->hasRole('Secretariado') != true && auth()->user()->hasRole('Administrador') != true)
  <div class="pull-right">
      <div class="form-group  ">
        {!! Form::label('idCursoPostu', 'Curso a Postular para 2019:') !!}
        {!! Form::select('alumno[idCursoPostu]', App\Enums\CursoEnum::getPossibleENUM(), ( isset($persona->alumno->idCursoPostu) ? $persona->alumno->idCursoPostu : null ) ,  array('id'=> 'alumno[idCursoPostu]', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Seleccione el curso a postular' , "readonly"=>"readonly", 'disabled' => 'disabled')) !!}
      </div>
  </div>
@endif


  
<section class="content-header">
        <h1>
            1) Datos del Alumno/a {{ $persona->PNombre . ' ' . $persona->ApPat . ' RUT ' . $persona->rut }} 
      
  </h1> <br>
   
      
</section>
         

           <div class="box-body">
               <div class="row">


<div class="box-body">
<!-- Idcomuna Field -->
<!-- Submit Field -->

<!-- Idcursopostu Field -->
@if( auth()->user()->hasRole('Secretariado') === true || auth()->user()->hasRole('Administrador') === true)
   <div class="">
      <div class="form-group  col-sm-12">
 {!! Form::label('idCursoPostu', 'Curso a Postular para 2019:') !!}
      {!! Form::select('alumno[idCursoPostu]', App\Enums\CursoEnum::getPossibleENUM(), ( isset($persona->alumno->idCursoPostu) ? $persona->alumno->idCursoPostu : null ) ,  array('id'=> 'alumno[idCursoPostu]', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Seleccione el curso a postular' )) !!}
      </div>
</div>
@endif

                  @include('MatriculaPostulante.personas.fieldsPersona')
                  
                 @include('MatriculaPostulante.alumnos.fields')
                  @include('MatriculaPostulante.direccions.fields')
         
    
               </div>

                  
               </div>
           </div>
       </div>
<div class="box box-solid box-primary" style="background-color: #E5ECFB!important;">
<section class="content-header">
        <h1>
           2) Ficha Social del Alumno/a {{ $persona->PNombre . ' ' . $persona->ApPat }}
        </h1> <br>
</section>
        <div class="form-group col-sm-12">

</div>
           <div class="box-body">
               <div class="row">
                 
                @include('MatriculaPostulante.alumnos.fields_ficha_alumno')
                   <div class="form-group col-sm-12">
                 

              
</div>

               </div>
           </div>
       </div>

 <div class="box box-solid box-primary" style="background-color: #E5ECFB!important;">
<div id="esPadre">
<section class="content-header">

        <h1>
           3) Padre del Alumno/a {{ $persona->PNombre . ' ' . $persona->ApPat }}
           <br>
         
              <table>
            <tr>
              <td style="width:10%;">
                <center>
                  
 {!!  "<input type='checkbox' style='width: 30px; height: 30px;' id='tienePadre'  onclick='sinPadre();'>" !!}
                </center>
              </td>

              <td style="height: 100px;">
                {!!  "<label style=' width: 100%;
  display: flex;
  align-items: center;'
   >En caso que no posea algún dato obligatorio, marque la casilla.</label>" !!}      
              </td>
            </tr>
          </table>
         
        </h1> <br>
</section>
        
           <div class="box-body">
               <div class="row">
               
                @include('MatriculaPostulante.alumnos.fieldsPadre')
                  
               </div>
           </div>
       </div>
</div>
<div class="box box-solid box-primary" style="background-color: #E5ECFB!important;">
<div id="esMadre">
<section class="content-header">
        <h1>
           4) Madre del Alumno/a {{ $persona->PNombre . ' ' . $persona->ApPat }}
           <table>
            <tr>
              <td style="width:10%;">
                <center>
                  
 {!!  "<input type='checkbox' style='width: 30px; height: 30px;' id='tieneMadre'  onclick='sinMadre();'>" !!}
                </center>
              </td>

              <td style="height: 100px;">
                {!!  "<label style=' width: 100%;
  display: flex;
  align-items: center;'
   >En caso que no posea algún dato obligatorio, marque la casilla.</label>" !!}      
              </td>
            </tr>
          </table>
        </h1> 
</section>
           <div class="box-body">
               <div class="row">    
                @include('MatriculaPostulante.alumnos.fieldsMadre')
               </div>
           </div>
       </div>
</div>


@php
  $cantContactos = null;
@endphp
@if (isset($persona->alumno->fichaAlumno))
  @if ($persona->alumno->fichaAlumno->PNombrePContacto != null)
    @php $cantContactos = $cantContactos + 1  @endphp
  @endif

  @if ($persona->alumno->fichaAlumno->PNombreSContacto != null)
    @php $cantContactos = $cantContactos +1    @endphp
  @endif
@endif

 {!! Form::label('cantidadDeContactosLBL', 'En caso de emergencia, ¿Cuántas personas desea dejar de contacto?') !!}
{!! Form::select('fichaAlumno[0][cantidadContactos]', [ 0,1, 2],  $cantContactos ,  array('id' => 'cantidadDeContactos', 'class' => 'form-control','placeholder' =>"¿Cuántos contactos quiere para su alumno?", 'required' =>'true')) !!}
<br>

<div class="box box-solid box-primary"  id="headerPrimerContacto" name="headerPrimerContacto" style="background-color: #E5ECFB!important;">       
<section class="content-header" >
        <h1>
           5) Contacto Nro 1 del Alumno/a {{ $persona->PNombre . ' ' . $persona->ApPat }}
        </h1> <br>

@php
// TODO ESTO ES PARA DEFINIR LA OPCIÓN ESCOGIDA DEL PRIMER Y SEGUNDO CONTACTO
  $primerContacto = null;
   $segundoContacto = null;
@endphp

@if (isset($persona->alumno->fichaAlumno->parentescoPContacto))


  @if (!(strcmp($persona->alumno->fichaAlumno->parentescoPContacto, "Padre")))
    @php ($primerContacto =  1)
  @endif

   @if (!(strcmp($persona->alumno->fichaAlumno->parentescoPContacto, "Madre")))
    @php ($primerContacto =  2)
  
  @endif

   @if ((strcmp($persona->alumno->fichaAlumno->parentescoPContacto, "Padre") && strcmp($persona->alumno->fichaAlumno->parentescoPContacto, "Madre")))
    @php ($primerContacto =  0)
  @endif


@endif

@if (isset($persona->alumno->fichaAlumno->parentescoSContacto))


  @if (!(strcmp($persona->alumno->fichaAlumno->parentescoSContacto, "Padre")))
    @php ($segundoContacto =  1)
  @endif

   @if (!(strcmp($persona->alumno->fichaAlumno->parentescoSContacto, "Madre")))
    @php ($segundoContacto =  2)
  
  @endif

   @if ((strcmp($persona->alumno->fichaAlumno->parentescoSContacto, "Padre") && strcmp($persona->alumno->fichaAlumno->parentescoSContacto, "Madre")))
    @php ($segundoContacto =  0)
  @endif


@endif


         {!! Form::label('padreOMadrePC', '¿Quién es el primer contacto?') !!}

                 {!! Form::select('padreOMadrePC', [ 'No es el padre ni la madre','Padre' ,'Madre'],  
$primerContacto
                  ,  array('id' => 'padreOMadrePC', 'class' => 'form-control','placeholder' =>"Seleccione una opción", 'required' =>'true')) !!}
          <br>
</section>
    
          <div  id="datosPrimerContacto" name="datosPrimerContacto" >
           <div class="box-body">
               <div class="row">
                 
                @include('MatriculaPostulante.alumnos.fieldsContacto1')
                  
               </div>
           </div>
       </div>
</div>                  
<div class="box box-solid box-primary"  id="headerSegundoContacto" name="headerSegundoContacto"  style="background-color: #E5ECFB!important;">       
<section class="content-header">
        <h1>
          6)  Contacto Nro 2 del Alumno/a {{ $persona->PNombre . ' ' . $persona->ApPat }}
          <br>
        </h1> 
         {!! Form::label('padreOMadreSC', '¿Quién es el segundo contacto?') !!}
                 {!! Form::select('padreOMadreSC', [ "0" =>'No es el padre ni la madre', 'Padre' ,'Madre'], $segundoContacto ,  array('id' => 'padreOMadreSC', 'class' => 'form-control', 'placeholder' =>"Seleccione una opción", 'required' =>'true')) !!}
                 <br>
</section>

       <div id="datosSegundoContacto" name="datosSegundoContacto"  >
           <div class="box-body">
               <div class="row">
                 
                @include('MatriculaPostulante.alumnos.fieldsContacto2')
                  
               </div>
           </div>
       </div>
</div>  


                      
                        
<!-- Submit Field -->
<div class="form-group col-sm-12">
  <div class="pull-right">
    {!! Form::submit('Guardar', ['id' => 'submit', 'class' => 'btn btn-primary', 'onclick' => 'inputTextToUpperCase()']) !!}
  </div>
</div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
 </div>

<script src="{{ asset('js/sinPadreSinMadre.js') }}"></script>
<script src="{{ asset('js/Format/formatNumberAfter3Digits.js') }}"></script>
@endsection