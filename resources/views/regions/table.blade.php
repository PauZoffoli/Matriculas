<table class="table table-responsive" id="regions-table">
    <thead>
        <tr>
            <th>Nombrereg</th>
        <th>Regionord</th>
        <th>Codigounico</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($regions as $region)
        <tr>
            <td>{!! $region->nombreReg !!}</td>
            <td>{!! $region->regionOrd !!}</td>
            <td>{!! $region->codigoUnico !!}</td>
            <td>
                {!! Form::open(['route' => ['regions.destroy', $region->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('regions.show', [$region->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('regions.edit', [$region->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>