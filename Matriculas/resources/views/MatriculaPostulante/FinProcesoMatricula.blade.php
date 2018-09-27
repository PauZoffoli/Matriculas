@extends('layouts.app')

@section('content')
<div class="container">
	
  
  <br>
     <section class="jumbotron text-center">
        <div class="container">
          <h2 class="jumbotron-heading">Sistema de Matrículas Colegio IDOP</h2>
          <h2 class="lead text-muted">Usted ha realizado correctamente el proceso de matrícula de su alumno.
          </h2>
          <p>
            <a href="{!! url('/') !!}" class="btn btn-primary my-2">Volver al Inicio</a>
          
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

