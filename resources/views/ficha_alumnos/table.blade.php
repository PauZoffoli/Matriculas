<table class="table table-responsive" id="fichaAlumnos-table">
    <thead>
        <tr>
            <th>Ingresofamiliarm</th>
        <th>Causas</th>
        <th>Nroconvivientes</th>
        <th>Totalhijos</th>
        <th>Nrodehijo</th>
        <th>Nrohermaidop</th>
        <th>Tenenciavivienda</th>
        <th>Estudiacon</th>
        <th>Isaprefonasa</th>
        <th>Segurocomple</th>
        <th>Enfermedades</th>
        <th>Medicamentos</th>
        <th>Esalergico</th>
        <th>Alergicoa</th>
        <th>Gruposanguineo</th>
        <th>Idalumno</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($fichaAlumnos as $fichaAlumno)
        <tr>
            <td>{!! $fichaAlumno->ingresoFamiliarM !!}</td>
            <td>{!! $fichaAlumno->causas !!}</td>
            <td>{!! $fichaAlumno->nroConvivientes !!}</td>
            <td>{!! $fichaAlumno->totalHijos !!}</td>
            <td>{!! $fichaAlumno->nroDeHijo !!}</td>
            <td>{!! $fichaAlumno->nroHermaIDOP !!}</td>
            <td>{!! $fichaAlumno->tenenciaVivienda !!}</td>
            <td>{!! $fichaAlumno->estudiaCon !!}</td>
            <td>{!! $fichaAlumno->isapreFonasa !!}</td>
            <td>{!! $fichaAlumno->seguroComple !!}</td>
            <td>{!! $fichaAlumno->enfermedades !!}</td>
            <td>{!! $fichaAlumno->medicamentos !!}</td>
            <td>{!! $fichaAlumno->esAlergico !!}</td>
            <td>{!! $fichaAlumno->AlergicoA !!}</td>
            <td>{!! $fichaAlumno->grupoSanguineo !!}</td>
            <td>{!! $fichaAlumno->idAlumno !!}</td>
            <td>
                {!! Form::open(['route' => ['fichaAlumnos.destroy', $fichaAlumno->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('fichaAlumnos.show', [$fichaAlumno->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('fichaAlumnos.edit', [$fichaAlumno->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>