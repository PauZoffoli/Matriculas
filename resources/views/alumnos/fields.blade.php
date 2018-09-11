<!-- Idapoderado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idApoderado', 'Idapoderado:') !!}
    {!! Form::number('idApoderado', null, ['class' => 'form-control']) !!}
</div>

<!-- Fechanacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaNacimiento', 'Fechanacimiento:') !!}
    {!! Form::date('fechaNacimiento', null, ['class' => 'form-control']) !!}
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

<!-- Genero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('genero', 'Genero:') !!}
    {!! Form::text('genero', null, ['class' => 'form-control']) !!}
</div>

<!-- Harepetido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('haRepetido', 'Harepetido:') !!}
    {!! Form::text('haRepetido', null, ['class' => 'form-control']) !!}
</div>

<!-- Correoal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('correoAl', 'Correoal:') !!}
    {!! Form::text('correoAl', null, ['class' => 'form-control']) !!}
</div>

<!-- Cursoactual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cursoActual', 'Cursoactual:') !!}
    {!! Form::text('cursoActual', null, ['class' => 'form-control']) !!}
</div>

<!-- Cursopostular Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cursoPostular', 'Cursopostular:') !!}
    {!! Form::text('cursoPostular', null, ['class' => 'form-control']) !!}
</div>

<!-- Iddireccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idDireccion', 'Iddireccion:') !!}
    {!! Form::number('idDireccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Nacionalidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nacionalidad', 'Nacionalidad:') !!}
    {!! Form::text('nacionalidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Fechadefuncion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaDefuncion', 'Fechadefuncion:') !!}
    {!! Form::date('fechaDefuncion', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::text('estado', null, ['class' => 'form-control']) !!}
</div>

<!-- Estadocivilpadres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estadoCivilPadres', 'Estadocivilpadres:') !!}
    {!! Form::text('estadoCivilPadres', null, ['class' => 'form-control']) !!}
</div>

<!-- Idpersona Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idPersona', 'Idpersona:') !!}
    {!! Form::number('idPersona', null, ['class' => 'form-control']) !!}
</div>

<!-- Pcursorepetido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('PCursoRepetido', 'Pcursorepetido:') !!}
    {!! Form::text('PCursoRepetido', null, ['class' => 'form-control']) !!}
</div>

<!-- Scursorepetido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('SCursoRepetido', 'Scursorepetido:') !!}
    {!! Form::text('SCursoRepetido', null, ['class' => 'form-control']) !!}
</div>

<!-- Tcursorepetido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TCursoRepetido', 'Tcursorepetido:') !!}
    {!! Form::text('TCursoRepetido', null, ['class' => 'form-control']) !!}
</div>

<!-- Idficha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idFicha', 'Idficha:') !!}
    {!! Form::number('idFicha', null, ['class' => 'form-control']) !!}
</div>

<!-- Urlcontratofirmado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('urlContratoFirmado', 'Urlcontratofirmado:') !!}
    {!! Form::text('urlContratoFirmado', null, ['class' => 'form-control']) !!}
</div>

<!-- Urlpagarefirmado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('urlPagareFirmado', 'Urlpagarefirmado:') !!}
    {!! Form::text('urlPagareFirmado', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('alumnos.index') !!}" class="btn btn-default">Cancel</a>
</div>
