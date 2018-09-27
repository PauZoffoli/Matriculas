<!--FICHA ALUMNO-->
<!--FICHA ALUMNO-->
<!--FICHA ALUMNO-->
<!--FICHA ALUMNO-->
<!--FICHA ALUMNO-->

<!-- ID -->
<div class="form-group col-sm-3" style="display: none">
   
    {!! Form::number('fichaAlumno[0][id]', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-3" style="display: none">
   
    {!! Form::number('fichaAlumno[0][idAlumno]', $persona->alumno->id, ['class' => 'form-control']) !!}
</div>

<!-- Ingresofamiliarm Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ingresoFamiliarM', 'Ingreso familiar total mensual:') !!}
    {!! Form::number('fichaAlumno[0][ingresoFamiliarM]', null, ['class' => 'form-control', 'required' => 'true', 'min' => "0", 'max' => "99999999999"]) !!}
</div>


<!-- Nroconvivientes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nroConvivientes', 'Número de Habitantes del Hogar:') !!}
    {!! Form::select('fichaAlumno[0][nroConvivientes]', [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17, 18, 19, 20], ( isset($persona->alumno->fichaAlumno[0]) ? $persona->alumno->fichaAlumno[0]['nroConvivientes'] : null ) ,  array('id'=> 'fichaAlumno[0][nroConvivientes]', 'class' => 'form-control', 'placeholder' => 'Seleccione el número de habitantes de la vivienda del alumno', 'required' => 'true')) !!}

</div>

<!-- Nrodehijo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nroDeHijo', 'Lugar del alumno entre sus hermanos (Si no tiene hermanos marque 0):') !!}
    {!! Form::select('fichaAlumno[0][nroDeHijo]', [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17, 18, 19, 20], ( isset($persona->alumno->fichaAlumno[0]) ? $persona->alumno->fichaAlumno[0]['nroDeHijo'] : null ) ,  array('id'=> 'fichaAlumno[0][nroDeHijo]', 'class' => 'form-control', 'placeholder' => 'Seleccione el lugar entre los hermanos, por ejemplo: Yo soy el segundo hermano, escojo el lugar 2.', 'required' => 'true')) !!}
</div>

<!-- Nrohermaidop Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nroHermaIDOP', 'Cantidad de Hermanos estudiando en IDOP:') !!}
    {!! Form::select('fichaAlumno[0][nroHermaIDOP]', [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17, 18, 19, 20], ( isset($persona->alumno->fichaAlumno[0]) ? $persona->alumno->fichaAlumno[0]['nroDeHijo'] : null ), ['class' => 'form-control','id'=> 'fichaAlumno[0][nroHermaIDOP]', 'placeholder' => 'Cantidad de actualmente en IDOP', 'required' => 'true']) !!}
</div>

<!-- Tenenciavivienda Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tenenciaVivienda', 'Seleccione tipo de vivienda:') !!}
    {!! Form::select('fichaAlumno[0][tenenciaVivienda]', App\Enums\TenenciaViviendaEnum::getPossibleENUM(), ( isset($persona->alumno->fichaAlumno[0]) ? $persona->alumno->fichaAlumno[0]['tenenciaVivienda'] : null ) ,  array('id'=> 'fichaAlumno[0][tenenciaVivienda]', 'class' => 'form-control', 'placeholder' => 'Seleccione tipo de vivienda', 'required' => 'true')) !!}
</div>

<!-- Estudiacon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estudiaCon', 'Con quién estudia normalmente el alumno:') !!}

        {!! Form::select('fichaAlumno[0][estudiaCon]', App\Enums\EstudiaConEnum::getPossibleENUM(), ( isset($persona->alumno->fichaAlumno[0]) ? $persona->alumno->fichaAlumno[0]['estudiaCon'] : null ) ,  array('id'=> 'fichaAlumno[0][estudiaCon]', 'class' => 'form-control', 'placeholder' => 'Seleccione con quién más estudia el alumno', 'required' => 'true')) !!}
</div>





<div class="form-group col-sm-6">


    <br>
    <br>
    <center>
        <table>
            <tr>
                <td style="width:10%;">
                    <center>
                        {!! Form::hidden('fichaAlumno[0][viveConPadre]', '0') !!} {!! Form::checkbox('fichaAlumno[0][viveConPadre]', true, null, array('style' => "width: 30px; height: 30px;")) !!}

                    </center>
                </td>

                <td style="height: 50%; ">{!! Form::label('viveConPadre', '¿El alumno vive con su padre?') !!}</td>
            </tr>
        </table>

    </center>

    <center>

        <table>
            <tr>
                <td style="width:10%;">
                    <center>
                        {!! Form::hidden('fichaAlumno[0][viveConMadre]', '0') !!} {!! Form::checkbox('fichaAlumno[0][viveConMadre]', true, null, array('style' => "width: 30px; height: 30px;")) !!}

                    </center>
                </td>

                <td style="height: 50%; ">{!! Form::label('viveConMadre', '¿El alumno vive con su madre?') !!}</td>
            </tr>
        </table>

    </center>

    <center>

        <table>
            <tr>
                <td style="width:10%;">
                    <center>
                        {!! Form::hidden('fichaAlumno[0][viveConTutor]', '0') !!} 
                        {!! Form::checkbox('fichaAlumno[0][viveConTutor]', true,null, array('style' => "width: 30px; height: 30px;") ) !!}
                    </center>
                </td>

                <td style="height: 50%; "> {!! Form::label('viveConTutor', '¿El alumno vive con su Tutor Legal?') !!}</td>
            </tr>
        </table>

    </center>

    <center>

        <table>
            <tr>
                <td style="width:10%;">
                    <center>
                        {!! Form::hidden('fichaAlumno[0][viveConTios]', '0') !!} {!! Form::checkbox('fichaAlumno[0][viveConTios]', true, null, array('style' => "width: 30px; height: 30px;")) !!}

                    </center>
                </td>

                <td style="height: 50%; ">{!! Form::label('viveConTios', '¿El alumno vive con sus tíos?') !!}</td>
            </tr>
        </table>

    </center>

    <center>

        <table>
            <tr>
                <td style="width:10%;">
                    <center>
                        {!! Form::hidden('fichaAlumno[0][viveConAbuelos]', '0') !!} {!! Form::checkbox('fichaAlumno[0][viveConAbuelos]', true, null, array('style' => "width: 30px; height: 30px;")) !!}

                    </center>
                </td>

                <td style="height: 50%; ">{!! Form::label('viveConAbuelos', '¿El alumno vive con sus abuelos?') !!}</td>
            </tr>
        </table>

    </center>
<br>
    <br>
    
</div>




<!-- Causas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('causas', 'Si no vive con ninguno de sus padres sanguíneos indique la razón:') !!}
    {!! Form::text('fichaAlumno[0][causas]', null, ['class' => 'form-control', 'style' => 'text-transform:uppercase ;', 'placeholder'=> 'Si no vive con ninguno de sus padres sanguíneos indique la razón:', 'maxlength' => "100"]) !!}
</div>

<!-- Totalhijos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('totalHijos', 'Total de hermanos que viven con el alumno (pueden ser hermanos no sanguíneos, siempre que vivan con el alumno)') !!}
    {!! Form::select('fichaAlumno[0][totalHijos]', [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17, 18, 19, 20], ( isset($persona->alumno->fichaAlumno[0]) ? $persona->alumno->fichaAlumno[0]['totalHijos'] : null ) ,  array('id'=> 'fichaAlumno[0][totalHijos]', 'class' => 'form-control', 'required' => 'true' , 'placeholder' => 'Seleccione el total de hermanos sanguíneos que tenga.', 'required' => 'true')) !!}
