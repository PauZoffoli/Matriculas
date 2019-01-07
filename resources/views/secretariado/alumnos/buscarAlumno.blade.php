    @extends('layouts.app')

@section('ajax')
  <script src="{{ asset('js/Search/buscarAlumno.js') }}"></script>
@endsection
@section('content')

    @section('content')

    

        <section class="content-header">
            <h1>
                Buscar Alumno
            </h1>
        </section>
        <div class="content">
           @include('adminlte-templates::common.errors')
           <div class="box box-primary">
               <div class="box-body">
                   <div class="row">
                      
                            
                                 <div class="form-group col-sm-12"> 
                                      
                                 {!! Form::label('NombreAlumno', 'Primer Nombre Alumno:') !!}
                                 {!! Form::text('PNombre', null, ['id' => 'nombreABuscar', 'class' => 'form-control', 'placeholder' => 'Primer Nombre','maxlength'=>"20", 'required' => '']) !!}
                                   {!! Form::label('ApellidoAlumno', 'Apellido Paterno Alumno:') !!}
                                 {!! Form::text('ApPat', null, ['id' => 'apellidoABuscar', 'class' => 'form-control', 'placeholder' => 'Apellido Paterno','maxlength'=>"20", 'required' => '']) !!}
                     
{!! Form::label('','' ,array('id' => 'error', 'style' => 'color:red;')) !!}                  
<div class="pull-right">
                                    {!! Form::submit('Buscar', ['onClick'=> 'buscarAlumno()', 'class' => 'btn btn-primary']) !!}
                                   
                                </div>  


                                 </div> 
                                 <!-- idPersona Field -->
<table class="table table-responsive" id="postulacions-table">
    <thead>
        <tr>
        <th>Primer Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Rut</th>
        <th>Fecha Nacimiento</th>
    </thead>
    <tbody id="alumnoContainer">
        
    </tbody>

</table>
                                 
                    </div>
               </div>
           
    <div class="clearfix"></div>
            @include('flash::message')
        </div>
        </div>
  </div>
  <script type="text/javascript">
    document.getElementById("nombreABuscar").addEventListener("change", buscarAlumno);
  </script>
  <script src="/js/validarRUT.js"></script>
    @endsection