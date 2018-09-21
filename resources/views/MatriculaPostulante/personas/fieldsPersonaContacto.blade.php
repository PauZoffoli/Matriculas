<!--
/*$PNombreLBL = $asd;
$SNombreLBL = $asd;
$TNombreLBL = $asd;
$ApPatLBL = $asd;
$ApMatLBL = $asd;
$fonoFijoLBL = $asd;
$fonoCeluLBL = $asd;
$rutLBL = $asd;
$tipoPersonaLBL = $asd;
$generoLBL = $asd;
$emailLBL = $asd;
$fechaNacimientoLBL = $asd;
$fechaDefuncionLBL = $asd;
$estadoCivilLBL = $asd;
$idDireccionLBL = $asd;
$idUserLBL = $asd;


$PNombreTXT = $asd;
$SNombreTXT = $asd;
$TNombreTXT = $asd;
$ApPatTXT = $asd;
$ApMatTXT = $asd;
$fonoFijoTXT = $asd;
$fonoCeluTXT = $asd;
$rutTXT = $asd;
$tipoPersonaTXT = $asd;
$generoTXT = $asd;
$emailTXT = $asd;
$fechaNacimientoTXT = $asd;
$fechaDefuncionTXT = $asd;
$estadoCivilTXT = $asd;
$idDireccionTXT = $asd;
$idUserTXT = $asd;*/
-->

 
<!-- Pnombre Field -->
<div class="form-group col-sm-4">
    {!! Form::label('PNombre', 'Pnombre:') !!}
    {!! Form::text($PNombreLBL, ( isset($PNombreTXT) ? $PNombreTXT : null ), ['class' => 'form-control']) !!}
</div>

<!-- Snombre Field -->
<div class="form-group col-sm-4">
    {!! Form::label('SNombre', 'Snombre:') !!}
    {!! Form::text($SNombreLBL,  ( isset($SNombreTXT) ? $SNombreTXT : null ), ['class' => 'form-control']) !!}
</div>

<!-- Tnombre Field -->
<div class="form-group col-sm-4">
    {!! Form::label('TNombre', 'Tnombre:') !!}
    {!! Form::text($TNombreLBL,  ( isset($TNombreTXT) ? $TNombreTXT : null ), ['class' => 'form-control']) !!}
</div>

<!-- Appat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ApPat', 'Appat:') !!}
    {!! Form::text($ApPatLBL,  ( isset($ApPatTXT) ? $ApPatTXT : null ), ['class' => 'form-control']) !!}
</div>

<!-- Apmat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ApMat', 'Apmat:') !!}
    {!! Form::text($ApMatLBL,  ( isset($ApMatTXT) ? $ApMatTXT : null ), ['class' => 'form-control']) !!}
</div>

<!-- Fonofijo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fonoFijo', 'Fonofijo:') !!}
    {!! Form::number($fonoFijoLBL,  ( isset($fonoFijoTXT) ? $fonoFijoTXT : null ), ['class' => 'form-control']) !!}
</div>

<!-- Fonocelu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fonoCelu', 'Fonocelu:') !!}
    {!! Form::number($fonoCeluLBL,  ( isset($fonoCeluTXT) ? $fonoCeluTXT : null ), ['class' => 'form-control']) !!}
</div>


@if(isset($rutLBL))
<!-- Rut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rut', 'Rut:') !!}
    {!! Form::text($rutLBL,  ( isset($rutTXT) ? $rutTXT : null ), ['class' => 'form-control']) !!}
</div>
@endif

<!-- Genero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('genero', 'Genero:') !!}

     {!! Form::select($generoLBL, App\Enums\Genero::getPossibleENUM(), ( isset($generoTXT) ? $generoTXT : null ),  array('id' => $generoLBL, 'class' => 'form-control', 'placeholder' => "Seleccione el genero de la persona")) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email (Opcional):') !!}
    {!! Form::email($emailLBL,  ( isset($emailTXT) ? $emailTXT : null ), ['class' => 'form-control']) !!}
</div>

@if(isset($fechaNacimientoLBL))
<!-- Fechanacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaNacimiento', 'Fechanacimiento:') !!}
    {!! Form::date($fechaNacimientoLBL,  ( isset($fechaNacimientoTXT) ? $fechaNacimientoTXT : null ), ['class' => 'form-control']) !!}
</div>
@endif

@if(isset($estadoCivilLBL))
<!-- Estadocivil Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estadoCivil', 'Estadocivil:') !!}
        {!! Form::select($estadoCivilLBL, App\Enums\EstadoCivil::getPossibleENUM(),  ( isset($estadoCivilTXT) ? $estadoCivilTXT : null ),  array('id' => $estadoCivilLBL, 'class' => 'form-control', 'placeholder' => "Seleccione el estado civil")) !!}
</div>
@endif

@if(isset($parentescoLBL))
    <!-- Parentesco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parentesco', 'Parentesco:') !!}
    {!! Form::select($parentescoLBL, App\Enums\ParentescoAlumnoResponsableEnum::getPossibleENUM(), ( isset($parentescoTXT) ? $parentescoTXT : null ),  array('id' => $parentescoLBL, 'class' => 'form-control', 'placeholder' => "Seleccione el parentesco del alumno con el contacto")) !!}
</div>

<!-- Otroparentesco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('otroParentesco', 'Otroparentesco:') !!}
    {!! Form::text($otroParentescoLBL, ( isset($otroParentescoTXT) ? $otroParentescoTXT : null ), ['class' => 'form-control']) !!}
</div>
@endif