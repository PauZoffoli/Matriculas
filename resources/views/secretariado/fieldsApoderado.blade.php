<div class="form-group col-sm-4 {{ $errors->has('profesion') ? ' has-error' : '' }}">
    {!! Form::label('profesion', 'Profesion:') !!}
    {!! Form::text('paisDeOrigen',  $persona->apoderado->profesion, ['class' => 'form-control', 'placeholder' => 'Ingrese su primer nombre','required' => '', 'pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}", 'title' => 'No debe tener más de 30 caracteres']) !!}
</div>


<!-- Snombrecand Field -->
<div class="form-group col-sm-4 {{ $errors->has('paisDeOrigen') ? ' has-error' : '' }}">
    {!! Form::label('paisDeOrigen', 'País de origen: ')  !!}
    {!! Form::text('paisDeOrigen', $persona->apoderado->paisDeOrigen, ['class' => 'form-control', 'placeholder' => 'Ingrese su segundo nombre','pattern' => "[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}", 'title' => 'No puede tener más de 30 caracteres']) !!}
</div>

<div class="form-group col-sm-10">
   
</div>
<div class="form-group col-sm-2 ">
    <div class="pull-right">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    </div>
    
</div>