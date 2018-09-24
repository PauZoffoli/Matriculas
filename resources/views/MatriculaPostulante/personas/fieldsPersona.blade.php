<!--para las personas ALUMNO Y APODERADO-->

<!-- Pnombre Field -->
<div class="form-group col-sm-4">
    {!! Form::label('PNombre', 'Pnombre:') !!}
    {!! Form::text('PNombre', null, ['class' => 'form-control']) !!}
</div>

<!-- idPersona Field -->
<div class="form-group col-sm-4" style="display: none">
    {!! Form::label('idPersona', 'idPersona:') !!}
    {!! Form::text('id', null, ['class' => 'form-control']) !!}
</div>


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

<!-- Genero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('genero', 'Genero:') !!}
    {!! Form::select('genero', App\Enums\Genero::getPossibleENUM(), ( isset($persona->genero) ? $persona->genero : null ),  array('id' => 'genero', 'class' => 'form-control')) !!}
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

<!-- Estadocivil Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estadoCivil', 'Estadocivil:') !!}
    {!! Form::select('estadoCivil', App\Enums\EstadoCivil::getPossibleENUM(), ( isset($persona->estadoCivil) ? $persona->estadoCivil : null ),  array('id' => 'estadoCivil', 'class' => 'form-control')) !!}
</div>

 @include('MatriculaPostulante.direccions.fields')