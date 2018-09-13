


<table class="table table-responsive" id="postulacions-table">
    <thead>
        <tr>
        <th>Primer Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Rut</th>
        <th>Tipo Persona</th>
            <th colspan="3">Acción</th>
        </tr>
    </thead>
    <tbody >
    @foreach($apoderados as $apoderado)
        <tr>
            <td>{!! $apoderado->pnombre  !!}</td>
            <td>{!! $apoderado->ApPat!!}</td>
            <td>{!! $apoderado->ApMat  !!}</td>
            <td>{!! $apoderado->rut !!}</td>
            <td>{!! $apoderado->tipoPersona  !!}</td>
            <td>
                {!! Form::open() !!}
                <div class='btn-group'>
                    <a href="{!! route('revisorPost.edit', [$postulacion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i>Generar Contrato</a>
                   
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
@if (!is_a($postulacions, 'Illuminate\Database\Eloquent\Collection'))
    <div class="pull-right">{!! $postulacions->render() !!}</div>
@endif

