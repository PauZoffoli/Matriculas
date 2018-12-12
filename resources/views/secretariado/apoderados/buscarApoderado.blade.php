    @extends('layouts.app')

@section('ajax')
  <script src="{{ asset('js/Search/buscarPersona.js') }}"></script>
@endsection
@section('content')

    @section('content')

    

        <section class="content-header">
            <h1>
                Buscar Persona
            </h1>
        </section>
        <div class="content">
           @include('adminlte-templates::common.errors')
           <div class="box box-primary">
               <div class="box-body">
                   <div class="row">
                      
                            
                                 <div class="form-group col-sm-12"> 
                                      
                                 {!! Form::label('RutApoderado', 'Rut Apoderado:') !!}
                                 {!! Form::text('rut', null, ['id' => 'rutABuscar', 'class' => 'form-control', 'placeholder' => 'Buscar rut apoderado','oninput'=>"checkRut(this)",'maxlength'=>"11"]) !!}
                     
{!! Form::label('','' ,array('id' => 'error', 'style' => 'color:red;')) !!}                  
<div class="pull-right">
                                    {!! Form::submit('Buscar', ['onClick'=> 'buscarPersona()', 'class' => 'btn btn-primary']) !!}
                                   
                                </div>  


                                 </div> 
                                 <!-- idPersona Field -->
<div class="form-group col-sm-4" >
    {!! Form::label('Rut', 'Rut:') !!}
    {!! Form::text('rut', null, ['id'=> 'rut','readonly'=>'readonly','class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4" >
    {!! Form::label('PNombre', 'Primer Nombre:') !!}
    {!! Form::text('PNombre', null, ['id'=> 'PNombre','readonly'=>'readonly','class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-4" >
    {!! Form::label('ApPat', 'Apellido:') !!}
    {!! Form::text('ApPat', null, ['id'=> 'ApPat','readonly'=>'readonly','class' => 'form-control']) !!}
</div>

                                 
                    </div>
               </div>
           
    <div class="clearfix"></div>
            @include('flash::message')
        </div>
        </div>
  </div>
  <script type="text/javascript">
    document.getElementById("rutABuscar").addEventListener("change", buscarPersona);
  </script>
  <script src="/js/validarRUT.js"></script>
    @endsection