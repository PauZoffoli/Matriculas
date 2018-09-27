@if( auth()->user()->hasRole('ApoderadoPostulante') === true)
 @if (Auth::user()->personas->first()!=null)
  
<li class="{{ Request::is('apoderadosPostulantes*') ? 'active' : '' }}">
    <a href="{!! route('apoderadosPostulantes.edit', Auth::user()->personas->first()->id) !!}"><i class="fa fa-edit"></i><span>Apoderados Postulantes</span></a>
</li>
@endif
@endif

@if( auth()->user()->hasRole('Administrador') === true)
<li class="{{ Request::is('apoderadosPostulantes*') ? 'active' : '' }}">
    <a href="{!! route('apoderadosPostulantes.edit', Auth::user()->personas->first()->id) !!}"><i class="fa fa-edit"></i><span>Apoderados Postulantes</span></a>
</li>

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

<li class="{{ Request::is('alumnos*') ? 'active' : '' }}">
    <a href="{!! route('alumnos.index') !!}"><i class="fa fa-edit"></i><span>Alumnos</span></a>
</li>

<li class="{{ Request::is('alumnoResponsables*') ? 'active' : '' }}">
    <a href="{!! route('alumnoResponsables.index') !!}"><i class="fa fa-edit"></i><span>Alumno Responsables</span></a>
</li>

<li class="{{ Request::is('apoderados*') ? 'active' : '' }}">
    <a href="{!! route('apoderados.index') !!}"><i class="fa fa-edit"></i><span>Apoderados</span></a>
</li>

<li class="{{ Request::is('comunas*') ? 'active' : '' }}">
    <a href="{!! route('comunas.index') !!}"><i class="fa fa-edit"></i><span>Comunas</span></a>
</li>

<li class="{{ Request::is('provincias*') ? 'active' : '' }}">
    <a href="{!! route('provincias.index') !!}"><i class="fa fa-edit"></i><span>Provincias</span></a>
</li>

<li class="{{ Request::is('regions*') ? 'active' : '' }}">
    <a href="{!! route('regions.index') !!}"><i class="fa fa-edit"></i><span>Regions</span></a>
</li>

<li class="{{ Request::is('direccions*') ? 'active' : '' }}">
    <a href="{!! route('direccions.index') !!}"><i class="fa fa-edit"></i><span>Direccions</span></a>
</li>

<li class="{{ Request::is('contratos*') ? 'active' : '' }}">
    <a href="{!! route('contratos.index') !!}"><i class="fa fa-edit"></i><span>Contratos</span></a>
</li>

<li class="{{ Request::is('fichaAlumnos*') ? 'active' : '' }}">
    <a href="{!! route('fichaAlumnos.index') !!}"><i class="fa fa-edit"></i><span>Ficha Alumnos</span></a>
</li>

<li class="{{ Request::is('personas*') ? 'active' : '' }}">
    <a href="{!! route('personas.index') !!}"><i class="fa fa-edit"></i><span>Personas</span></a>
</li>

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('userRols*') ? 'active' : '' }}">
    <a href="{!! route('userRols.index') !!}"><i class="fa fa-edit"></i><span>User Rols</span></a>
</li>

<li class="{{ Request::is('cursos*') ? 'active' : '' }}">
    <a href="{!! route('cursos.index') !!}"><i class="fa fa-edit"></i><span>Cursos</span></a>
</li>

<li class="{{ Request::is('becas*') ? 'active' : '' }}">
    <a href="{!! route('becas.index') !!}"><i class="fa fa-edit"></i><span>Becas</span></a>
</li>

<li class="{{ Request::is('becaAlumnos*') ? 'active' : '' }}">
    <a href="{!! route('becaAlumnos.index') !!}"><i class="fa fa-edit"></i><span>Beca Alumnos</span></a>
</li>

<li class="{{ Request::is('repitencias*') ? 'active' : '' }}">
    <a href="{!! route('repitencias.index') !!}"><i class="fa fa-edit"></i><span>Repitencias</span></a>
</li>

<li class="{{ Request::is('tipos*') ? 'active' : '' }}">
    <a href="{!! route('tipos.index') !!}"><i class="fa fa-edit"></i><span>Tipos</span></a>
</li>

<li class="{{ Request::is('tipoPersonas*') ? 'active' : '' }}">
    <a href="{!! route('tipoPersonas.index') !!}"><i class="fa fa-edit"></i><span>Tipo Personas</span></a>
</li>

@endif