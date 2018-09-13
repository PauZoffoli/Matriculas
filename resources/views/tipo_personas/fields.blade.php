<!-- Idtipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idTipo', 'Idtipo:') !!}
    {!! Form::number('idTipo', null, ['class' => 'form-control']) !!}
</div>

<!-- Idpersona Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idPersona', 'Idpersona:') !!}
    {!! Form::number('idPersona', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tipoPersonas.index') !!}" class="btn btn-default">Cancel</a>
</div>
