@include('MatriculaPostulante.personas.fieldsPersona')



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


<!-- MOSTRAMOS TODOS LOS ALUMNOS ASOCIADOS-->
@php $index = 0; @endphp
@foreach ($persona->apoderado->alumnos  as $alumno)
    <p>
        {{ Form::label('alumno', $alumno->persona->PNombre . ' ' . $alumno->persona->ApPat . ' ' . $alumno->persona->rut  ) }}
       {{ Form::checkbox('alumnosCheck['. $index++ .']', $alumno, $persona->apoderado->alumnos->contains($alumno->id) ) }}

       
    </p>
@endforeach



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('apoderados.index') !!}" class="btn btn-default">Cancel</a>
</div>

