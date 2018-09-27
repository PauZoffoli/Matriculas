<!-- Idapoderado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idApoderado', 'Idapoderado:') !!}
    {!! Form::number('idApoderado', null, ['class' => 'form-control']) !!}
</div>

<!-- Urlcontrato Field -->
<div class="form-group col-sm-6">
    {!! Form::label('urlContrato', 'Urlcontrato:') !!}
    {!! Form::text('urlContrato', null, ['class' => 'form-control']) !!}
</div>

<!-- Urlpagare Field -->
<div class="form-group col-sm-6">
    {!! Form::label('urlPagare', 'Urlpagare:') !!}
    {!! Form::text('urlPagare', null, ['class' => 'form-control']) !!}
</div>

<!-- Urlcontratof Field -->
<div class="form-group col-sm-6">
    {!! Form::label('urlContratoF', 'Urlcontratof:') !!}
    {!! Form::text('urlContratoF', null, ['class' => 'form-control']) !!}
</div>

<!-- Urlpagaref Field -->
<div class="form-group col-sm-6">
    {!! Form::label('urlPagareF', 'Urlpagaref:') !!}
    {!! Form::text('urlPagareF', null, ['class' => 'form-control']) !!}
</div>

<!-- Nrocuotas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nroCuotas', 'Nrocuotas:') !!}
    {!! Form::number('nroCuotas', null, ['class' => 'form-control']) !!}
</div>

<!-- Fechacontrato Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaContrato', 'Fechacontrato:') !!}
    {!! Form::date('fechaContrato', null, ['class' => 'form-control']) !!}
</div>

<!-- Anioacontratar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('anioAContratar', 'Anioacontratar:') !!}
    {!! Form::number('anioAContratar', null, ['class' => 'form-control']) !!}
</div>

<!-- Totalapagar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('totalAPagar', 'Totalapagar:') !!}
    {!! Form::number('totalAPagar', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('contratos.index') !!}" class="btn btn-default">Cancel</a>
</div>
