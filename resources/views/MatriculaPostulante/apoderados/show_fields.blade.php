<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $apoderado->id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $apoderado->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $apoderado->updated_at !!}</p>
</div>

<!-- Niveleducacional Field -->
<div class="form-group">
    {!! Form::label('nivelEducacional', 'Niveleducacional:') !!}
    <p>{!! $apoderado->apoderados->nivelEducacional !!}</p>
</div>

<!-- Profesion Field -->
<div class="form-group">
    {!! Form::label('profesion', 'Profesion:') !!}
    <p>{!! $apoderado->profesion !!}</p>
</div>

<!-- Paisdeorigen Field -->
<div class="form-group">
    {!! Form::label('paisDeOrigen', 'Paisdeorigen:') !!}
    <p>{!! $apoderado->paisDeOrigen !!}</p>
</div>

<!-- Idpersona Field -->
<div class="form-group">
    {!! Form::label('idPersona', 'Idpersona:') !!}
    <p>{!! $apoderado->idPersona !!}</p>
</div>

<!-- Estado Field -->
<div class="form-group">
    {!! Form::label('estado', 'Estado:') !!}
    <p>{!! $apoderado->estado !!}</p>
</div>

