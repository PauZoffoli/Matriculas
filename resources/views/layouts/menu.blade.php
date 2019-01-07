@if( auth()->user()->hasRole('ApoderadoPostulante') === true)
 @if (Auth::user()->personas->first()!=null)
  
<li class="{{ Request::is('apoderadosPostulantes*') ? 'active' : '' }}">
    <a href="{!! route('apoderadosPostulantes.edit', Auth::user()->personas->first()->id) !!}"><i class="fa fa-edit"></i><span>Apoderados Postulantes</span></a>
</li>
@endif
@endif

@if( auth()->user()->hasRole('Secretariado') === true || auth()->user()->hasRole('Administrador') === true)
    <li class="{{ Request::is('Secretariado*') ? 'active' : '' }}">
    <a href="{!! route('apoSecretariadoContr.index') !!}"><i class="fa fa-edit"></i><span>Menú Matrículas</span></a>
</li>
<li class="treeview">
        <a href="#"><i class="fas fa-user-friends"></i> <span>Apoderados</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="{!! route('buscarApoderado') !!}">Buscar Apoderado</a></li>
          <li><a href="{!! route('crearApoderado') !!}">Agregar Apoderado</a></li>
          <li><a href="{!! route('cambioApoderado') !!}">Cambiar Apoderado de Alumno</a></li>
        </ul>
      </li>
<li class="treeview">
        <a href="#"><i class="fas fa-user-friends"></i> <span>Alumnos</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="{!! route('buscarAlumno') !!}">Buscar Alumno</a></li>
          <li><a href="{!! route('crearAlumno') !!}">Agregar Alumno</a></li>
        </ul>
      </li>
@endif
