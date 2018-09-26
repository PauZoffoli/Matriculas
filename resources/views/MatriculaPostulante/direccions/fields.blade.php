&nbsp; <br> 
<div class="box-body form-group col-sm-12">
<!-- Idcomuna Field -->

<section class="content-header" style="color: gray;">
        <h1>
           Direcciones 
        </h1> <br>
</section>
<div class="form-group col-sm-3">
    {!! Form::label('idComuna', 'Comuna:') !!}
     {!! Form::select('direccion[idComuna]', App\Enums\ComunaEnum::getPossibleENUM(), ( isset($persona->direccion->idComuna) ? $persona->direccion->Idcomuna : 104 ),  array('id' => 'direccion[idComuna]', 'class' => 'form-control', 'required' => 'true', 'maxlength' => "191")) !!}

</div>

<!-- Calle Field -->
<div class="form-group col-sm-4 {{ $errors->has('$persona->direccion->calle') ? ' has-error' : '' }}">
    {!! Form::label('direccion[calle]', 'Calle/Dirección:') !!}
    {!! Form::text('direccion[calle]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la calle (Sin números). Ejemplo: Vicuña Mackenna', 'required' => 'true', 'maxlength'=> "191"]) !!}
</div>


<!-- Nrocalle Field -->
<div class="form-group col-sm-2 {{ $errors->has('$persona->direccion->nroCalle') ? ' has-error' : '' }}">
    {!! Form::label('numeroCalle', 'Número de Calle:') !!}
    {!! Form::text('direccion[nroCalle]', null, ['class' => 'form-control' , 'required' => 'true', 'maxlength' => "50"]) !!}
</div>

<!-- Dpto Field -->
<div class="form-group col-sm-1  {{ $errors->has('$persona->direccion->dpto') ? ' has-error' : '' }}">
    {!! Form::label('dpto', 'Dpto:') !!}
    {!! Form::text('direccion[dpto]', null, ['class' => 'form-control', 'placeholder' => 'Departamento', 'maxlength' => "30"]) !!}
</div>

<!-- Bloquetorre Field -->
<div class="form-group col-sm-2  {{ $errors->has('$persona->direccion->bloqueTorre') ? ' has-error' : '' }}">
    {!! Form::label('bloqueTorre', 'Bloque o Torre:') !!}
    {!! Form::text('direccion[bloqueTorre]', null, ['class' => 'form-control', 'placeholder' => 'Bloque o Torre', 'maxlength' => "30"]) !!}
</div>


</div>
