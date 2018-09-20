

<!-- Pnombrecand Field -->
<div class="form-group col-sm-4 {{ $errors->has('PNombre') ? ' has-error' : '' }}">
    {!! Form::label('PNombreApod', 'Primer Nombre Apoderado:') !!}
    {!! Form::text('PNombreApod',  $persona->PNombre, ['class' => 'form-control', 'placeholder' => 'Ingrese su primer nombre','required' => '', 'pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}", 'title' => 'No debe tener más de 30 caracteres']) !!}
</div>


<!-- Snombrecand Field -->
<div class="form-group col-sm-4 {{ $errors->has('SNombre') ? ' has-error' : '' }}">
    {!! Form::label('SNombreApod', 'Segundo Nombre Apoderado: ')  !!}
    {!! Form::text('SNombreApod', $persona->SNombre, ['class' => 'form-control', 'placeholder' => 'Ingrese su segundo nombre','pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}", 'title' => 'No puede tener más de 30 caracteres']) !!}
</div>

<!-- Tnombrecand Field -->
<div class="form-group col-sm-4 {{ $errors->has('TNombre') ? ' has-error' : '' }}">
    {!! Form::label('TNombreApod', 'Tercer Nombre:',array('class' => 'opcional')) !!}
    {!! Form::text('TNombreApod', $persona->TNombre, ['class' => 'form-control', 'placeholder' => 'Ingrese su tercer nombre','pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}",  'title' => 'No puede tener más de 30 caracteres']) !!}
</div>

<!-- ApPat Field -->
<div class="form-group col-sm-4 {{ $errors->has('ApPat') ? ' has-error' : '' }}">
    {!! Form::label('TNombreApod', 'Tercer Nombre:',array('class' => 'opcional')) !!}
    {!! Form::text('TNombreApod', $persona->ApPat, ['class' => 'form-control', 'placeholder' => 'Ingrese su tercer nombre','pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}",  'title' => 'No puede tener más de 30 caracteres']) !!}
</div>

<!-- ApMat Field -->
<div class="form-group col-sm-4 {{ $errors->has('ApMat') ? ' has-error' : '' }}">
    {!! Form::label('TNombreApod', 'Tercer Nombre:',array('class' => 'opcional')) !!}
    {!! Form::text('TNombreApod', $persona->ApMat, ['class' => 'form-control', 'placeholder' => 'Ingrese su tercer nombre','pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}",  'title' => 'No puede tener más de 30 caracteres']) !!}
</div>

<!-- Fonofijo Field -->
<div class="form-group col-sm-6 {{ $errors->has('fonoFijo') ? ' has-error' : '' }}">
    {!! Form::label('fonoFijoApo', 'Fono Fijo Apoderado:',array('class' => 'opcional')) !!}
    {!! Form::tel('fonoFijoApo', $persona->fonoFijo, ['class' => 'form-control', 'placeholder' => 'Ingrese su teléfono fijo en caso que posea (Ej: 226213316)', 'pattern' => "[0-9]{9}", 'title' => 'No puede tener más de nueve dígitos']) !!}
</div>

<!-- Fonocelu Field -->
<div class="form-group col-sm-6 {{ $errors->has('fonoCelu') ? ' has-error' : '' }}">
    {!! Form::label('fonoCeluApo', 'Fono Celular Apoderado:') !!}
    {!! Form::tel('fonoCeluApo', $persona->fonoCelu, ['class' => 'form-control', 'placeholder' => 'Ingrese su teléfono celular (Ej: 984337683)','required' => '','pattern' => "[0-9]{9}", 'title' => 'No puede tener más de nueve dígitos']) !!}
</div>

<!-- Rut Field -->
<div class="form-group col-sm-6 {{ $errors->has('rut') ? ' has-error' : '' }}">
    {!! Form::label('rutApo', 'Rut Apoderado:') !!}
    {!! Form::text('rutApo', $persona->rut, ['class' => 'form-control', 'placeholder' => 'Ingrese un Run/Rut válido','oninput'=>"checkRut(this)",'maxlength'=>"11" , 'required' => '']) !!}
</div>

<!-- Correo Field -->
<div class="form-group col-sm-6 {{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('correoApo', 'Correo Apoderado:') !!}
    {!! Form::email('correoApo', $persona->email, ['class' => 'form-control', 'placeholder' => 'Ingrese correo electrónico: ejemplo@gmail.com', 'maxlength' => "100"]) !!}
</div>




<!-- Submit Field -->

<div class="form-group col-sm-10">
   
</div>
<div class="form-group col-sm-2 ">
    <div class="pull-right">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    </div>
    
</div>
