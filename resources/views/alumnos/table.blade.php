<table class="table table-responsive" id="alumnos-table">
    <thead>
        <tr>
            <th>Idapoderado</th>
        <th>Fechanacimiento</th>
        <th>Parentesco</th>
        <th>Otroparentesco</th>
        <th>Genero</th>
        <th>Harepetido</th>
        <th>Correoal</th>
        <th>Cursoactual</th>
        <th>Cursopostular</th>
        <th>Iddireccion</th>
        <th>Nacionalidad</th>
        <th>Fechadefuncion</th>
        <th>Estado</th>
        <th>Estadocivilpadres</th>
        <th>Idpersona</th>
        <th>Pcursorepetido</th>
        <th>Scursorepetido</th>
        <th>Tcursorepetido</th>
        <th>Idficha</th>
        <th>Urlcontratofirmado</th>
        <th>Urlpagarefirmado</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($alumnos as $alumno)
        <tr>
            <td>{!! $alumno->idApoderado !!}</td>
            <td>{!! $alumno->fechaNacimiento !!}</td>
            <td>{!! $alumno->parentesco !!}</td>
            <td>{!! $alumno->otroParentesco !!}</td>
            <td>{!! $alumno->genero !!}</td>
            <td>{!! $alumno->haRepetido !!}</td>
            <td>{!! $alumno->correoAl !!}</td>
            <td>{!! $alumno->cursoActual !!}</td>
            <td>{!! $alumno->cursoPostular !!}</td>
            <td>{!! $alumno->idDireccion !!}</td>
            <td>{!! $alumno->nacionalidad !!}</td>
            <td>{!! $alumno->fechaDefuncion !!}</td>
            <td>{!! $alumno->estado !!}</td>
            <td>{!! $alumno->estadoCivilPadres !!}</td>
            <td>{!! $alumno->idPersona !!}</td>
            <td>{!! $alumno->PCursoRepetido !!}</td>
            <td>{!! $alumno->SCursoRepetido !!}</td>
            <td>{!! $alumno->TCursoRepetido !!}</td>
            <td>{!! $alumno->idFicha !!}</td>
            <td>{!! $alumno->urlContratoFirmado !!}</td>
            <td>{!! $alumno->urlPagareFirmado !!}</td>
            <td>
                {!! Form::open(['route' => ['alumnos.destroy', $alumno->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('alumnos.show', [$alumno->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('alumnos.edit', [$alumno->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>