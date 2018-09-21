 @include('MatriculaPostulante.personas.fieldsPersona')

<!-- Parentesco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parentesco', 'Parentesco:') !!}
    {!! Form::text('alumno[parentesco]', null, ['class' => 'form-control']) !!}
</div>




<!-- Otroparentesco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('otroParentesco', 'Otroparentesco:') !!}
    {!! Form::text('alumno[otroParentesco]', null, ['class' => 'form-control']) !!}
</div>

<!-- Condicion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('condicion', 'Condicion:') !!}
    {!! Form::text('alumno[condicion]', null, ['class' => 'form-control']) !!}
</div>

<!-- Estadocivilpadres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estadoCivilPadres', 'Estadocivilpadres:') !!}
    {!! Form::text('alumno[estadoCivilPadres]', null, ['class' => 'form-control']) !!}
</div>

<!-- Idpersona Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idPersona', 'Idpersona:') !!}
    {!! Form::number('alumno[idPersona]', null, ['class' => 'form-control']) !!}
</div>

<!-- Idapoderado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idApoderado', 'Idapoderado:') !!}
    {!! Form::number('alumno[idApoderado]', null, ['class' => 'form-control']) !!}
</div>

<!-- Idcursoactual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idCursoActual', 'Idcursoactual:') !!}
    {!! Form::number('alumno[idCursoActual]', null, ['class' => 'form-control']) !!}
</div>

