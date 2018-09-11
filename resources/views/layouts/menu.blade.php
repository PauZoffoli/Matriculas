<li class="{{ Request::is('alumnos*') ? 'active' : '' }}">
    <a href="{!! route('alumnos.index') !!}"><i class="fa fa-edit"></i><span>Alumnos</span></a>
</li>

<li class="{{ Request::is('alumnoResponsables*') ? 'active' : '' }}">
    <a href="{!! route('alumnoResponsables.index') !!}"><i class="fa fa-edit"></i><span>Alumno Responsables</span></a>
</li>

<li class="{{ Request::is('apoderados*') ? 'active' : '' }}">
    <a href="{!! route('apoderados.index') !!}"><i class="fa fa-edit"></i><span>Apoderados</span></a>
</li>

<li class="{{ Request::is('personas*') ? 'active' : '' }}">
    <a href="{!! route('personas.index') !!}"><i class="fa fa-edit"></i><span>Personas</span></a>
</li>

