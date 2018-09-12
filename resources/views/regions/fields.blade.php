<!-- Nombrereg Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombreReg', 'Nombrereg:') !!}
    {!! Form::text('nombreReg', null, ['class' => 'form-control']) !!}
</div>

<!-- Regionord Field -->
<div class="form-group col-sm-6">
    {!! Form::label('regionOrd', 'Regionord:') !!}
    {!! Form::text('regionOrd', null, ['class' => 'form-control']) !!}
</div>

<!-- Codigounico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigoUnico', 'Codigounico:') !!}
    {!! Form::text('codigoUnico', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('regions.index') !!}" class="btn btn-default">Cancel</a>
</div>
