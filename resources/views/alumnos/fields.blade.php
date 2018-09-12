<!-- Parentesco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parentesco', 'Parentesco:') !!}
    {!! Form::text('parentesco', null, ['class' => 'form-control']) !!}
</div>

<!-- Otroparentesco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('otroParentesco', 'Otroparentesco:') !!}
    {!! Form::text('otroParentesco', null, ['class' => 'form-control']) !!}
</div>

<!-- Repitencias Field -->
<div class="form-group col-sm-6">
    {!! Form::label('repitencias', 'Repitencias:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('repitencias', false) !!}
        {!! Form::checkbox('repitencias', '1', null) !!} 1
    </label>
</div>

<!-- Condicion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('condicion', 'Condicion:') !!}
    {!! Form::text('condicion', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::text('estado', null, ['class' => 'form-control']) !!}
</div>

<!-- Estadocivilpadres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estadoCivilPadres', 'Estadocivilpadres:') !!}
    {!! Form::text('estadoCivilPadres', null, ['class' => 'form-control']) !!}
</div>

<!-- Idpersona Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idPersona', 'Idpersona:') !!}
    {!! Form::number('idPersona', null, ['class' => 'form-control']) !!}
</div>

<!-- Idapoderado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idApoderado', 'Idapoderado:') !!}
    {!! Form::number('idApoderado', null, ['class' => 'form-control']) !!}
</div>

<!-- Idcursoactual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idCursoActual', 'Idcursoactual:') !!}
    {!! Form::number('idCursoActual', null, ['class' => 'form-control']) !!}
</div>

<!-- Idcursopostu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idCursoPostu', 'Idcursopostu:') !!}
    {!! Form::number('idCursoPostu', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('alumnos.index') !!}" class="btn btn-default">Cancel</a>
</div>
