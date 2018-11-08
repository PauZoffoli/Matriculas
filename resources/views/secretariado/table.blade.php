
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
            <th colspan="3">Contrato</th>
        </tr>

    </thead>
    <tbody border="1px">
    @foreach($personas as $persona)
        <tr>
            <td>{!! $persona->PNombre !!} {!!  $persona->ApPat !!} {!!  $persona->ApMat  !!}</td>
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
                    @endif  
                @endforeach
            </td>
           
            <td style="text-align: center;">
               
                {!! Form::open() !!}
                <div class='btn-group'>

                    <h4 style="float:left;"><span class="label label-default"><a href="{!! route('apoderadosPostulantes.edit', [$persona->id, "generandoContrato"] ) !!}" style="color:black;" ><i class="glyphicon glyphicon-edit"></i>GENERAR</a> </span></h4>

                    <!-- Si existe un contrato, verlo -->
                    @foreach ($persona->apoderado->contratos as $contratos)

                    @if ($loop->last)  <!-- ver el último contrato vigente -->
                    <h4 style="float:left;"><span class="label label-success">
                        <a href="{!! route('ContratoSecretariadoContr.edit', [$contratos->id] )  !!}"  style="color:white;" ><i class="glyphicon glyphicon-ok"></i>EDITAR</a></span></h4>

                        <h4 style="float:left;"><span class="label label-success">
                        <a href="{{ Storage::disk('local')->url('app' .$contratos->urlContrato)}}"  style="color:white;" ><i class="glyphicon glyphicon-ok"></i>VER</a></span></h4>

                         <h4 style="float:left;"><span class="label label-success">
                        <a href="{{ link_to_asset($contratos->urlContrato, 'Open the pdf!') }}"  style="color:white;" ><i class="glyphicon glyphicon-ok"></i>VER</a></span></h4>

                    {{ link_to_asset('app' .$contratos->urlContrato, 'Open the pdf!') }}

                        @endif
                        @endforeach
                    </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
</div>
@if (!is_a($personas, 'Illuminate\Database\Eloquent\Collection'))
    <div class="pull-right">{!! $personas->render() !!}</div>
@endif


