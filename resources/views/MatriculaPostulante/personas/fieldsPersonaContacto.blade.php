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

<!--para las personas ALUMNO Y APODERADO-->



<!-- SIN CAMBIOS SIN CAMBIOS-->
<!-- Pnombrecand Field -->
<div class="form-group col-sm-4 {{ $errors->has('PNombre') ? ' has-error' : '' }}">
    {!! Form::label('PNombre', 'Primer Nombre:') !!}
    {!! Form::text($PNombreLBL, ( isset($PNombreTXT) ? $PNombreTXT : "PRUEBA" ), ['class' => 'form-control', 'placeholder' => 'Ingrese su primer nombre','required' => '', 'pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}", 'title' => 'No debe tener más de 30 caracteres']) !!}
</div>
 
<!-- Snombrecand Field -->
<div class="form-group col-sm-4 {{ $errors->has('SNombre') ? ' has-error' : '' }}">
    {!! Form::label('SNombre', 'Segundo Nombre: ')  !!}
    {!! Form::text($SNombreLBL,  ( isset($SNombreTXT) ? $SNombreTXT : "PRUEBA" ), ['class' => 'form-control', 'placeholder' => 'Ingrese su segundo nombre','pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}", 'title' => 'No puede tener más de 30 caracteres']) !!}
</div>

<!-- Tnombrecand Field -->
<div class="form-group col-sm-4 {{ $errors->has('TNombre') ? ' has-error' : '' }}">
    {!! Form::label('TNombre', 'Tercer Nombre:',array('class' => 'opcional')) !!}
    {!! Form::text($TNombreLBL,  ( isset($TNombreTXT) ? $TNombreTXT : "PRUEBA"  ), ['class' => 'form-control', 'placeholder' => 'Ingrese su tercer nombre','pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}",  'title' => 'No puede tener más de 30 caracteres']) !!}
</div>


<!-- ApPat Field -->
<div class="form-group col-sm-6 {{ $errors->has('ApPatLBL') ? ' has-error' : '' }}">
    {!! Form::label('ApPat', 'Apellido Paterno:') !!}
    {!! Form::text($ApPatLBL,  ( isset($ApPatTXT) ? $ApPatTXT : "PRUEBA"  ), ['class' => 'form-control', 'placeholder' => 'Ingrese su apellido paterno.','required' => 'true', 'pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}",  'title' => 'No puede tener más de 30 caracteres']) !!}
</div>



<!-- ApMat Field -->
<div class="form-group col-sm-6 {{ $errors->has('ApMatLBL') ? ' has-error' : '' }}">
    {!! Form::label('ApMat', 'Apellido Materno:') !!}
    {!! Form::text($ApMatLBL,  ( isset($ApMatTXT) ? $ApMatTXT : "PRUEBA"  ), ['class' => 'form-control', 'placeholder' => 'Ingrese su apellido materno', 'pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}",  'title' => 'No puede tener más de 30 caracteres']) !!}
</div>

<!-- Fonofijoapo Field -->
<div class="form-group col-sm-3 {{ $errors->has('$fonoFijoLBL') ? ' has-error' : '' }}">
    {!! Form::label('fonoFijo', 'Teléfono Fijo:',array('class' => 'opcional')) !!}
    {!! Form::tel($fonoFijoLBL,  ( isset($fonoFijoTXT) ? $fonoFijoTXT : 123 ), ['class' => 'form-control', 'placeholder' => 'Ingrese su teléfono fijo en caso que posea (Ej: 226213316)', 'pattern' => "[0-9]{9}", 'title' => 'No puede tener más de nueve dígitos']) !!}
</div>


<!-- Fonoceluapo Field -->
<div class="form-group col-sm-3 {{ $errors->has('fonoCeluLBL') ? ' has-error' : '' }}">
    {!! Form::label('fonoCelu', 'Teléfono Celular:') !!}
    {!! Form::tel($fonoCeluLBL,  ( isset($fonoCeluTXT) ? $fonoCeluTXT : 123 ), ['class' => 'form-control', 'placeholder' => 'Ingrese su teléfono celular (Ej: 984337683)','required' => '','pattern' => "[0-9]{9}", 'title' => 'No puede tener más de nueve dígitos']) !!}
</div>


@if(isset($rutLBL))
<!-- Rut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rut', 'Rut:') !!}
    {!! Form::text($rutLBL,  ( isset($rutTXT) ? $rutTXT : 123 ), ['class' => 'form-control']) !!}
</div>
@endif

@if(isset($generoLBL))
<!-- Genero Field -->
<div class="form-group col-sm-6 {{ $errors->has('generoLBL') ? ' has-error' : '' }}">
    {!! Form::label('genero', 'Genero:') !!}

     {!! Form::select($generoLBL, App\Enums\Genero::getPossibleENUM(), ( isset($generoTXT) ? $generoTXT : 'Hombre' ),  array('id' => $generoLBL, 'class' => 'form-control', 'required' => 'true', 'placeholder' => "Seleccione el genero de la persona")) !!}
</div>

@endif


<!-- Correoapo Field -->
<div class="form-group col-sm-3 {{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Email (Opcional):') !!}
    {!! Form::email($emailLBL,  ( isset($emailTXT) ? $emailTXT : 'pas@pas.cl' ), ['class' => 'form-control']) !!}
</div>

@if(isset($fechaNacimientoLBL))

<!-- Fechanacimiento Field -->
<div class="form-group col-sm-3 {{ $errors->has('fechaNacimientoLBL') ? ' has-error' : '' }}">
    {!! Form::label('fechaNacimiento', 'Fecha de Nacimiento:') !!}
    {!! Form::date($fechaNacimientoLBL, (isset($fechaNacimientoTXT) && $fechaNacimientoTXT ? Carbon\Carbon::parse($fechaNacimientoTXT)->format('Y-m-d')  : date('Y-m-d')), ['class' => 'form-control', 'placeholder' => 'dd-mm-YYYY', 'required' => '']) !!}
</div>

@endif

@if(isset($estadoCivilLBL))
<!-- Estadocivil Field -->
<div class="form-group col-sm-3 {{ $errors->has('estadoCivil') ? ' has-error' : '' }}">
    {!! Form::label('estadoCivil', 'Estado Civil:') !!}
        {!! Form::select($estadoCivilLBL, App\Enums\EstadoCivil::getPossibleENUM(),  ( isset($estadoCivilTXT) ? $estadoCivilTXT : null ),  array('id' => $estadoCivilLBL, 'class' => 'form-control', 'placeholder' => "Seleccione el estado civil")) !!}
</div>

@endif

@if(isset($parentescoLBL)) <!--SI EL APODERADO ES PADRE, PUESTO ASÍ LO ESCOGIO EN EL PARENTESCO-->
@if($parentescoLBL == "padre[parentesco]" )
    <!-- Parentesco Field -->
<div class="form-group col-sm-6" style="display: none;">
    {!! Form::label('parentesco', 'Padre:') !!}
    {!! Form::select($parentescoLBL,  ["Padre" => "Padre"], "Padre",  array('id' => $parentescoLBL, 'class' => 'form-control')) !!}
</div>
@endif

@if($parentescoLBL == "madre[parentesco]")
    <!-- Parentesco Field -->
<div class="form-group col-sm-6" style="display: none;">
    {!! Form::label('parentesco', 'Madre:') !!}
    {!! Form::select($parentescoLBL, ["Madre"=> "Madre"], "Madre",  array('id' => $parentescoLBL, 'class' => 'form-control')) !!}
</div>
@endif
@if($parentescoLBL != "madre[parentesco]" && $parentescoLBL != "padre[parentesco]")
    <!-- Parentesco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parentesco', 'Parentesco:') !!}
    {!! Form::select($parentescoLBL, App\Enums\ParentescoAlumnoResponsableEnum::getPossibleENUM(), ( isset($parentescoTXT) ? $parentescoTXT : "Padre" ),  array('id' => $parentescoLBL, 'class' => 'form-control', 'placeholder' => "Seleccione el parentesco del alumno con el contacto")) !!}
</div>
@endif
@endif