<!-- Idcontrato Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idContrato', 'Idcontrato:') !!}
    {!! Form::number('idContrato', null, ['class' => 'form-control']) !!}
</div>

<!-- Idalumno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idAlumno', 'Idalumno:') !!}
    {!! Form::number('idAlumno', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('alumnoContratos.index') !!}" class="btn btn-default">Cancel</a>
</div>
