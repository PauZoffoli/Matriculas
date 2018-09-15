@extends('layouts.app')
@section('content')
<div class="container">
	
  
  <br>
     <section class="jumbotron text-center">
        <div class="container">
          <h2 class="jumbotron-heading">Error</h2>
          <h2 class="lead text-muted">La sesión ha expirado :c</h2>
<h2 class="lead text-muted">Presione el botón para volver a empezar</h2>

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