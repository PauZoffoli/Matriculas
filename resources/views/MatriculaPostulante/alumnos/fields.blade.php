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

<!-- Repitencias Field -->
<div class="form-group col-sm-6">
    {!! Form::label('repitencias', 'Repitencias:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('repitencias', false) !!}
        {!! Form::checkbox('alumno[repitencias]', '1', null) !!} 1
    </label>
</div>

<!-- Condicion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('condicion', 'Condicion:') !!}
    {!! Form::text('alumno[condicion]', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::text('alumno[estado]', null, ['class' => 'form-control']) !!}
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

<div class="form-group col-sm-6">
    {!! Form::label('idCursoPostu', '¿Cuántas veces ha repetido el alumno?') !!}
    {{ Form::select('nroRepitencias', [0, 1, 2, 3, 4, 5], 0, ['id' => 'nroRepitencias', 'class' => 'form-control']) }}
</div>

<!--SECCIÓN PARAA VER LA CANTIDAD DE REPITENCIAS-->

@foreach ($alumno->alumno->repitencia as $repitencia)

<div class="form-group col-sm-6">
    {!! Form::label('Curso', 'Curso Repetido:') !!}
    {!! Form::text('idCurso',$repitencia->nivel .  ' ' . $repitencia->basicaMedia , ['id' => $repitencia->pivot->idCurso, 'class' => 'form-control']) !!}
</div>
    
@endforeach


<!-- Cursos repetidos Field  -->
<div class="form-group col-sm-6  {{ $errors->has('nombreComu') ? ' has-error' : '' }}">
    {!! Form::label('cursosRepetidos', 'Cursos Repetidos:') !!}
    {!! Form::select('cursosRepetidos', $cursos, $cursos,  array('class' => 'form-control')) !!}

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="form-group">
  <label class="col-md-4 control-label">¿Cuántas veces ha repetido el alumno?</label>
  <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
      <select name="state" class="form-control selectpicker" onchange="change();">
          <option>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
    </div>
  </div>
</div>


<!-- FUNCIÓN PARA CREAR DINÁMICAMENTE TEXTBOXES EN FUNCION A LA CANTIDAD SELECCIONADA EN UN DDL https://stackoverflow.com/questions/43950669/how-to-dynamically-create-text-boxes-on-selection-of-a-dropdown-->
<script type="text/javascript">
    function change(){
        $('.input-group').children('label').remove();
         $('.input-group').children('.selectpicker[name=cursosRepetidos]').remove();

    }
    $('.selectpicker[name=state]').change(function() {
      var i = 0;

//$('.input-group').children('input').remove() *for reset the inbox on change*
while (i < parseInt($(this).val())) {
    $('.input-group').append('{!! Form::label('cursosRepetidos', 'Cursos Repetidos:',  array('class' => 'form-control')) !!}')
    $('.input-group').append('{!! Form::select('cursosRepetidos', $cursos, $cursos,  array('class' => 'form-control selectpicker')) !!}')


   
    i++;
}
})
</script>
