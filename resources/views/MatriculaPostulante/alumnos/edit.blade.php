@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Alumno
        </h1>
   </section>
   <div class="content">
@include('adminlte-templates::common.errors')
       <div class="alert alert-warning"><span class="glyphicon glyphicon-ok"></span><em> ERROR en Repitencias</em></div>
  @if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
       <div class="box box-primary">
           <div class="box-body">
               <div class="">
                   {!! Form::model($persona, ['route' => ['alumnosPostulantes.update', $persona->id], 'method' => 'patch']) !!}


<section class="content-header">
        <h1>
            1) Datos del Alumno/a {{ $persona->PNombre . ' ' . $persona->ApPat }}
        </h1> <br>
</section>
       <div class="box box-success" style="background-color: #E4FDE4!important;">
           <div class="box-body">
               <div class="row">
                 
                 @include('MatriculaPostulante.alumnos.fields')
                  
               </div>
           </div>
       </div>

<section class="content-header">
        <h1>
           2) Ficha Social del Alumno/a {{ $persona->PNombre . ' ' . $persona->ApPat }}
        </h1> <br>
</section>
       <div class="box box-success" style="background-color: #E4FDE4!important;">
           <div class="box-body">
               <div class="row">
                 
                @include('MatriculaPostulante.alumnos.fields_ficha_alumno')
                   <div class="form-group col-sm-12">
                 
                {!! Form::label('padreOMadre', '¿Qué relación tiene el apoderado con el alumno?') !!}
                 {!! Form::select('padreOMadre', [ 'No es el padre ni la madre','Padre', 'Madre'],  null ,  array('id' => 'padreOMadre', 'class' => 'form-control','onChange' => 'apoderadoPadreOMadre();')) !!}
              
</div>

               </div>
           </div>
       </div>

<div id="esPadre">
<section class="content-header">

        <h1>
           3) Padre del Alumno/a {{ $persona->PNombre . ' ' . $persona->ApPat }}
        </h1> <br>
</section>
       <div class="box box-success" style="background-color: #E4FDE4!important;">
           <div class="box-body">
               <div class="row">
               
                @include('MatriculaPostulante.alumnos.fieldsPadre')
                  
               </div>
           </div>
       </div>
</div>
<div id="esMadre">
<section class="content-header">
        <h1>
           4) Madre del Alumno/a {{ $persona->PNombre . ' ' . $persona->ApPat }}
        </h1> <br>
</section>
       <div class="box box-success" style="background-color: #E4FDE4!important;">
           <div class="box-body">
               <div class="row">
                 
                @include('MatriculaPostulante.alumnos.fieldsMadre')

               </div>
           </div>
       </div>
</div>

                  {!! Form::label('padreOMadrePC', '¿El primer contacto es el padre o la madre?') !!}
                 {!! Form::select('padreOMadrePC', [ 'No es el padre ni la madre','Padre', 'Madre'],  null ,  array('id' => 'padreOMadrePC', 'class' => 'form-control','onChange' => 'padreOMadrePC();')) !!}
<section class="content-header">
        <h1>
           5) Contacto Nro 1 del Alumno/a {{ $persona->PNombre . ' ' . $persona->ApPat }}
        </h1> <br>
</section>
       <div class="box box-success" style="background-color: #E4FDE4!important;">
           <div class="box-body">
               <div class="row">
                 
                @include('MatriculaPostulante.alumnos.fieldsContacto1')
                  
               </div>
           </div>
       </div>
                  {!! Form::label('padreOMadreSC', '¿El segundo contacto es el padre o la madre?') !!}
                 {!! Form::select('padreOMadreSC', [ 'No es el padre ni la madre','Padre', 'Madre'],  null ,  array('id' => 'padreOMadreSC', 'class' => 'form-control','onChange' => 'padreOMadreSC();')) !!}


<section class="content-header">
        <h1>
          6)  Contacto Nro 2 del Alumno/a {{ $persona->PNombre . ' ' . $persona->ApPat }}
        </h1> <br>
</section>
       <div class="box box-success" style="background-color: #E4FDE4!important;">
           <div class="box-body">
               <div class="row">
                 
                @include('MatriculaPostulante.alumnos.fieldsContacto2')
                  
               </div>
           </div>
       </div>



                      
                        
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('alumnos.index') !!}" class="btn btn-default">Cancel</a>
</div>


                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>




<script>

    function apoderadoPadreOMadre(){

        var apoderadoPadreOMadre = document.getElementById("padreOMadre");
        var esPadre = document.getElementById("esPadre");
        var esMadre = document.getElementById("esMadre");


    /*    if( apoderadoPadreOMadre.value=="0"){

            esMadre.style.display = "block";
            $('#esMadre').find('input, textarea, button, select').removeAttr('disabled');
            $('#esMadre').find('input, textarea, button, select').attr('required',true);

            esPadre.style.display = "block";
            $('#esPadre').find('input, textarea, button, select').removeAttr('disabled');
            $('#esPadre').find('input, textarea, button, select').attr('required',true);

        }
        if( apoderadoPadreOMadre.value=="1"){
            esPadre.style.display = "none";
            $('#esPadre').find('input, textarea, button, select').attr('disabled','disabled');
            $('#esPadre').find('input, textarea, button, select').attr('required',false);

            esMadre.style.display = "block";
            $('#esMadre').find('input, textarea, button, select').removeAttr('disabled');
            $('#esMadre').find('input, textarea, button, select').attr('required',true);

        }

        if( apoderadoPadreOMadre.value=="2"){
            esMadre.style.display = "none";
            $('#esMadre').find('input, textarea, button, select').attr('disabled','disabled');
            $('#esMadre').find('input, textarea, button, select').attr('required',false);

            esPadre.style.display = "block";
            $('#esPadre').find('input, textarea, button, select').removeAttr('disabled');
            $('#esPadre').find('input, textarea, button, select').attr('required',true);
        }
       */

    }
</script>

<script >
var select = document.getElementById('padreOMadre');
select.onchange = apoderadoPadreOMadre;
window.onload = apoderadoPadreOMadre;
</script>

@endsection