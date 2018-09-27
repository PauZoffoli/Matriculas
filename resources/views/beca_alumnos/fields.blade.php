<!-- Idalumno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idAlumno', 'Idalumno:') !!}
    {!! Form::number('idAlumno', null, ['class' => 'form-control']) !!}
</div>

<!-- Idbeca Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idBeca', 'Idbeca:') !!}
    {!! Form::number('idBeca', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('becaAlumnos.index') !!}" class="btn btn-default">Cancel</a>
</div>
