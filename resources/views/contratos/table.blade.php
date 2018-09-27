<table class="table table-responsive" id="contratos-table">
    <thead>
        <tr>
            <th>Idapoderado</th>
        <th>Urlcontrato</th>
        <th>Urlpagare</th>
        <th>Urlcontratof</th>
        <th>Urlpagaref</th>
        <th>Nrocuotas</th>
        <th>Fechacontrato</th>
        <th>Anioacontratar</th>
        <th>Totalapagar</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($contratos as $contrato)
        <tr>
            <td>{!! $contrato->idApoderado !!}</td>
            <td>{!! $contrato->urlContrato !!}</td>
            <td>{!! $contrato->urlPagare !!}</td>
            <td>{!! $contrato->urlContratoF !!}</td>
            <td>{!! $contrato->urlPagareF !!}</td>
            <td>{!! $contrato->nroCuotas !!}</td>
            <td>{!! $contrato->fechaContrato !!}</td>
            <td>{!! $contrato->anioAContratar !!}</td>
            <td>{!! $contrato->totalAPagar !!}</td>
            <td>
                {!! Form::open(['route' => ['contratos.destroy', $contrato->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('contratos.show', [$contrato->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('contratos.edit', [$contrato->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>