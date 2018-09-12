<!-- Nombreprov Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombreProv', 'Nombreprov:') !!}
    {!! Form::text('nombreProv', null, ['class' => 'form-control']) !!}
</div>

<!-- Codigounico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigoUnico', 'Codigounico:') !!}
    {!! Form::text('codigoUnico', null, ['class' => 'form-control']) !!}
</div>

<!-- Idregion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idRegion', 'Idregion:') !!}
    {!! Form::number('idRegion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('provincias.index') !!}" class="btn btn-default">Cancel</a>
</div>
