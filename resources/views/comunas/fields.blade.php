<!-- Codigounico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigoUnico', 'Codigounico:') !!}
    {!! Form::text('codigoUnico', null, ['class' => 'form-control']) !!}
</div>

<!-- Idprovincia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idProvincia', 'Idprovincia:') !!}
    {!! Form::number('idProvincia', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('comunas.index') !!}" class="btn btn-default">Cancel</a>
</div>
