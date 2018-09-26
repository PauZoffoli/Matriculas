<!-- Celular Field -->
<div class="form-group col-sm-3 {{ $errors->has('fonoCelu') ? ' has-error' : '' }}">
    {!! Form::label('fonoCelu', 'Teléfono Celular:') !!}
    {!! Form::tel('fonoCelu', null, ['class' => 'form-control', 'placeholder' => 'Ingrese teléfono celular (Ej: 984337683)','pattern' => "[0-9]{9}", 'title' => 'No puede tener más de nueve dígitos']) !!}
</div>




<!-- Paisdeorigen Field -->
<div class="form-group col-sm-3">
    {!! Form::label('paisDeOrigen', 'Nacionalidad (Si tiene doble nacionalidad (Ejemplo: Chilena y otra) prefiera Chile:') !!}
    {!! Form::select('alumno[paisDeOrigen]', App\Enums\PaisEnum::getPossibleENUM(), ( isset($persona->alumno) ? $persona->alumno->paisDeOrigen : null ),  array('id' => 'alumno[paisDeOrigen]', 'required' => 'true', 'class' => 'form-control', "placeholder" => "Seleccione un país de origen")) !!}
</div>


<!-- Condicion Field -->
<div class="form-group col-sm-6" style="display: none">
    {!! Form::label('condicion', 'IdAlumno:') !!}
    {!! Form::text('alumno[id]', null, ['class' => 'form-control']) !!}
</div>



<!-- Condicion Field -->
<div class="form-group col-sm-6" style="display: none">
    {!! Form::label('condicion', 'Condicion:') !!}
    {!! Form::text('alumno[condicion]', null, ['class' => 'form-control']) !!}
</div>



<!-- Idapoderado Field -->
<div class="form-group col-sm-6" style="display: none">
    {!! Form::label('idApoderado', 'Idapoderado:') !!}
    {!! Form::number('alumno[idApoderado]', null, ['class' => 'form-control']) !!}
</div>

<!-- Idcursoactual Field -->
<div class="form-group col-sm-3">
    {!! Form::label('idCursoActual', 'Curso Actual:') !!}

     {!! Form::select('alumno[idCursoActual]', App\Enums\CursoEnum::getPossibleENUM(), ( isset($persona->alumno->idCursoActual) ? $persona->alumno->idCursoActual : null ) ,  array('id'=> 'alumno[idCursoActual]','required' => 'true', 'class' => 'form-control', 'placeholder' => 'Seleccione el curso actual')) !!}
</div>

<!-- Idcursopostu Field -->
<div class="form-group col-sm-3">
    {!! Form::label('idCursoPostu', 'Curso a Postular para 2019:') !!}

      {!! Form::select('alumno[idCursoPostu]', App\Enums\CursoEnum::getPossibleENUM(), ( isset($persona->alumno->idCursoPostu) ? $persona->alumno->idCursoPostu : null ) ,  array('id'=> 'alumno[idCursoPostu]', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Seleccione el curso a postular')) !!}

</div>

<!-- Parentesco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parentesco', 'Parentesco del APODERADO con el alumno:') !!}
    {!! Form::select('alumno[parentesco]', App\Enums\ParentescoAlumnoEnum::getPossibleENUM(), ( isset($persona->alumno->parentesco) ? $persona->alumno->parentesco : null ) ,  array('id'=> 'alumno[parentesco]', 'class' => 'form-control', 'placeholder' => 'Seleccione el parentesco del Apoderado con el alumno', 'required' => 'true')) !!}
</div>



<!-- Estadocivilpadres Field -->
<div class="form-group col-sm-3 {{ $errors->has('$persona->alumno->estadoCivilPadres') ? ' has-error' : '' }}">
    {!! Form::label('alumno[estadoCivilPadres]', 'Estado Civil de los Padres del Alumnno:') !!}
    {!! Form::select('alumno[estadoCivilPadres]', App\Enums\EstadoCivilPadresEnum::getPossibleENUM(), ( isset($persona->alumno) ? $persona->alumno->estadoCivilPadres : null ),  array('id' => 'alumno[estadoCivilPadres]', 'class' => 'form-control', 'placeholder' => 'Seleccione el estado civil de los padres del alumno', 'required' => 'true')) !!}
</div>
<!-- Paisdeorigen Field -->
<div class="form-group col-sm-12">
    {!! Form::label('paisDeOrigen', 'Nacionalidad (Si tiene doble nacionalidad (Ejemplo: Chilena y otra) prefiera Chile:') !!}
    {!! Form::select('alumno[paisDeOrigen]', App\Enums\PaisEnum::getPossibleENUM(), ( isset($persona->alumno) ? $persona->alumno->paisDeOrigen : null ),  array('id' => 'alumno[paisDeOrigen]', 'required' => 'true', 'class' => 'form-control', "placeholder" => "Seleccione un país de origen")) !!}
</div>



<div class="form-group" >
  <label class="col-sm-12 control-label">¿Cuántas veces ha repetido el alumno?</label>
  <div class="col-sm-12 inputGroupContainer">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>

      {!! Form::select('enumerator', [0,1,2,3,4,5],  $persona->alumno->repitencia()->count() ,  array('id' => 'enumerator', 'class' => 'form-control','placeholder' => 'Seleccione la cantidad de veces que ha repetido el alumno', 'required'=>'true')) !!}

         {!! Form::select('repitencia[0]', App\Enums\CursoEnum::getPossibleENUM(), ( isset($persona->alumno->repitencia[0]) ? $persona->alumno->repitencia[0]->id : null ) ,  array('id'=> 'pRepetido', 'class' => 'form-control', 'placeholder' => 'Seleccione el 1er Curso REPETIDO')) !!}
    {!! Form::select('repitencia[1]', App\Enums\CursoEnum::getPossibleENUM(), ( isset($persona->alumno->repitencia[1]) ? $persona->alumno->repitencia[1]->id : null ) ,  array('id'=> 'sRepetido','class' => 'form-control', 'placeholder' => 'Seleccione el 2do Curso REPETIDO')) !!}    
     {!! Form::select('repitencia[2]', App\Enums\CursoEnum::getPossibleENUM(),( isset($persona->alumno->repitencia[2]) ? $persona->alumno->repitencia[2]->id : null ) ,  array('id'=> 'tRepetido','class' => 'form-control', 'placeholder' => 'Seleccione el 3er Curso REPETIDO')) !!}
      {!! Form::select('repitencia[3]', App\Enums\CursoEnum::getPossibleENUM(), ( isset($persona->alumno->repitencia[3]) ? $persona->alumno->repitencia[3]->id : null ) ,  array('id'=> 'cRepetido','class' => 'form-control ', 'placeholder' => 'Seleccione el 4to Curso REPETIDO')) !!}
       {!! Form::select('repitencia[4]', App\Enums\CursoEnum::getPossibleENUM(), ( isset($persona->alumno->repitencia[4]) ? $persona->alumno->repitencia[4]->id : null ) ,  array('id'=> 'qRepetido','class' => 'form-control', 'placeholder' => 'Seleccione el 5to Curso REPETIDO')) !!}

      
    </div>
  </div>
</div>



<!-- FUNCIÓN PARA CREAR DINÁMICAMENTE TEXTBOXES EN FUNCION A LA CANTIDAD SELECCIONADA EN UN DDL https://stackoverflow.com/questions/43950669/how-to-dynamically-create-text-boxes-on-selection-of-a-dropdown .triggerHandler("rightnow");.triggerHandler("rightnow");-->


