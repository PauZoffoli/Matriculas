@extends('layouts.app')

@section('content')
<div class="container">
	
  
  <br>
     <section class="jumbotron text-center">
        <div class="container">
          <h2 class="jumbotron-heading">Sistema de Matrículas Colegio IDOP</h2>
          <h2 class="lead text-muted">¡Atento! Para usar la aplicación debe colocar el usuario y contraseña, enviados a tráves del correo electrónico que usted otorgó en el proceso de postulaciones. En caso de que no lo tenga o lo haya perdido, llame a las oficinas de IDOP para un cambio.</h2>
<h2 class="lead text-muted">El proceso de matrículas solo podrá ser realizado una vez, y solo con el apoderado que inscribió en el sistema de postulaciones el 1ro de Septiembre. </h2>
<h2 class="lead text-muted">Si desea cambiar el apoderado, por favor, prosiga con la aplicación, y rellene todos los datos igualmente. Al momento de acercarse a nuestras oficinas, para firmar la matrícula, debe avisar el cambio los/as secretarios/as.</h2>
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

