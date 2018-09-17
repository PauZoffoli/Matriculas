<!-- Idcomuna Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idComuna', 'Idcomuna:') !!}
    {!! Form::number('direccion[idComuna]', null, ['class' => 'form-control']) !!}
</div>

<!-- Calle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('calle', 'Calle:') !!}
    {!! Form::text('direccion[calle]', null, ['class' => 'form-control']) !!}
</div>

<!-- Nrocalle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nroCalle', 'Nrocalle:') !!}
    {!! Form::text('direccion[nroCalle]', null, ['class' => 'form-control']) !!}
</div>

<!-- Bloquetorre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bloqueTorre', 'Bloquetorre:') !!}
    {!! Form::text('direccion[bloqueTorre]', null, ['class' => 'form-control']) !!}
</div>

<!-- Dpto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dpto', 'Dpto:') !!}
    {!! Form::text('direccion[dpto]', null, ['class' => 'form-control']) !!}
</div>

