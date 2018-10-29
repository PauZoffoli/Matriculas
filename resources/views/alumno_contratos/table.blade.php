<table class="table table-responsive" id="alumnoContratos-table">
    <thead>
        <tr>
            <th>Idcontrato</th>
        <th>Idalumno</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($alumnoContratos as $alumnoContrato)
        <tr>
            <td>{!! $alumnoContrato->idContrato !!}</td>
            <td>{!! $alumnoContrato->idAlumno !!}</td>
            <td>
                {!! Form::open(['route' => ['alumnoContratos.destroy', $alumnoContrato->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('alumnoContratos.show', [$alumnoContrato->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('alumnoContratos.edit', [$alumnoContrato->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>