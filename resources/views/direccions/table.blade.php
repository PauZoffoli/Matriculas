<table class="table table-responsive" id="direccions-table">
    <thead>
        <tr>
            <th>Idcomuna</th>
        <th>Calle</th>
        <th>Nrocalle</th>
        <th>Bloquetorre</th>
        <th>Dpto</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($direccions as $direccion)
        <tr>
            <td>{!! $direccion->idComuna !!}</td>
            <td>{!! $direccion->calle !!}</td>
            <td>{!! $direccion->nroCalle !!}</td>
            <td>{!! $direccion->bloqueTorre !!}</td>
            <td>{!! $direccion->dpto !!}</td>
            <td>
                {!! Form::open(['route' => ['direccions.destroy', $direccion->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('direccions.show', [$direccion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('direccions.edit', [$direccion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>