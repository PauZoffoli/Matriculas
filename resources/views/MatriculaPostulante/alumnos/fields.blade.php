<!-- Pnombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('PNombre', 'Pnombre:') !!}
    {!! Form::text('PNombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Snombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('SNombre', 'Snombre:') !!}
    {!! Form::text('SNombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Tnombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TNombre', 'Tnombre:') !!}
    {!! Form::text('TNombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Appat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ApPat', 'Appat:') !!}
    {!! Form::text('ApPat', null, ['class' => 'form-control']) !!}
</div>

<!-- Apmat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ApMat', 'Apmat:') !!}
    {!! Form::text('ApMat', null, ['class' => 'form-control']) !!}
</div>

<!-- Fonofijo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fonoFijo', 'Fonofijo:') !!}
    {!! Form::number('fonoFijo', null, ['class' => 'form-control']) !!}
</div>

<!-- Fonocelu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fonoCelu', 'Fonocelu:') !!}
    {!! Form::number('fonoCelu', null, ['class' => 'form-control']) !!}
</div>

<!-- Iduser Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idUser', 'Iduser:') !!}
    {!! Form::number('idUser', null, ['class' => 'form-control']) !!}
</div>

<!-- Rut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rut', 'Rut:') !!}
    {!! Form::text('rut', null, ['class' => 'form-control']) !!}
</div>


<!-- Parentesco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parentesco', 'Parentesco:') !!}
    {!! Form::text('parentesco', null, ['class' => 'form-control']) !!}
</div>

<!-- Otroparentesco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('otroParentesco', 'Otroparentesco:') !!}
    {!! Form::text('otroParentesco', null, ['class' => 'form-control']) !!}
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


