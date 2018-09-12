<table class="table table-responsive" id="repitencias-table">
    <thead>
        <tr>
            <th>Idalumno</th>
        <th>Idcurso</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($repitencias as $repitencias)
        <tr>
            <td>{!! $repitencias->idAlumno !!}</td>
            <td>{!! $repitencias->idCurso !!}</td>
            <td>
                {!! Form::open(['route' => ['repitencias.destroy', $repitencias->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('repitencias.show', [$repitencias->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('repitencias.edit', [$repitencias->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>