


<!-- APODERADOS -->
<!-- APODERADOS -->
<!-- APODERADOS -->

<!-- Idpersona Field https://laracasts.com/discuss/channels/laravel/form-model-binding-relations-how-to-bindpopulate-relations-in-a-form?page=1 -->

<!-- Paisdeorigen Field -->
<div class="form-group col-sm-6">
	{!! Form::label('paisDeOrigen', 'País de origen:') !!}
    {!! Form::select('apoderado[paisDeOrigen]', App\Enums\PaisEnum::getPossibleENUM(), ( isset($persona->apoderado) ? $persona->apoderado->paisDeOrigen : null ),  array('id' => 'apoderado[paisDeOrigen]', 'class' => 'form-control')) !!}
</div>

<!-- Niveleducacional Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivelEducacional', 'Nivel Educacional:') !!}
     {!! Form::select('apoderado[nivelEducacional]', App\Enums\NivelEducacionalEnum::getPossibleENUM(), ( isset($persona->apoderado) ? $persona->apoderado->nivelEducacional : null ),  array('id' => 'apoderado[nivelEducacional]', 'class' => 'form-control')) !!}
</div>

<!-- Profesion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('profesion', 'Profesión/Oficio:') !!}
    {!! Form::text('apoderado[profesion]', null, ['class' => 'form-control']) !!}
</div>


<!-- Idpersona Field https://laracasts.com/discuss/channels/laravel/form-model-binding-relations-how-to-bindpopulate-relations-in-a-form?page=1 -->


