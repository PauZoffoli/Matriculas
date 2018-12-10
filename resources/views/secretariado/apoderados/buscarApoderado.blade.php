    @extends('layouts.app')

    @section('content')
        <section class="content-header">
            <h1>
                Buscar Apoderado
            </h1>
        </section>
        <div class="content">
           @include('adminlte-templates::common.errors')
           <div class="box box-primary">
               <div class="box-body">
                   <div class="row">
                      
                                {!! Form::open(array('method' => 'Get', 'route' => array('apoSecretariadoContr.searchPersona') )) !!}
                                    
                                 <div class="form-group col-sm-6"> 
                                      
                                 {!! Form::label('RutApoderado', 'Rut Apoderado:') !!}
                                 {!! Form::text('rut', null, ['class' => 'form-control', 'placeholder' => 'Buscar rut apoderado','oninput'=>"checkRut(this)",'maxlength'=>"11"]) !!}
                                
                                 </div> 
                                 <div class="form-group col-sm-12">
                                    {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
                                    {!! Form::close() !!}
                                </div>  
                    </div>
               </div>
           
         
        @if(empty($personas))
        
        @else
        <p><table style="width: 100%" class="table table-striped" id="postulacions-table">
        <thead>
            <tr>
            <th style="width: 10%">Primer Nombre</th>
            <th style="width: 10%">Segundo Nombre</th>
            <th style="width: 10%">Apellido Paterno</th>
            <th style="width: 10%">Apellido Materno</th>
            <th style="width: 10%">Rut</th>
            <th style="width: 10%"></th>
            </tr>
        </thead>
        <tbody >
            
        @foreach($personas as $persona)
            <tr>
                <td>{!! $persona->PNombre  !!}</td>
                <td>{!! $persona->SNombre  !!}</td>
                <td>{!! $persona->ApPat !!}</td>
                <td>{!! $persona->ApMat  !!}</td>
                <td>{!! $persona->rut !!}</td>
            </tr>
        @endforeach
        </tbody>

    </table></p>
    @endif
    </table>
    <div class="clearfix"></div>
            @include('flash::message')
        </div>
        </div>
  </div>
  <script src="/js/validarRUT.js"></script>
    @endsection