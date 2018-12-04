@if( auth()->user()->hasRole('ApoderadoPostulante') === true)
 @if (Auth::user()->personas->first()!=null)
  
<li class="{{ Request::is('apoderadosPostulantes*') ? 'active' : '' }}">
    <a href="{!! route('apoderadosPostulantes.edit', Auth::user()->personas->first()->id) !!}"><i class="fa fa-edit"></i><span>Apoderados Postulantes</span></a>
</li>
@endif
@endif

@if( auth()->user()->hasRole('Secretariado') === true || auth()->user()->hasRole('Administrador') === true )
    <li class="{{ Request::is('Secretariado*') ? 'active' : '' }}">
    <a href="{!! route('apoSecretariadoContr.index') !!}"><i class="fa fa-edit"></i><span>Alumnos</span></a>
</li>
@endif

@if( auth()->user()->hasRole('Administrador') === true)



<li class="{{ Request::is('alumnoContratos*') ? 'active' : '' }}">
    <a href="{!! route('alumnoContratos.index') !!}"><i class="fa fa-edit"></i><span>Alumno Contratos</span></a>
</li>

@endif