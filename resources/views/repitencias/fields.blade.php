<!-- Idalumno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idAlumno', 'Idalumno:') !!}
    {!! Form::number('idAlumno', null, ['class' => 'form-control']) !!}
</div>

<!-- Idcurso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idCurso', 'Idcurso:') !!}
    {!! Form::number('idCurso', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('repitencias.index') !!}" class="btn btn-default">Cancel</a>
</div>
