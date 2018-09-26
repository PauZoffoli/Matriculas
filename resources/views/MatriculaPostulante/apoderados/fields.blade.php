


<!-- APODERADOS -->
<!-- APODERADOS -->
<!-- APODERADOS -->

<!-- Idpersona Field https://laracasts.com/discuss/channels/laravel/form-model-binding-relations-how-to-bindpopulate-relations-in-a-form?page=1 -->


<!-- Celular Field -->
<div class="form-group col-sm-3 {{ $errors->has('fonoCelu') ? ' has-error' : '' }}">
    {!! Form::label('fonoCelu', 'Teléfono Celular:') !!}
    {!! Form::tel('fonoCelu', null, ['class' => 'form-control', 'placeholder' => 'Ingrese teléfono celular (Ej: 984337683)','required' => 'true','pattern' => "[0-9]{9}", 'title' => 'No puede tener más de nueve dígitos']) !!}
</div>

<!-- Paisdeorigen Field -->
<div class="form-group col-sm-6">

	{!! Form::label('paisDeOrigen', 'Nacionalidad (Si tiene doble nacionalidad (Ejemplo: Chilena y otra) prefiera Chile:') !!}
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
    {!! Form::text('apoderado[profesion]', null, ['class' => 'form-control', 'maxlength' => "100", 'required' => "true"]) !!}
</div>


<!-- Idpersona Field https://laracasts.com/discuss/channels/laravel/form-model-binding-relations-how-to-bindpopulate-relations-in-a-form?page=1 -->