<!-- Idcursopostu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idCursoPostu', 'Idcursopostu:') !!}
    {!! Form::number('alumno[idCursoPostu]', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
  <label class="col-md-4 control-label">¿Cuántas veces ha repetido el alumno?</label>
  <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>

      {!! Form::select('enumerator', [0,1,2,3,4,5],  $persona->alumno->repitencia()->count() ,  array('id' => 'enumerator', 'class' => 'form-control', 'onChange' => 'changeCantidadRepitencias();')) !!}

         {!! Form::select('repitencia[0]', $cursos, ( isset($persona->alumno->repitencia[0]) ? $persona->alumno->repitencia[0]->id : null ) ,  array('id'=> 'pRepetido', 'class' => 'form-control')) !!}
    {!! Form::select('repitencia[1]', $cursos, ( isset($persona->alumno->repitencia[1]) ? $persona->alumno->repitencia[1]->id : null ) ,  array('id'=> 'sRepetido','class' => 'form-control')) !!}    
     {!! Form::select('repitencia[2]', $cursos,( isset($persona->alumno->repitencia[2]) ? $persona->alumno->repitencia[2]->id : null ) ,  array('id'=> 'tRepetido','class' => 'form-control')) !!}
      {!! Form::select('repitencia[3]', $cursos, ( isset($persona->alumno->repitencia[3]) ? $persona->alumno->repitencia[3]->id : null ) ,  array('id'=> 'cRepetido','class' => 'form-control ')) !!}
       {!! Form::select('repitencia[4]', $cursos, ( isset($persona->alumno->repitencia[4]) ? $persona->alumno->repitencia[4]->id : null ) ,  array('id'=> 'qRepetido','class' => 'form-control')) !!}

      
    </div>
  </div>
</div>


<!-- FUNCIÓN PARA CREAR DINÁMICAMENTE TEXTBOXES EN FUNCION A LA CANTIDAD SELECCIONADA EN UN DDL https://stackoverflow.com/questions/43950669/how-to-dynamically-create-text-boxes-on-selection-of-a-dropdown .triggerHandler("rightnow");.triggerHandler("rightnow");-->




<script>

    function changeCantidadRepitencias(){

        var enumerator = document.getElementById("enumerator");
        var pRepetido = document.getElementById("pRepetido");
        var sRepetido = document.getElementById("sRepetido");
        var tRepetido = document.getElementById("tRepetido");
        var cRepetido = document.getElementById("cRepetido");
        var qRepetido = document.getElementById("qRepetido");

        if( enumerator.value=="0"){
            document.getElementById("pRepetido").style.display = "none";
            document.getElementById("sRepetido").style.display = "none";
            document.getElementById("tRepetido").style.display = "none";
            document.getElementById("cRepetido").style.display = "none";
            document.getElementById("qRepetido").style.display = "none";

            document.getElementById("pRepetido").disabled = true;
            document.getElementById("sRepetido").disabled = true;
            document.getElementById("tRepetido").disabled = true;
            document.getElementById("cRepetido").disabled = true;
            document.getElementById("qRepetido").disabled = true;

            document.getElementById("pRepetido").required = false;
            document.getElementById("sRepetido").required = false;
            document.getElementById("tRepetido").required = false;
            document.getElementById("cRepetido").required = false;
            document.getElementById("qRepetido").required = false;

        }
        if(enumerator.value=='1'){

            document.getElementById("pRepetido").style.display = "block";
            document.getElementById("sRepetido").style.display = "none";
            document.getElementById("tRepetido").style.display = "none";
            document.getElementById("cRepetido").style.display = "none";
            document.getElementById("qRepetido").style.display = "none";

            document.getElementById("pRepetido").disabled = false;
            document.getElementById("sRepetido").disabled = true;
            document.getElementById("tRepetido").disabled = true;
            document.getElementById("cRepetido").disabled = true;
            document.getElementById("qRepetido").disabled = true;

            document.getElementById("pRepetido").required = true;
            document.getElementById("sRepetido").required = false;
            document.getElementById("tRepetido").required = false;
            document.getElementById("cRepetido").required = false;
            document.getElementById("qRepetido").required = false;
        }
        if(enumerator.value=='2'){
            document.getElementById("pRepetido").style.display = "block";
            document.getElementById("sRepetido").style.display = "block";
            document.getElementById("tRepetido").style.display = "none";
            document.getElementById("cRepetido").style.display = "none";
            document.getElementById("qRepetido").style.display = "none";

            document.getElementById("pRepetido").disabled = false;
            document.getElementById("sRepetido").disabled = false;
            document.getElementById("tRepetido").disabled = true;
            document.getElementById("cRepetido").disabled = true;
            document.getElementById("qRepetido").disabled = true;

            document.getElementById("pRepetido").required = true;
            document.getElementById("sRepetido").required = true;
            document.getElementById("tRepetido").required = false;
            document.getElementById("cRepetido").required = false;
            document.getElementById("qRepetido").required = false;
         
        }
        if(enumerator.value=='3'){
            document.getElementById("pRepetido").style.display = "block";
            document.getElementById("sRepetido").style.display = "block";
            document.getElementById("tRepetido").style.display = "block";
            document.getElementById("cRepetido").style.display = "none";
            document.getElementById("qRepetido").style.display = "none";

            document.getElementById("pRepetido").disabled = false;
            document.getElementById("sRepetido").disabled = false;
            document.getElementById("tRepetido").disabled = false;
            document.getElementById("cRepetido").disabled = true;
            document.getElementById("qRepetido").disabled = true;

            document.getElementById("pRepetido").required = true;
            document.getElementById("sRepetido").required = true;
            document.getElementById("tRepetido").required = true;
            document.getElementById("cRepetido").required = false;
            document.getElementById("qRepetido").required = false;
           
        }
        if(enumerator.value=='4'){
            document.getElementById("pRepetido").style.display = "block";
            document.getElementById("sRepetido").style.display = "block";
            document.getElementById("tRepetido").style.display = "block";
            document.getElementById("cRepetido").style.display = "block";
            document.getElementById("qRepetido").style.display = "none";

            document.getElementById("pRepetido").disabled = false;
            document.getElementById("sRepetido").disabled = false;
            document.getElementById("tRepetido").disabled = false;
            document.getElementById("cRepetido").disabled = false;
            document.getElementById("qRepetido").disabled = true;

            document.getElementById("pRepetido").required = true;
            document.getElementById("sRepetido").required = true;
            document.getElementById("tRepetido").required = true;
            document.getElementById("cRepetido").required = true;
            document.getElementById("qRepetido").required = false;
       
        }
        if(enumerator.value=='5'){
            document.getElementById("pRepetido").style.display = "block";
            document.getElementById("sRepetido").style.display = "block";
            document.getElementById("tRepetido").style.display = "block";
            document.getElementById("cRepetido").style.display = "block";
            document.getElementById("qRepetido").style.display = "block";

            document.getElementById("pRepetido").disabled = false;
            document.getElementById("sRepetido").disabled = false;
            document.getElementById("tRepetido").disabled = false;
            document.getElementById("cRepetido").disabled = false;
            document.getElementById("qRepetido").disabled = false;

            document.getElementById("pRepetido").required = true;
            document.getElementById("sRepetido").required = true;
            document.getElementById("tRepetido").required = true;
            document.getElementById("cRepetido").required = true;
            document.getElementById("qRepetido").required = true;
           
        }

    }
</script>

<script >
var select = document.getElementById('enumerator');
select.onchange = changeCantidadRepitencias();
window.onload = changeCantidadRepitencias();
</script>


