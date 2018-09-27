<!-- Correoapo Field -->
<div class="form-group col-sm-3 {{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Correo electrónico:') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@gmail.com', 'maxlength' => "100", 'required' => 'true']) !!}
</div>



<!-- APODERADOS -->
<!-- APODERADOS -->
<!-- APODERADOS -->

<!-- Idpersona Field https://laracasts.com/discuss/channels/laravel/form-model-binding-relations-how-to-bindpopulate-relations-in-a-form?page=1 -->


<!-- Celular Field -->
<div class="form-group col-sm-3 {{ $errors->has('fonoCelu') ? ' has-error' : '' }}">
    {!! Form::label('fonoCelu', 'Teléfono Celular:') !!}
    {!! Form::tel('fonoCelu', null, ['class' => 'form-control', 'placeholder' => 'Ingrese teléfono celular (Ej: 984337683)','required' => 'true','pattern' => "[0-9]{9}", 'title' => 'No puede tener más de nueve dígitos']) !!}
</div>


<!-- Niveleducacional Field -->
<div class="form-group col-sm-3">
    {!! Form::label('nivelEducacional', 'Nivel Educacional:') !!}
     {!! Form::select('apoderado[nivelEducacional]', App\Enums\NivelEducacionalEnum::getPossibleENUM(), ( isset($persona->apoderado->nivelEducacional) ? $persona->apoderado->nivelEducacional : null ),  array('id' => 'apoderado[nivelEducacional]', 'class' => 'form-control', 'placeholder' => 'Seleccione un nivel educacional', 'required' => 'true')) !!}
</div>

<!-- Profesion Field -->
<div class="form-group col-sm-3">
    {!! Form::label('profesion', 'Profesión/Oficio:') !!}
    {!! Form::text('apoderado[profesion]', null, ['class' => 'form-control', 'maxlength' => "100", 'required' => "true", 'placeholder' => 'Ingrese su profesión o oficio']) !!}
</div>
<!-- Paisdeorigen Field -->
<div class="form-group col-sm-12">

	{!! Form::label('paisDeOrigen', 'Nacionalidad (Si tiene doble nacionalidad (Ejemplo: Chilena y otra) prefiera Chile:') !!}
    {!! Form::select('apoderado[paisDeOrigen]', App\Enums\PaisEnum::getPossibleENUM(), ( isset($persona->apoderado->paisDeOrigen) ? $persona->apoderado->paisDeOrigen : 'Chile' ),  array('id' => 'apoderado[paisDeOrigen]', 'class' => 'form-control')) !!}

</div>




<!-- Idpersona Field https://laracasts.com/discuss/channels/laravel/form-model-binding-relations-how-to-bindpopulate-relations-in-a-form?page=1 -->