</div>



&nbsp; <br> 
<div class="box-body form-group col-sm-12">
<!-- Idcomuna Field -->

<section class="content-header" style="color: gray;">
        <h1>
           Información Médica del Alumno {{ $persona->PNombre . ' ' . $persona->ApPat }}
        </h1> <br>
</section>

<!-- Isaprefonasa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('isapreFonasa', 'Isapre o Fonasa:') !!}
    {!! Form::select('fichaAlumno[0][isapreFonasa]', App\Enums\IsapreFonasaEnum::getPossibleENUM(), ( isset($persona->alumno->fichaAlumno[0]) ? $persona->alumno->fichaAlumno[0]['isapreFonasa'] : null ) ,  array('id'=> 'fichaAlumno[0][isapreFonasa]', 'class' => 'form-control', 'placeholder' => 'Seleccione Isapre o Fonasa', 'required' => 'true')) !!}
    
</div>


<!-- Enfermedades Field -->
<div class="form-group col-sm-6">
    {!! Form::label('enfermedades', 'Enfermedades:') !!}
    {!! Form::text('fichaAlumno[0][enfermedades]', null, ['class' => 'form-control', 'style' => 'text-transform:uppercase ;', 'maxlength' => "191" ]) !!}
</div>

<!-- Medicamentos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('medicamentos', '¿Qué medicamentos consume de manera permanente?:') !!}
    {!! Form::text('fichaAlumno[0][medicamentos]', null, ['class' => 'form-control', 'style' => 'text-transform:uppercase ;', 'maxlength' => "191" ]) !!}
