<!-- Pnombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('PNombre', 'Pnombre:') !!}
    {!! Form::text('PNombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Snombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('SNombre', 'Snombre:') !!}
    {!! Form::text('SNombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Tnombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TNombre', 'Tnombre:') !!}
    {!! Form::text('TNombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Appat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ApPat', 'Appat:') !!}
    {!! Form::text('ApPat', null, ['class' => 'form-control']) !!}
</div>

<!-- Apmat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ApMat', 'Apmat:') !!}
    {!! Form::text('ApMat', null, ['class' => 'form-control']) !!}
</div>

<!-- Fonofijo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fonoFijo', 'Fonofijo:') !!}
    {!! Form::number('fonoFijo', null, ['class' => 'form-control']) !!}
</div>

<!-- Fonocelu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fonoCelu', 'Fonocelu:') !!}
    {!! Form::number('fonoCelu', null, ['class' => 'form-control']) !!}
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Users Id:') !!}
    {!! Form::number('users_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Rut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rut', 'Rut:') !!}
    {!! Form::text('rut', null, ['class' => 'form-control']) !!}
</div>

<!-- Dv Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dv', 'Dv:') !!}
    {!! Form::text('dv', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipopersona Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipoPersona', 'Tipopersona:') !!}
    {!! Form::text('tipoPersona', null, ['class' => 'form-control']) !!}
</div>

<!-- Mail Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mail', 'Mail:') !!}
    {!! Form::number('mail', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('personas.index') !!}" class="btn btn-default">Cancel</a>
</div>
