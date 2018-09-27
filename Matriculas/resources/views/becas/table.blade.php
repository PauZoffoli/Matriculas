<table class="table table-responsive" id="becas-table">
    <thead>
        <tr>
            <th>Descripcion</th>
        <th>Porcentaje</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($becas as $beca)
        <tr>
            <td>{!! $beca->descripcion !!}</td>
            <td>{!! $beca->porcentaje !!}</td>
            <td>
                {!! Form::open(['route' => ['becas.destroy', $beca->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('becas.show', [$beca->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('becas.edit', [$beca->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>