
<style>
table.minimalistBlack {
  border: 3px solid #000000;
  width: 100%;
  text-align: left;
  border-collapse: collapse;
}
table.minimalistBlack td, table.minimalistBlack th {
  border: 1px solid #000000;
  padding: 5px 4px;
}
table.minimalistBlack tbody td {
  font-size: 13px;
}
table.minimalistBlack thead {
  background: #CFCFCF;
  background: -moz-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  background: -webkit-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  background: linear-gradient(to bottom, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  border-bottom: 3px solid #000000;
}
table.minimalistBlack thead th {
  font-size: 15px;
  font-weight: bold;
  color: #000000;
  text-align: center;
}
table.minimalistBlack tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #000000;
  border-top: 3px solid #000000;
}
table.minimalistBlack tfoot td {
  font-size: 14px;
}
</style>

<div class="">
  <table class="table table-responsive minimalistBlack" style=" border-collapse: collapse;" id="postulacions-table">
    <thead>
      <tr class="blackborder">
        <th>Nombre Completo</th>
        <th>Rut</th>
        <th>Estado Matrícula</th>
        <th>Tipo de Apoderado</th>
        @if (date('m')!=12)
          <th>Contratos {{ date('Y') }}</th>
        <th>PDF {{  date('Y') }}</th>
        @endif
        
        <th>Contratos {{ date('Y')+1 }}</th>
        <th>PDF {{ date('Y')+1 }}</th>
        {{-- SI ES ADMINISTRADOR SE PODRÁN CAMBIAR LOS ESTADOS DE LA PERSONA --}}
        @if( auth()->user()->hasRole('Administrador') === true)

         <th>Cambiar Estado</th>
       
        @endif
      </tr>

    </thead>
    <tbody border="1px">
      @foreach($personas as $persona)
      <tr>
        <td>

          
          {!! $persona->PNombre !!} {!!  $persona->ApPat !!} {!!  $persona->ApMat  !!}


        </td>
        <td>{!! $persona->rut !!}</td>
        <td style="text-align: center;">@switch($persona->apoderado->estado)
          @case("MatriculaRevisadaPorRevisor")
          <h4 title="MATRÍCULA LISTA"><span class="label label-success"><i class="glyphicon glyphicon-ok"></i></span></h4>
          @break

          @case("MatriculaNoRevisadaPorApoderado")
          <h4 title="EL APODERADO AÚN NO RELLENA LA FICHA"><span class="label label-danger"><i class="glyphicon glyphicon-remove"></i></span></h4>

          @break

          @case("MatriculaRevisadaPorApoderado")
          <h4 title="FICHA RELLENADA, LISTA PARA GENERAR EL CONTRATO"><span class="label label-primary"><i class="glyphicon glyphicon-zoom-in"></i></span></h4>
          @break

          @default

          @endswitch
        </td>

        <td style="text-align: center;">
          @foreach ($persona->tipos as $element)
          @if ($element->nombre == 'ApoderadoPostulante') 
          <p>Nuevo</p> 
          @elseif($element->nombre == 'Apoderado')
          <p>Antiguo</p>
          @endif  
          @endforeach
        </td>
@php
  $contratoThisYear = "";
  $contratoNextYear = "";
  $contratoThisYear =  $persona->apoderado->contratos->where('anioAContratar', date('Y') )->first();
  $contratoNextYear =  $persona->apoderado->contratos->where('anioAContratar', date('Y')+1 )->first(); 
@endphp

      {{-- THIS YEAR --}}
      {{-- THIS YEAR --}}
      {{-- THIS YEAR --}}
      {{-- THIS YEAR --}}
