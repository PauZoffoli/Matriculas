<table class="table table-responsive" id="alumnoResponsables-table">
    <thead>
        <tr>
            <th>Parentesco</th>
        <th>Idalumno</th>
        <th>Idpersona</th>
        <th>Descripcion</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($alumnoResponsables as $alumnoResponsable)
        <tr>
            <td>{!! $alumnoResponsable->parentesco !!}</td>
            <td>{!! $alumnoResponsable->idAlumno !!}</td>
            <td>{!! $alumnoResponsable->idPersona !!}</td>
            <td>{!! $alumnoResponsable->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['alumnoResponsables.destroy', $alumnoResponsable->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('alumnoResponsables.show', [$alumnoResponsable->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('alumnoResponsables.edit', [$alumnoResponsable->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>