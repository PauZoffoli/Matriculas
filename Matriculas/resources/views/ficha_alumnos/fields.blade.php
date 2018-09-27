<!-- Ingresofamiliarm Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ingresoFamiliarM', 'Ingresofamiliarm:') !!}
    {!! Form::number('ingresoFamiliarM', null, ['class' => 'form-control']) !!}
</div>

<!-- Causas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('causas', 'Causas:') !!}
    {!! Form::number('causas', null, ['class' => 'form-control']) !!}
</div>

<!-- Nroconvivientes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nroConvivientes', 'Nroconvivientes:') !!}
    {!! Form::number('nroConvivientes', null, ['class' => 'form-control']) !!}
</div>

<!-- Totalhijos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('totalHijos', 'Totalhijos:') !!}
    {!! Form::number('totalHijos', null, ['class' => 'form-control']) !!}
</div>

<!-- Nrodehijo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nroDeHijo', 'Nrodehijo:') !!}
    {!! Form::number('nroDeHijo', null, ['class' => 'form-control']) !!}
</div>

<!-- Nrohermaidop Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nroHermaIDOP', 'Nrohermaidop:') !!}
    {!! Form::number('nroHermaIDOP', null, ['class' => 'form-control']) !!}
</div>

<!-- Tenenciavivienda Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tenenciaVivienda', 'Tenenciavivienda:') !!}
    {!! Form::text('tenenciaVivienda', null, ['class' => 'form-control']) !!}
</div>

<!-- Estudiacon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estudiaCon', 'Estudiacon:') !!}
    {!! Form::text('estudiaCon', null, ['class' => 'form-control']) !!}
</div>

<!-- Isaprefonasa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('isapreFonasa', 'Isaprefonasa:') !!}
    {!! Form::text('isapreFonasa', null, ['class' => 'form-control']) !!}
</div>

<!-- Segurocomple Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seguroComple', 'Segurocomple:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('seguroComple', false) !!}
        {!! Form::checkbox('seguroComple', '1', null) !!} 1
    </label>
</div>

<!-- Enfermedades Field -->
<div class="form-group col-sm-6">
    {!! Form::label('enfermedades', 'Enfermedades:') !!}
    {!! Form::text('enfermedades', null, ['class' => 'form-control']) !!}
</div>

<!-- Medicamentos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('medicamentos', 'Medicamentos:') !!}
    {!! Form::text('medicamentos', null, ['class' => 'form-control']) !!}
</div>

<!-- Esalergico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('esAlergico', 'Esalergico:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('esAlergico', false) !!}
        {!! Form::checkbox('esAlergico', '1', null) !!} 1
    </label>
</div>

<!-- Alergicoa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('AlergicoA', 'Alergicoa:') !!}
    {!! Form::text('AlergicoA', null, ['class' => 'form-control']) !!}
</div>

<!-- Gruposanguineo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grupoSanguineo', 'Gruposanguineo:') !!}
    {!! Form::text('grupoSanguineo', null, ['class' => 'form-control']) !!}
</div>

<!-- Idalumno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idAlumno', 'Idalumno:') !!}
    {!! Form::number('idAlumno', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('fichaAlumnos.index') !!}" class="btn btn-default">Cancel</a>
</div>