</div>



<!-- Alergicoa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('AlergicoA', '¿A qué es alergico el alumno?:') !!}

{!! Form::hidden('fichaAlumno[0][AlergicoA]', '0') !!}
    {!! Form::text('fichaAlumno[0][AlergicoA]', null, ['class' => 'form-control', 'style' => 'text-transform:uppercase ;', 'maxlength' => "191" ]) !!}
</div>

<!-- Gruposanguineo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grupoSanguineo', 'Grupo Sanguíneo:') !!}
    {!! Form::select('fichaAlumno[0][grupoSanguineo]', App\Enums\GrupoSanguineoEnum::getPossibleENUM(), ( isset($persona->alumno->fichaAlumno[0]) ? $persona->alumno->fichaAlumno[0]['grupoSanguineo'] : null ) ,  array('id'=> 'fichaAlumno[0][grupoSanguineo]', 'class' => 'form-control', 'placeholder' => 'Seleccione Grupo Sanguineo', 'required' => 'true')) !!}
</div>


<!-- observacionesSalud Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observacionesSalud', 'Observaciones a la salud:') !!}
    {!! Form::text('fichaAlumno[0][observacionesSalud]', null, ['class' => 'form-control', 'style' => 'text-transform:uppercase ;', 'maxlength' => "191" ]) !!}
</div>

<center>
<div class="form-group col-sm-12">

    <br>
    <br>
    <center>

        <table>
            <tr>
                <td style="width:10%;">
                    <center>
                        {!! Form::hidden('fichaAlumno[0][seguroComple]', '0') !!} {!! Form::checkbox('fichaAlumno[0][seguroComple]', true,null, array('style' => "width: 30px; height: 30px;") ) !!}
                    </center>
                </td>

                <td style="height: 50%; "> {!! Form::label('seguroComple', '¿El alumno tiene Seguro Complementario?') !!}</td>
            </tr>
        </table>

    </center>

    <center>

        <table>
            <tr>
                <td style="width:10%;">
                    <center>
                        {!! Form::hidden('fichaAlumno[0][esAlergico]', '0') !!} {!! Form::checkbox('fichaAlumno[0][esAlergico]', true, null, array('style' => "width: 30px; height: 30px;")) !!}

                    </center>
                </td>

                <td style="height: 50%; ">{!! Form::label('esAlergico', '¿El alumno sufre de alguna alergia?') !!}</td>
            </tr>
        </table>

    </center>


</div>


    </center>

</div>