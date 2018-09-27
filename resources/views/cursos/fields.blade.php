<!-- Nivel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivel', 'Nivel:') !!}
    {!! Form::number('nivel', null, ['class' => 'form-control']) !!}
</div>

<!-- Basicamedia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('basicaMedia', 'Basicamedia:') !!}
    {!! Form::text('basicaMedia', null, ['class' => 'form-control']) !!}
</div>

<!-- Arancelanual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('arancelAnual', 'Arancelanual:') !!}
    {!! Form::number('arancelAnual', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cursos.index') !!}" class="btn btn-default">Cancel</a>
</div>
