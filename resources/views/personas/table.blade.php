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
        <th>Iduser</th>
        <th>Rut</th>
        <th>Tipopersona</th>
        <th>Genero</th>
        <th>Email</th>
        <th>Fechanacimiento</th>
        <th>Fechadefuncion</th>
        <th>Estadocivil</th>
        <th>Iddireccion</th>
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
            <td>{!! $persona->idUser !!}</td>
            <td>{!! $persona->rut !!}</td>
            <td>{!! $persona->tipoPersona !!}</td>
            <td>{!! $persona->genero !!}</td>
            <td>{!! $persona->email !!}</td>
            <td>{!! $persona->fechaNacimiento !!}</td>
            <td>{!! $persona->fechaDefuncion !!}</td>
            <td>{!! $persona->estadoCivil !!}</td>
            <td>{!! $persona->idDireccion !!}</td>
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