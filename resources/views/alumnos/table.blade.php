<table class="table table-responsive" id="alumnos-table">
    <thead>
        <tr>
            <th>Parentesco</th>
        <th>Otroparentesco</th>
        <th>Repitencias</th>
        <th>Condicion</th>
        <th>Estado</th>
        <th>Estadocivilpadres</th>
        <th>Idpersona</th>
        <th>Idapoderado</th>
        <th>Idcursoactual</th>
        <th>Idcursopostu</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($alumnos as $alumno)
        <tr>
            <td>{!! $alumno->parentesco !!}</td>
            <td>{!! $alumno->otroParentesco !!}</td>
            <td>{!! $alumno->repitencias !!}</td>
            <td>{!! $alumno->condicion !!}</td>
            <td>{!! $alumno->estado !!}</td>
            <td>{!! $alumno->estadoCivilPadres !!}</td>
            <td>{!! $alumno->idPersona !!}</td>
            <td>{!! $alumno->idApoderado !!}</td>
            <td>{!! $alumno->idCursoActual !!}</td>
            <td>{!! $alumno->idCursoPostu !!}</td>
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