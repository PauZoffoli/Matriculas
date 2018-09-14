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

<!-- Iduser Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idUser', 'Iduser:') !!}
    {!! Form::number('idUser', null, ['class' => 'form-control']) !!}
</div>

<!-- Rut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rut', 'Rut:') !!}
    {!! Form::text('rut', null, ['class' => 'form-control']) !!}
</div>



<!-- Genero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('genero', 'Genero:') !!}
    {!! Form::text('genero', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Fechanacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaNacimiento', 'Fechanacimiento:') !!}
    {!! Form::date('fechaNacimiento', null, ['class' => 'form-control']) !!}
</div>

<!-- Fechadefuncion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaDefuncion', 'Fechadefuncion:') !!}
    {!! Form::date('fechaDefuncion', null, ['class' => 'form-control']) !!}
</div>

<!-- Estadocivil Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estadoCivil', 'Estadocivil:') !!}
    {!! Form::text('estadoCivil', null, ['class' => 'form-control']) !!}
</div>

<!-- Iddireccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idDireccion', 'Iddireccion:') !!}
    {!! Form::number('idDireccion', null, ['class' => 'form-control']) !!}
</div>


<!-- APODERADOS -->
<!-- APODERADOS -->
<!-- APODERADOS -->

<!-- Idpersona Field https://laracasts.com/discuss/channels/laravel/form-model-binding-relations-how-to-bindpopulate-relations-in-a-form?page=1 -->
<div class="form-group col-sm-6">
    {!! Form::label('idApoderado', 'IdApoderado:') !!}
    {!! Form::number('apoderado[id]', null, ['class' => 'form-control']) !!}
</div>

<!-- Niveleducacional Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivelEducacional', 'Niveleducacional:') !!}
    {!! Form::text('apoderado[nivelEducacional]', null, ['class' => 'form-control']) !!}
</div>

<!-- Profesion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('profesion', 'Profesion:') !!}
    {!! Form::text('apoderado[profesion]', null, ['class' => 'form-control']) !!}
</div>

<!-- Paisdeorigen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paisDeOrigen', 'Paisdeorigen:') !!}
    {!! Form::text('apoderado[paisDeOrigen]', null, ['class' => 'form-control']) !!}
</div>

<!-- Idpersona Field https://laracasts.com/discuss/channels/laravel/form-model-binding-relations-how-to-bindpopulate-relations-in-a-form?page=1 -->
<div class="form-group col-sm-6">
    {!! Form::label('idPersona', 'Idpersona:') !!}
    {!! Form::number('apoderado[idPersona]', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::text('apoderado[estado]', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('apoderados.index') !!}" class="btn btn-default">Cancel</a>
</div>
