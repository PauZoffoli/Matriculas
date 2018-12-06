@extends('layouts.app')

@section('content')
@include('flash::message')
<div class="container">


  <br>
     <section class="jumbotron text-center">
        <div class="container">
          <h2 class="jumbotron-heading">Sistema de Matrículas Colegio IDOP</h2>
          <h2 class="lead text-muted">¡Atento! Para usar la aplicación debe ingresar el usuario y contraseña, enviados a tráves del correo electrónico que usted otorgó al colegio. En caso de que no lo tenga o lo haya perdido, favor comunicarse a este número temporal generado para este proceso: +56952970045.</h2>
<h2 class="lead text-muted">El proceso de actualización de datos solo podrá ser realizado una vez. Quien podrá hacer esta actualización es el apoderado actual del alumno.</h2>
<h2 class="lead text-muted">Si desea cambiar el apoderado, por favor, contactarse con el número anteriormente descrito.</h2>
          <p>
            <a href="{!! url('login') !!}" class="btn btn-primary my-2">Iniciar Proceso de Matrículas</a>
          
          </p>
           @if(session()->has('errors'))
    <div class="alert alert-danger">
        {{ session()->get('errors') }}
    </div>
@endif
        </div>
      </section>

</div>
<br><br>
 <div class="img-responsive center-block">
                <img src="{{ asset('images/LogoGrandeIdop.jpg')}}"  class="img-responsive center-block" 
                     alt="User Image"/>

     </div>
@endsection 

