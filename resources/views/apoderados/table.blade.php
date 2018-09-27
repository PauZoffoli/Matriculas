<table class="table table-responsive" id="apoderados-table">
    <thead>
        <tr>
            <th>Niveleducacional</th>
        <th>Profesion</th>
        <th>Paisdeorigen</th>
        <th>Idpersona</th>
        <th>Estado</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($apoderados as $apoderado)
        <tr>
            <td>{!! $apoderado->nivelEducacional !!}</td>
            <td>{!! $apoderado->profesion !!}</td>
            <td>{!! $apoderado->paisDeOrigen !!}</td>
            <td>{!! $apoderado->idPersona !!}</td>
            <td>{!! $apoderado->estado !!}</td>
            <td>
                {!! Form::open(['route' => ['apoderados.destroy', $apoderado->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('apoderados.show', [$apoderado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('apoderados.edit', [$apoderado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>