@extends('layouts.app')

@section('content')
    <section class="content-header"  style="color: green;">
        <h1>
            DATOS DEL APODERADO
        </h1>
   </section>
 <div class="content">

<!-- SECCION PARA VER A QUE CICLO ENTRAMOS SI  -->
@php
  $var = ''
@endphp

 @if (strrpos(url()->full(), "generandoContrato"))
   @php
   $var = 'generandoContrato'
   @endphp
@endif

@php
  $var2 = ''
@endphp

 @if (strrpos(url()->full(), "Anio"))
   @php
   $var2 = 'Anio'
   @endphp
@endif

<!--CAPTURANDO LA VARIABLE DE ERROR QUE VIENE DDESDE EL CONTROLADOR-->

       @include('adminlte-templates::common.errors')
        <div class="box-header with-border">
       <div class="box box-solid box-success" style="background-color: #E4FDE4!important;">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($persona, ['route' => ['apoderadosPostulantes.update', $persona->id, $var, $var2], 'method' => 'patch']) !!}
 @csrf
<div class="box-body">


<section class="content-header" >
        <h1>
           RUT {{ $persona->rut }} 
        </h1> <br>
</section>

                        @include('MatriculaPostulante.personas.fieldsPersona')

                        @include('MatriculaPostulante.apoderados.fields')

                         @include('MatriculaPostulante.direccions.fields')
                         </div>

                         <!--DESPLEGAMOS A LOS ALUMNOS ASOCIADOS-->
                         <!--DESPLEGAMOS A LOS ALUMNOS ASOCIADOS-->
                         <!--DESPLEGAMOS A LOS ALUMNOS ASOCIADOS-->
                         <!--DESPLEGAMOS A LOS ALUMNOS ASOCIADOS-->
<center>
<div class="box-body">
<section class="content-header" >

        <h1>
           Seleccione a los alumnos que desea Matricular
        </h1> <br>
</section>
<!-- MOSTRAMOS TODOS LOS ALUMNOS ASOCIADOS-->
@php $index = 0; @endphp
@foreach ($persona->apoderado->alumnos  as $alumno)
    <p><table >
  <tr>
        <td  style="width:10%;" >
        
       {{ Form::checkbox('alumnosCheck['. $index++ .']', $alumno->idPersona, $persona->apoderado->alumnos->contains($alumno->id),array('checked'=>'true','style' => "width: 30px; height: 30px;") ) }}
       </td>
    <td style="height: 50%; ">    <center> {{ Form::label('alumno', $alumno->persona->PNombre . ' ' . $alumno->persona->ApPat . ' ' . $alumno->persona->rut  ) }} </center></td>
  </tr>
</table>
       
    </p>
@endforeach
</div>
</center>


                         <!--DESPLEGAMOS A LOS ALUMNOS ASOCIADOS-->
                         <!--DESPLEGAMOS A LOS ALUMNOS ASOCIADOS-->
                         <!--DESPLEGAMOS A LOS ALUMNOS ASOCIADOS-->
                         <!--DESPLEGAMOS A LOS ALUMNOS ASOCIADOS-->  

                 <!-- Submit Field -->
<div class="form-group col-sm-12">

     <div class="pull-right">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary', 'onclick' => 'inputTextToUpperCase()']) !!}
  </div>

</div>

                        

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
</div>

@endsection