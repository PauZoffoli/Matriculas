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
    {!! Form::select('fichaAlumno[0][nroConvivientes]', [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17, 18, 19, 20], ( isset($persona->alumno->fichaAlumno[0]) ? $persona->alumno->fichaAlumno[0]['nroConvivientes'] : null ) ,  array('id'=> 'fichaAlumno[0][nroConvivientes]', 'class' => 'form-control', 'placeholder' => 'Seleccione el número de habitantes de la vivienda del alumno')) !!}

</div>

<!-- Totalhijos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('totalHijos', 'Total de hermanos que viven con el alumno (pueden ser hermanos no sanguíneos, siempre que vivan con el alumno)') !!}
    {!! Form::select('fichaAlumno[0][totalHijos]', [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17, 18, 19, 20], ( isset($persona->alumno->fichaAlumno[0]) ? $persona->alumno->fichaAlumno[0]['totalHijos'] : null ) ,  array('id'=> 'fichaAlumno[0][totalHijos]', 'class' => 'form-control', 'placeholder' => 'Seleccione el total de hermanos sanguíneos que tenga.')) !!}
</div>

<!-- Nrodehijo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nroDeHijo', 'Nrodehijo:') !!}
    {!! Form::select('fichaAlumno[0][nroDeHijo]', [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17, 18, 19, 20], ( isset($persona->alumno->fichaAlumno[0]) ? $persona->alumno->fichaAlumno[0]['nroDeHijo'] : null ) ,  array('id'=> 'fichaAlumno[0][nroDeHijo]', 'class' => 'form-control', 'placeholder' => 'Seleccione su lugar entre los hermanos, por ejemplo: Yo soy el segundo hermano, escojo el lugar 2.')) !!}
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
    {!! Form::select('fichaAlumno[0][isapreFonasa]', App\Enums\IsapreFonasaEnum::getPossibleENUM(), ( isset($persona->alumno->fichaAlumno[0]) ? $persona->alumno->fichaAlumno[0]['isapreFonasa'] : null ) ,  array('id'=> 'fichaAlumno[0][isapreFonasa]', 'class' => 'form-control', 'placeholder' => 'Seleccione Isapre o Fonasa')) !!}
    
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
    {!! Form::select('fichaAlumno[0][grupoSanguineo]', App\Enums\GrupoSanguineoEnum::getPossibleENUM(), ( isset($persona->alumno->fichaAlumno[0]) ? $persona->alumno->fichaAlumno[0]['grupoSanguineo'] : null ) ,  array('id'=> 'fichaAlumno[0][grupoSanguineo]', 'class' => 'form-control', 'placeholder' => 'Seleccione su Grupo Sanguineo')) !!}
</div>



<!-- viveConPadre Field -->
<div class="form-group col-sm-2">
    {!! Form::label('viveConPadre', 'viveConPadre:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('viveConPadre', false) !!}
        {!! Form::checkbox('fichaAlumno[0][viveConPadre]', '0', null) !!} 
    </label>
</div>

<!-- viveConMadre Field -->
<div class="form-group col-sm-2">
    {!! Form::label('viveConMadre', 'viveConMadre:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('viveConMadre', false) !!}
        {!! Form::checkbox('fichaAlumno[0][viveConMadre]', '0', null) !!} 
    </label>
</div>

<!-- viveConAbuelos Field -->
<div class="form-group col-sm-2">
    {!! Form::label('viveConAbuelos', 'viveConAbuelos:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('viveConAbuelos', false) !!}
        {!! Form::checkbox('fichaAlumno[0][viveConAbuelos]', '0', null) !!} 
    </label>
</div>


<!-- viveConTios Field -->
<div class="form-group col-sm-2">
    {!! Form::label('viveConTios', 'viveConTios:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('viveConTios', false) !!}
        {!! Form::checkbox('fichaAlumno[0][viveConTios]', '0', null) !!} 
    </label>
</div>


<!-- viveConTutor Field -->
<div class="form-group col-sm-2">
    {!! Form::label('viveConTutor', 'viveConTutor:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('viveConTutor', false) !!}
        {!! Form::checkbox('fichaAlumno[0][viveConTutor]', '0', null) !!} 
    </label>
</div>

<!-- observacionesSalud Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observacionesSalud', 'observacionesSalud:') !!}
    {!! Form::text('fichaAlumno[0][observacionesSalud]', null, ['class' => 'form-control']) !!}
</div>

