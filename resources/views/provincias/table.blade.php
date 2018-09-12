<table class="table table-responsive" id="provincias-table">
    <thead>
        <tr>
            <th>Nombreprov</th>
        <th>Codigounico</th>
        <th>Idregion</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($provincias as $provincia)
        <tr>
            <td>{!! $provincia->nombreProv !!}</td>
            <td>{!! $provincia->codigoUnico !!}</td>
            <td>{!! $provincia->idRegion !!}</td>
            <td>
                {!! Form::open(['route' => ['provincias.destroy', $provincia->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('provincias.show', [$provincia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('provincias.edit', [$provincia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>