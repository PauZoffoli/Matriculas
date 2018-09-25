<!--para las personas ALUMNO Y APODERADO-->


<!-- Pnombrecand Field -->
<div class="form-group col-sm-4 {{ $errors->has('PNombre') ? ' has-error' : '' }}">
    {!! Form::label('PNombre', 'Primer Nombre:') !!}
    {!! Form::text('PNombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su primer nombre','required' => '', 'pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}", 'title' => 'No debe tener más de 30 caracteres']) !!}
</div>

<!-- idPersona Field -->
<div class="form-group col-sm-4" style="display: none">
    {!! Form::label('idPersona', 'idPersona:') !!}
    {!! Form::text('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Snombrecand Field -->
<div class="form-group col-sm-4 {{ $errors->has('SNombre') ? ' has-error' : '' }}">
    {!! Form::label('SNombre', 'Segundo Nombre: ')  !!}
    {!! Form::text('SNombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su segundo nombre','pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}", 'title' => 'No puede tener más de 30 caracteres']) !!}
</div>


<!-- Tnombrecand Field -->
<div class="form-group col-sm-4 {{ $errors->has('TNombre') ? ' has-error' : '' }}">
    {!! Form::label('TNombre', 'Tercer Nombre:',array('class' => 'opcional')) !!}
    {!! Form::text('TNombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su tercer nombre','pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}",  'title' => 'No puede tener más de 30 caracteres']) !!}
</div>


<!-- ApPat Field -->
<div class="form-group col-sm-6 {{ $errors->has('ApPat') ? ' has-error' : '' }}">
    {!! Form::label('ApPat', 'Apellido Paterno:') !!}
    {!! Form::text('ApPat', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su apellido paterno.','required' => '', 'pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}",  'title' => 'No puede tener más de 30 caracteres']) !!}
</div>

<!-- ApMat Field -->
<div class="form-group col-sm-6 {{ $errors->has('ApMat') ? ' has-error' : '' }}">
    {!! Form::label('ApMat', 'Apellido Materno:') !!}
    {!! Form::text('ApMat', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su apellido materno','required' => '', 'pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}",  'title' => 'No puede tener más de 30 caracteres']) !!}
</div>

<!-- Genero Field -->
<div class="form-group col-sm-3">
    {!! Form::label('genero', 'Genero:') !!}
    {!! Form::select('genero', App\Enums\Genero::getPossibleENUM(), ( isset($persona->genero) ? $persona->genero : null ),  array('id' => 'genero', 'class' => 'form-control', 'required' => 'true')) !!}
</div>


<!-- Fechanacimiento Field -->
<div class="form-group col-sm-3 {{ $errors->has('fechaNacimiento') ? ' has-error' : '' }}">
    {!! Form::label('fechaNacimiento', 'Fecha de Nacimiento:') !!}
    {!! Form::date('fechaNacimiento', (isset($persona->fechaNacimiento) && $persona->fechaNacimiento ? Carbon\Carbon::parse($persona->fechaNacimiento)->format('Y-m-d')  : date('Y-m-d')), ['class' => 'form-control', 'placeholder' => 'dd-mm-YYYY', 'required' => 'true']) !!}
</div>

<!-- Estadocivil Field -->
<div class="form-group col-sm-3 {{ $errors->has('estadoCivil') ? ' has-error' : '' }}">
    {!! Form::label('estadoCivil', 'Estado Civil:') !!}
    {!! Form::select('estadoCivil', App\Enums\EstadoCivil::getPossibleENUM(), ( isset($persona->estadoCivil) ? $persona->estadoCivil : null ),  array('id' => 'estadoCivil', 'class' => 'form-control', 'required' => 'true')) !!}
</div>



<!-- Correoapo Field -->
<div class="form-group col-sm-3 {{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Correo electrónico:') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@gmail.com', 'maxlength' => "100", 'required' => 'true']) !!}
</div>


<!-- Fonofijoapo Field -->
<div class="form-group col-sm-3 {{ $errors->has('fonoFijo') ? ' has-error' : '' }}">
    {!! Form::label('fonoFijo', 'Teléfono Fijo:',array('class' => 'opcional')) !!}
    {!! Form::tel('fonoFijo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su teléfono fijo en caso que posea (Ej: 226213316)', 'pattern' => "[0-9]{9}", 'title' => 'No puede tener más de nueve dígitos']) !!}
</div>
<!-- Fonoceluapo Field -->
<div class="form-group col-sm-3 {{ $errors->has('fonoCelu') ? ' has-error' : '' }}">
    {!! Form::label('fonoCelu', 'Teléfono Celular:') !!}
    {!! Form::tel('fonoCelu', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su teléfono celular (Ej: 984337683)','required' => 'true','pattern' => "[0-9]{9}", 'title' => 'No puede tener más de nueve dígitos']) !!}
</div>



