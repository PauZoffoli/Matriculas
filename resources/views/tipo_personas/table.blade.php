<table class="table table-responsive" id="tipoPersonas-table">
    <thead>
        <tr>
            <th>Idtipo</th>
        <th>Idpersona</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipoPersonas as $tipoPersona)
        <tr>
            <td>{!! $tipoPersona->idTipo !!}</td>
            <td>{!! $tipoPersona->idPersona !!}</td>
            <td>
                {!! Form::open(['route' => ['tipoPersonas.destroy', $tipoPersona->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tipoPersonas.show', [$tipoPersona->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tipoPersonas.edit', [$tipoPersona->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>