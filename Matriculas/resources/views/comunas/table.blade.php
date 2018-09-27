<table class="table table-responsive" id="comunas-table">
    <thead>
        <tr>
            <th>Codigounico</th>
        <th>Idprovincia</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($comunas as $comuna)
        <tr>
            <td>{!! $comuna->codigoUnico !!}</td>
            <td>{!! $comuna->idProvincia !!}</td>
            <td>
                {!! Form::open(['route' => ['comunas.destroy', $comuna->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('comunas.show', [$comuna->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('comunas.edit', [$comuna->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>