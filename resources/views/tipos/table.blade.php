<table class="table table-responsive" id="tipos-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Descripcion</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipos as $tipo)
        <tr>
            <td>{!! $tipo->nombre !!}</td>
            <td>{!! $tipo->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['tipos.destroy', $tipo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tipos.show', [$tipo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tipos.edit', [$tipo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>