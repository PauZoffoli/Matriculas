@extends('layouts.app')

@section('content')
    <section class="content-header"  style="color: green;">
        <h1>
            DATOS DEL APODERADO
        </h1>
   </section>
 <div class="content">

<!--CAPTURANDO LA VARIABLE DE ERROR QUE VIENE DDESDE EL CONTROLADOR-->
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
       @include('adminlte-templates::common.errors')
        <div class="box-header with-border">
       <div class="box box-solid box-success" style="background-color: #E4FDE4!important;">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($persona, ['route' => ['apoderadosPostulantes.update', $persona->id], 'method' => 'patch']) !!}

<div class="box-body">
<!-- Idcomuna Field -->

<section class="content-header" >
        <h1>
           Datos Personales 
        </h1> <br>
</section>
                        @include('MatriculaPostulante.personas.fieldsPersona')

                        @include('MatriculaPostulante.apoderados.fields')
</div>
                         @include('MatriculaPostulante.direccions.fields')

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
        
       {{ Form::checkbox('alumnosCheck['. $index++ .']', $alumno, $persona->apoderado->alumnos->contains($alumno->id),array('checked'=>'true','style' => "width: 30px; height: 30px;") ) }}
       </td>
    <td style="height: 50%; ">    <center> {{ Form::label('alumno', $alumno->persona->PNombre . ' ' . $alumno->persona->ApPat . ' ' . $alumno->persona->rut  ) }} </center></td>
  </tr>
</table>
       
    </p>
@endforeach
</div>
</center>



                 <!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    
</div>

                        

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
</div>

@endsection