<!--para las personas ALUMNO Y APODERADO-->

<!-- Pnombre Field -->
<div class="form-group col-sm-4">
    {!! Form::label('PNombre', 'Pnombre:') !!}
    {!! Form::text('PNombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Snombre Field -->
<div class="form-group col-sm-4">
    {!! Form::label('SNombre', 'Snombre:') !!}
    {!! Form::text('SNombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Tnombre Field -->
<div class="form-group col-sm-4 ">
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

 @include('MatriculaPostulante.direccions.fields')