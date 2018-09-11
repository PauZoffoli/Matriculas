<table class="table table-responsive" id="personas-table">
    <thead>
        <tr>
            <th>Pnombre</th>
        <th>Snombre</th>
        <th>Tnombre</th>
        <th>Appat</th>
        <th>Apmat</th>
        <th>Fonofijo</th>
        <th>Fonocelu</th>
        <th>Users Id</th>
        <th>Rut</th>
        <th>Dv</th>
        <th>Tipopersona</th>
        <th>Mail</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($personas as $persona)
        <tr>
            <td>{!! $persona->PNombre !!}</td>
            <td>{!! $persona->SNombre !!}</td>
            <td>{!! $persona->TNombre !!}</td>
            <td>{!! $persona->ApPat !!}</td>
            <td>{!! $persona->ApMat !!}</td>
            <td>{!! $persona->fonoFijo !!}</td>
            <td>{!! $persona->fonoCelu !!}</td>
            <td>{!! $persona->users_id !!}</td>
            <td>{!! $persona->rut !!}</td>
            <td>{!! $persona->dv !!}</td>
            <td>{!! $persona->tipoPersona !!}</td>
            <td>{!! $persona->mail !!}</td>
            <td>
                {!! Form::open(['route' => ['personas.destroy', $persona->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('personas.show', [$persona->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('personas.edit', [$persona->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>