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


<div class=" alert alert-info">
    <span class="glyphicon glyphicon-warning-sign"></span><em> La siguiente información es obligatoriamente requerida por el Ministerio de Educación. Si usted no posee algún dato obligatorio marque la casilla, los campos se autocompletarán con "NO TIENE", lo cual no significa que el alumno no tenga padre/madre conocidos, si no que es una información meramente para que el sistema lo deje seguir con el proceso.</em>
</div>


<!-- SIN CAMBIOS SIN CAMBIOS-->
<!-- Pnombrecand Field -->
<div class="form-group col-sm-4 {{ $errors->has('PNombre') ? ' has-error' : '' }}">
    {!! Form::label('PNombre', 'Primer Nombre:') !!}
    {!! Form::text($PNombreLBL, ( isset($PNombreTXT) ? $PNombreTXT : null ), ['class' => 'form-control', 'placeholder' => 'Ingrese primer nombre','required' => '', 'pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}", 'title' => 'No debe tener más de 30 caracteres']) !!}
</div>
 
<!-- Snombrecand Field -->
<div class="form-group col-sm-4 {{ $errors->has('SNombre') ? ' has-error' : '' }}">
    {!! Form::label('SNombre', 'Segundo Nombre:' ,array('class' => 'opcional'))  !!}
    {!! Form::text($SNombreLBL,  ( isset($SNombreTXT) ? $SNombreTXT : null ), ['class' => 'form-control', 'placeholder' => 'Ingrese segundo nombre','pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}", 'title' => 'No puede tener más de 30 caracteres']) !!}
</div>

<!-- Tnombrecand Field -->
<div class="form-group col-sm-4 {{ $errors->has('TNombre') ? ' has-error' : '' }}">
    {!! Form::label('TNombre', 'Tercer Nombre:',array('class' => 'opcional')) !!}
    {!! Form::text($TNombreLBL,  ( isset($TNombreTXT) ? $TNombreTXT :null  ), ['class' => 'form-control', 'placeholder' => 'Ingrese tercer nombre','pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}",  'title' => 'No puede tener más de 30 caracteres']) !!}
</div>


<!-- ApPat Field -->
<div class="form-group col-sm-6 {{ $errors->has('ApPatLBL') ? ' has-error' : '' }}">
    {!! Form::label('ApPat', 'Apellido Paterno:') !!}
    {!! Form::text($ApPatLBL,  ( isset($ApPatTXT) ? $ApPatTXT : null  ), ['class' => 'form-control', 'placeholder' => 'Ingrese apellido paterno.','required' => 'true', 'pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}",  'title' => 'No puede tener más de 30 caracteres']) !!}
</div>



<!-- ApMat Field -->
<div class="form-group col-sm-6 {{ $errors->has('ApMatLBL') ? ' has-error' : '' }}">
    {!! Form::label('ApMat', 'Apellido Materno:') !!}
    {!! Form::text($ApMatLBL,  ( isset($ApMatTXT) ? $ApMatTXT : null  ), ['class' => 'form-control', 'placeholder' => 'Ingrese apellido materno', 'pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}",  'title' => 'No puede tener más de 30 caracteres']) !!}
</div>

<!-- Fonofijoapo Field -->
<div class="form-group col-sm-3 {{ $errors->has('$fonoFijoLBL') ? ' has-error' : '' }}">
    {!! Form::label('fonoFijo', 'Teléfono Fijo:',array('class' => 'opcional')) !!}
    {!! Form::tel($fonoFijoLBL,  ( isset($fonoFijoTXT) ? $fonoFijoTXT : null ), ['class' => 'form-control', 'placeholder' => 'Ingrese teléfono fijo en caso que posea (Ej: 226213316)', 'pattern' => "[0-9]{9}", 'title' => 'No puede tener más de nueve dígitos']) !!}
</div>


<div class="form-group col-sm-3 {{ $errors->has('fonoCeluLBL') ? ' has-error' : '' }}">
    {!! Form::label('fonoCelu', 'Teléfono Celular:',array('class' => 'opcional')) !!}
    {!! Form::tel($fonoCeluLBL,  ( isset($fonoCeluTXT) ? $fonoCeluTXT : null ), ['class' => 'form-control', 'placeholder' => 'Ingrese teléfono celular (Ej: 984337683)','pattern' => "[0-9]{9}", 'title' => 'No puede tener más de nueve dígitos']) !!}
</div>


<!-- Rut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rut', 'Rut:') !!}
    {!! Form::text($rutLBL,  ( isset($rutTXT) ? $rutTXT : null ), ['class' => 'form-control','maxlength'=>"11" , 'required' => 'true','oninput'=>"checkRut(this)" , 'placeholder' => 'Ingrese el rut']) !!}

</div>


<!-- Correoapo Field -->
<div class="form-group col-sm-4 {{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Email:',array('class' => 'opcional')) !!}
    {!! Form::email($emailLBL,  ( isset($emailTXT) ? $emailTXT : null ), ['class' => 'form-control']) !!}
</div>

<!-- Fechanacimiento Field -->
<div class="form-group col-sm-4 {{ $errors->has('fechaNacimientoLBL') ? ' has-error' : '' }}">
    {!! Form::label('fechaNacimiento', 'Fecha de Nacimiento:',array('class' => 'opcional')) !!}
    {!! Form::date($fechaNacimientoLBL, (isset($fechaNacimientoTXT) && $fechaNacimientoTXT ? Carbon\Carbon::parse($fechaNacimientoTXT)->format('Y-m-d')  : null), ['class' => 'form-control', 'placeholder' => 'dd-mm-YYYY']) !!}
</div>

<div class="form-group col-sm-4 {{ $errors->has('fechaDefuncionLBL') ? ' has-error' : '' }}">
    {!! Form::label('fechaDefuncionLBL', 'Fecha de Defunción:',array('class' => 'opcional')) !!}
    {!! Form::date($fechaDefuncionLBL, (isset($fechaDefuncionTXT) && $fechaDefuncionTXT ? Carbon\Carbon::parse($fechaDefuncionTXT)->format('Y-m-d')  : null), ['class' => 'form-control', 'placeholder' => 'dd-mm-YYYY']) !!}
</div>


<div class="form-group col-sm-3 {{ $errors->has('estadoCivil') ? ' has-error' : '' }}">
    {!! Form::label('estadoCivil', 'Estado Civil:') !!}
        {!! Form::select($estadoCivilLBL, App\Enums\EstadoCivil::getPossibleENUM(),  ( isset($estadoCivilTXT) ? $estadoCivilTXT : 'Se Desconoce' ),  array('id' => $estadoCivilLBL, 'class' => 'form-control','required'=> 'true', 'placeholder' => "Seleccione estado civil")) !!}
</div>


<!-- Genero Field -->
<div class="form-group col-sm-3 {{ $errors->has('generoLBL') ? ' has-error' : '' }}">
    {!! Form::label('genero', 'Sexo:') !!}

     {!! Form::select($generoLBL, App\Enums\Genero::getPossibleENUM(), ( isset($generoTXT) ? $generoTXT : null ),  array('id' => $generoLBL, 'class' => 'form-control', 'required' => 'true', 'placeholder' => "Seleccione el genero de la persona")) !!}
</div>

<!-- Niveleducacional Field -->
<div class="form-group col-sm-3 {{ $errors->has('nivelEducacionalLBL') ? ' has-error' : '' }}">
    {!! Form::label('nivelEducacional', 'Nivel Educacional:',array('class' => 'opcional')) !!}
     {!! Form::select($nivelEducacionalLBL, App\Enums\NivelEducacionalEnum::getPossibleENUM(), ( isset($nivelEducacionalTXT) ? $nivelEducacionalTXT : null ),  array('id' => $nivelEducacionalLBL, 'class' => 'form-control', 'placeholder' => 'Seleccione un nivel educacional')) !!}
</div>


<!-- Profesion Field -->
<div class="form-group col-sm-3 {{ $errors->has('profesionLBL') ? ' has-error' : '' }}">
    {!! Form::label('profesion', 'Profesión/Oficio:',array('class' => 'opcional')) !!}
    {!! Form::text($profesionLBL,  ( isset($profesionTXT) ? $profesionTXT : null ), ['class' => 'form-control', 'maxlength' => "100", 'placeholder' => 'Ingrese profesión o oficio']) !!}
</div>

<!-- Paisdeorigen Field -->
<div class="form-group col-sm-12">

    {!! Form::label($paisDeOrigenLBL, 'Nacionalidad (Si tiene doble nacionalidad (Ejemplo: Chilena y otra) prefiera Chile:',array('class' => 'opcional')) !!}
    {!! Form::select($paisDeOrigenLBL, App\Enums\PaisEnum::getPossibleENUM(), ( isset($paisDeOrigenTXT) ? $paisDeOrigenTXT : null ),  array('id' => $paisDeOrigenLBL, 'class' => 'form-control','placeholder' => "Seleccione Nacionalidad")) !!}

</div>



{{-- DIRECCIONES --}}

&nbsp; <br> 
<div class="box-body form-group col-sm-12">
<!-- Idcomuna Field -->

<section class="content-header" style="color: gray;">
        <h1>
           Direcciones 
        </h1> <br>
</section>
<div class="form-group col-sm-12 ">
    <p style="color:red;">La dirección de los padres es obligatoria para el ministerio, pero en caso de no tenerla, no es necesario rellenarla para seguir con el proceso.</p>
</div>
<div class="form-group col-sm-3 {{ $errors->has('$comunaLBL') ? ' has-error' : '' }}">
    {!! Form::label('idComuna', 'Comuna:',array('class' => 'opcional')) !!}
     {!! Form::select($idComunaLBL, App\Enums\ComunaEnum::getPossibleENUM(), ( isset($idComunaTXT) ? $idComunaTXT : null ),  array('id' => 'direccion[idComuna]', 'class' => 'form-control', 'maxlength' => "191", 'placeholder' => 'Seleccione Comuna')) !!}

</div>

<!-- Calle Field -->
<div class="form-group col-sm-4 {{ $errors->has('$calleLBL') ? ' has-error' : '' }}">
    {!! Form::label('direccion[calle]', 'Calle/Dirección:',array('class' => 'opcional')) !!}
    {!! Form::text($calleLBL, ( isset($calleTXT) ? $calleTXT : null ), ['class' => 'form-control', 'placeholder' => 'Ingrese la calle (Sin números). Ejemplo: Vicuña Mackenna', 'maxlength'=> "191"]) !!}
</div>


<!-- Nrocalle Field -->
<div class="form-group col-sm-2 {{ $errors->has('$nroCalleLBL') ? ' has-error' : '' }}">
    {!! Form::label('numeroCalle', 'Número de Calle:') !!}
    {!! Form::text($nroCalleLBL,  ( isset($nroCalleTXT) ? $nroCalleTXT : null ), ['class' => 'form-control' , 'maxlength' => "50"]) !!}
</div>

<!-- Dpto Field -->
<div class="form-group col-sm-1  {{ $errors->has('$dptoLBL') ? ' has-error' : '' }}">
    {!! Form::label('dpto', 'Dpto:') !!}
    {!! Form::text($dptoLBL,  ( isset($dptoTXT) ? $dptoTXT : null ), ['class' => 'form-control', 'placeholder' => 'Departamento', 'maxlength' => "30"]) !!}
</div>

<!-- Bloquetorre Field -->
<div class="form-group col-sm-2  {{ $errors->has('$bloqueTorreLBL') ? ' has-error' : '' }}">
    {!! Form::label('bloqueTorre', 'Bloque o Torre:') !!}
    {!! Form::text($bloqueTorreLBL,  ( isset($bloqueTorreTXT) ? $bloqueTorreTXT : null ), ['class' => 'form-control', 'placeholder' => 'Bloque o Torre', 'maxlength' => "30"]) !!}
</div>


</div>


<!--SI EL APODERADO ES PADRE, PUESTO ASÍ LO ESCOGIO EN EL PARENTESCO-->
{{-- DEFINIMOS PARENTESCOS, DEBE ESTAR NO BORRAR --}}
@if(isset($parentescoLBL)) 
        @if($parentescoLBL == "padre[parentesco]" )
        <!-- Parentesco padre Field -->
            <div class="form-group col-sm-6" style="display: none;">
                {!! Form::label('parentesco', 'Padre:') !!}
                {!! Form::select($parentescoLBL,  ["Padre" => "Padre"], "Padre",  array('id' => $parentescoLBL, 'class' => 'form-control')) !!}
            </div>
        @endif

        @if($parentescoLBL == "madre[parentesco]")
        <!-- Parentesco madre Field -->
            <div class="form-group col-sm-6" style="display: none;">
                {!! Form::label('parentesco', 'Madre:') !!}
                {!! Form::select($parentescoLBL, ["Madre"=> "Madre"], "Madre",  array('id' => $parentescoLBL, 'class' => 'form-control')) !!}

            </div>
        @endif
@endif

<!-- Validador Rut-->
    <script src="{{ asset('js/validarRUT.js')}}"></script>