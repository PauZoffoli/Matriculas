<!-- Idcomuna Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idComuna', 'Idcomuna:') !!}
    {!! Form::number('idComuna', null, ['class' => 'form-control']) !!}
</div>

<!-- Calle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('calle', 'Calle:') !!}
    {!! Form::text('calle', null, ['class' => 'form-control']) !!}
</div>

<!-- Nrocalle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nroCalle', 'Nrocalle:') !!}
    {!! Form::text('nroCalle', null, ['class' => 'form-control']) !!}
</div>

<!-- Bloquetorre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bloqueTorre', 'Bloquetorre:') !!}
    {!! Form::text('bloqueTorre', null, ['class' => 'form-control']) !!}
</div>

<!-- Dpto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dpto', 'Dpto:') !!}
    {!! Form::text('dpto', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('direccions.index') !!}" class="btn btn-default">Cancel</a>
</div>