@if (date('m')!=12)
  

        <td style="text-align: center;">

          {!! Form::open() !!}
          <div class='btn-group'>

            <h4 style="float:left;"  title="GENERAR el contrato del año {{ date('Y') }}"><span class="label label-default"><a href="{!! route('apoderadosPostulantes.edit', [$persona->id, "generandoContrato", "Anio"  ] ) !!}" style="color:black;" ><i class="glyphicon glyphicon-plus"></i></a> </span></h4>


            @if ($contratoThisYear)  <!-- ver el último contrato vigente -->
                @if ($contratoThisYear->alumnos!= "[]")
                   <h4 style="float:left;"  title="EDITAR el contrato del año {{ date('Y') }}" ><span class="label label-warning">
                  <a href="{!! route('ContratoSecretariadoContr.edit', [$contratoThisYear->id, "Anio"]  )  !!}"   style="color:white;" ><i class="glyphicon glyphicon-edit"></i></a></span></h4>
                </div>
                @endif
            @endif
          
          </td>
          
          {{-- DESCARGA DE ARCHIVOS  THIS YEAR --}}
          <td style="text-align: center;">
  
         <center>
          @if ($contratoThisYear)
              @if ( !empty($contratoThisYear->urlContrato) )
                <h4 style="float:left;"><span class="label label-info">
                <a href="{{route("pdfContratoStream", $contratoThisYear->id)}}" title="Descargar el CONTRATO del año {{ date('Y') }}"  style="color:white;" ><i class="glyphicon glyphicon-folder-open"></i></a></span></h4>
              @endif

              @if ( !empty($contratoThisYear->urlPagare) )
                <h4 style="float:left;"><span class="label label-success">
                  <a href="{{route("pdfPagareStream", $contratoThisYear->id)}}" title="Descargar el PAGARÉ del año {{ date('Y') }}"  style="color:white;" ><i class="glyphicon glyphicon-usd"></i></a></span></h4>
              @endif
            @endif
          </center>
           </td>

@endif
      {{-- NEXT YEAR --}}
      {{-- NEXT YEAR --}}
      {{-- NEXT YEAR --}}
      {{-- NEXT YEAR --}}
      {{-- NEXT YEAR --}}

          <td style="text-align: center;">

          {!! Form::open() !!}
          <center>
          <div class='btn-group'>

            <h4 style="float:left;" title="GENERAR el contrato del año {{ date('Y') + 1 }}" >
              <span class="label label-default"><a href="{!! route('apoderadosPostulantes.edit', [$persona->id, "generandoContrato" ] ) !!}" style="color:black;" ><i class="glyphicon glyphicon-plus"></i>CREAR</a></span></h4>
        
            <!-- Si existe un contrato, verlo -->
            @if ($contratoNextYear) 
               @if ($contratoNextYear->alumnos!= "[]")
                   <h4 title="EDITAR el contrato del año {{ date('Y') + 1 }}">
                    <span class="label label-warning">
                  <a href="{!! route('ContratoSecretariadoContr.edit', [$contratoNextYear->id] )  !!}"  style="color:white;" ><i class="glyphicon glyphicon-edit"></i>EDITAR</a></span></h4>
                </div>
                @endif
            @endif
            </center>

          </td>

          {{-- DESCARGA DE ARCHIVOS  NEXT YEAR --}}
          <td style="text-align: center;">

            @if ($contratoNextYear)
                <center>
                 <div class='btn-group'>
                    @if ( !empty($contratoNextYear->urlContrato) )
                      <h4 style="float:left;"><span class="label label-info">
                      <a href="{{route("pdfContratoStream", $contratoNextYear->id)}}" title="Descargar el CONTRATO del año {{ date('Y') +1 }}"  style="color:white;" ><i class="glyphicon glyphicon-folder-open"></i>CONTRATO</a></span></h4>
                    @endif

                    @if ( !empty($contratoNextYear->urlPagare) )
                      <h4 ><span class="label label-success">
                        <a href="{{route("pdfPagareStream", $contratoNextYear->id)}}" title="Descargar el PAGARÉ del año {{ date('Y')+1 }}"  style="color:white;" ><i class="glyphicon glyphicon-usd"></i>PAGARÉ</a></span></h4>
                    @endif
                </div>
                </center>
              @endif

            </td>



            {{-- SI ES ADMINISTRADOR SE PODRÁN CAMBIAR LOS ESTADOS DE LA PERSONA --}}
            @if( auth()->user()->hasRole('Administrador') === true)

            <td>


                  
                {!! Form::select('estado', array('cambioestados/'.$persona->id.'/MatriculaNoRevisadaPorApoderado' => 
                                              'No Revisada:Apoderado',
                                              'cambioestados/'.$persona->id.'/MatriculaRevisadaPorApoderado' => 
                                              'SI Revisada:Apoderado',
                                              'cambioestados/'.$persona->id.'/MatriculaRevisadaPorRevisor' => 
                                              'SI Revisada:Revisor'),
                                              'cambioestados/'.$persona->id . '/' .(isset($persona->apoderado->estado) ? $persona->apoderado->estado :null)
                                              , array( 'class' => 'form-control col-sm-6', "onChange"=>"window.location.href=this.value", 'placeholder' => 'Seleccione estado')) !!}


     

               
        
            </td>

            @endif


          </tr>
          @endforeach
        </tbody>

      </table>
    </div>
    @if (!is_a($personas, 'Illuminate\Database\Eloquent\Collection'))
    <div class="pull-right">{!! $personas->render() !!}</div>
    @endif


   