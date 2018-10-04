


<table class="table table-responsive" id="postulacions-table">
    <thead>
        <tr>
        <th>Primer Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Rut</th>
        <th>Género</th>
         <th>tipos</th>
            <th colspan="3">Acción</th>
        </tr>

    </thead>
    <tbody >
    @foreach($personas as $persona)
        <tr>
            <td>{!! $persona->PNombre  !!}</td>
            <td>{!! $persona->ApPat !!}</td>
            <td>{!! $persona->ApMat  !!}</td>
            <td>{!! $persona->rut !!}</td>
            <td>{!! $persona->genero !!}</td>
            
            <td>
                @foreach ($persona->tipos as $element)
                    {{ $element->nombre }}
                @endforeach
            </td>
            <td>
                {!! Form::open() !!}
                <div class='btn-group'>
                    <a href="{!! route('apoSecretariadoContr.edit', [$persona->id] ) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i>Generar Contrato</a>

                     
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
@if (!is_a($personas, 'Illuminate\Database\Eloquent\Collection'))
    <div class="pull-right">{!! $personas->render() !!}</div>
@endif


