<!--FICHA ALUMNO-->
<!--FICHA ALUMNO-->
<!--FICHA ALUMNO-->
<!--FICHA ALUMNO-->
<!--FICHA ALUMNO-->

<!-- Ingresofamiliarm Field -->
<div class="form-group col-sm-6" style="display: none">
   
    {!! Form::number('fichaAlumno[0][id]', null, ['class' => 'form-control']) !!}
</div>

<!-- Ingresofamiliarm Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ingresoFamiliarM', 'Ingresofamiliarm:') !!}
    {!! Form::number('fichaAlumno[0][ingresoFamiliarM]', null, ['class' => 'form-control']) !!}
</div>

<!-- Causas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('causas', 'Causas:') !!}
    {!! Form::number('fichaAlumno[0][causas]', null, ['class' => 'form-control']) !!}
</div>

<!-- Nroconvivientes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nroConvivientes', 'Nroconvivientes:') !!}
    {!! Form::number('fichaAlumno[0][nroConvivientes]', null, ['class' => 'form-control']) !!}
</div>

<!-- Totalhijos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('totalHijos', 'Totalhijos:') !!}
    {!! Form::number('fichaAlumno[0][totalHijos]', null, ['class' => 'form-control']) !!}
</div>

<!-- Nrodehijo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nroDeHijo', 'Nrodehijo:') !!}
    {!! Form::number('fichaAlumno[0][nroDeHijo]', null, ['class' => 'form-control']) !!}
</div>

<!-- Nrohermaidop Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nroHermaIDOP', 'Nrohermaidop:') !!}
    {!! Form::number('fichaAlumno[0][nroHermaIDOP]', null, ['class' => 'form-control']) !!}
</div>

<!-- Tenenciavivienda Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tenenciaVivienda', 'Tenenciavivienda:') !!}
    {!! Form::text('fichaAlumno[0][tenenciaVivienda]', null, ['class' => 'form-control']) !!}
</div>

<!-- Estudiacon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estudiaCon', 'Estudiacon:') !!}
    {!! Form::text('fichaAlumno[0][estudiaCon]', null, ['class' => 'form-control']) !!}
</div>

<!-- Isaprefonasa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('isapreFonasa', 'Isaprefonasa:') !!}
    {!! Form::text('fichaAlumno[0][isapreFonasa]', null, ['class' => 'form-control']) !!}
</div>

<!-- Segurocomple Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seguroComple', 'Segurocomple:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('seguroComple', false) !!}
        {!! Form::checkbox('fichaAlumno[0][seguroComple]', '1', null) !!} 1
    </label>
</div>

<!-- Enfermedades Field -->
<div class="form-group col-sm-6">
    {!! Form::label('enfermedades', 'Enfermedades:') !!}
    {!! Form::text('fichaAlumno[0][enfermedades]', null, ['class' => 'form-control']) !!}
</div>

<!-- Medicamentos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('medicamentos', 'Medicamentos:') !!}
    {!! Form::text('fichaAlumno[0][medicamentos]', null, ['class' => 'form-control']) !!}
</div>

<!-- Esalergico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('esAlergico', 'Esalergico:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('esAlergico', false) !!}
        {!! Form::checkbox('fichaAlumno[0][esAlergico]', '1', null) !!} 1
    </label>
</div>

<!-- Alergicoa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('AlergicoA', 'Alergicoa:') !!}
    {!! Form::text('fichaAlumno[0][AlergicoA]', null, ['class' => 'form-control']) !!}
</div>

<!-- Gruposanguineo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grupoSanguineo', 'Gruposanguineo:') !!}
    {!! Form::text('fichaAlumno[0][grupoSanguineo]', null, ['class' => 'form-control']) !!}
</div>

<!-- Idalumno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idAlumno', 'Idalumno:') !!}
    {!! Form::number('fichaAlumno[0][idAlumno]', null, ['class' => 'form-control']) !!}
</div>

<!-- Idalumno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idAlumno', 'Idalumno:') !!}
    {!! Form::number('fichaAlumno[0][idAlumno]', null, ['class' => 'form-control']) !!}
</div>



