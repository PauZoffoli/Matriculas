<!-- Niveleducacional Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivelEducacional', 'Niveleducacional:') !!}
    {!! Form::text('nivelEducacional', null, ['class' => 'form-control']) !!}
</div>

<!-- Profesion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('profesion', 'Profesion:') !!}
    {!! Form::text('profesion', null, ['class' => 'form-control']) !!}
</div>

<!-- Nacionalidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nacionalidad', 'Nacionalidad:') !!}
    {!! Form::text('nacionalidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Iddirecciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idDirecciones', 'Iddirecciones:') !!}
    {!! Form::number('idDirecciones', null, ['class' => 'form-control']) !!}
</div>

<!-- Fechanacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaNacimiento', 'Fechanacimiento:') !!}
    {!! Form::date('fechaNacimiento', null, ['class' => 'form-control']) !!}
</div>

<!-- Estadoapoderado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estadoApoderado', 'Estadoapoderado:') !!}
    {!! Form::text('estadoApoderado', null, ['class' => 'form-control']) !!}
</div>

<!-- Idpersona Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idPersona', 'Idpersona:') !!}
    {!! Form::number('idPersona', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('apoderados.index') !!}" class="btn btn-default">Cancel</a>
</div>
