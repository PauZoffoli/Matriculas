@extends('layouts.app')

@section('content')
    <section class="content-header"  style="color: #5B5494;">
        <h1>
            DATOS DEL ALUMNO
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


       <div class="">
           <div class="box-body">
               <div class="">

                   {!! Form::model($persona, ['route' => ['alumnosPostulantes.update', $persona->id], 'method' => 'patch']) !!}



 <div class="box box-solid box-primary" style="background-color: #E5ECFB!important;">
<section class="content-header">
        <h1>
            1) Datos del Alumno/a {{ $persona->PNombre . ' ' . $persona->ApPat }}
        </h1> <br>
</section>
         
           <div class="box-body">
               <div class="row">



<div class="box-body">
<!-- Idcomuna Field -->
<!-- Submit Field -->


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
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
       <input type="button" name="clear" value="CLEAR ALL DATOS PRUEBA" onclick="clearForm(this.form);" >

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
        </h1> <br>
</section>
      
           <div class="box-body">
               <div class="row">
                 
                @include('MatriculaPostulante.alumnos.fieldsMadre')


               </div>
           </div>
       </div>
</div>

 {!! Form::label('cantidadDeContactosLBL', '¿Cuántos contactos quiere para su alumno?') !!}
{!! Form::select('fichaAlumno[0][cantidadContactos]', [ 0,1, 2],  null ,  array('id' => 'cantidadDeContactos', 'class' => 'form-control','placeholder' =>"¿Cuántos contactos quiere para su alumno?", 'required' =>'true')) !!}
<br>
<div class="box box-solid box-primary"  id="headerPrimerContacto" name="headerPrimerContacto" style="background-color: #E5ECFB!important;">       
<section class="content-header" >
        <h1>
           5) Contacto Nro 1 del Alumno/a {{ $persona->PNombre . ' ' . $persona->ApPat }}
        </h1> <br>
         {!! Form::label('padreOMadrePC', '¿Quién es el primer contacto?') !!}
                 {!! Form::select('padreOMadrePC', [ 'No es el padre ni la madre','Padre' ,'Madre'],  null ,  array('id' => 'padreOMadrePC', 'class' => 'form-control','placeholder' =>"Seleccione una opción", 'required' =>'true')) !!}
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
        </h1> 
         {!! Form::label('padreOMadreSC', '¿Quién es el segundo contacto?') !!}
                 {!! Form::select('padreOMadreSC', [ "0" =>'No es el padre ni la madre', 'Padre' ,'Madre'],  null ,  array('id' => 'padreOMadreSC', 'class' => 'form-control', 'placeholder' =>"Seleccione una opción", 'required' =>'true')) !!}
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
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    
</div>

   <input type="button" name="clear" value="CLEAR ALL DATOS PRUEBA" onclick="clearForm(this.form);" >

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
 </div>




@endsection