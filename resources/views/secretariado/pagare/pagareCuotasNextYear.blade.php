{{-- calculo del arancel a pagar a la primera cuota --}}
@php
        
          $valor = floor((floor(floor( $arancelAnual / 11 ) * $maximoDeCuotas / $contrato->nroCuotas)
          + ((floor($arancelAnual / 11 ) * $maximoDeCuotas) % $contrato->nroCuotas))
          * (1-$contrato->PorcentajeBeca / 100)); 

        $valor = $valor + $valor % $contrato->nroCuotas;

@endphp
 
  <tr style='height:6.3pt'>
    <td width=103 nowrap valign=bottom style='width:77.2pt;border:solid windowtext 1.0pt;
    border-top:none;padding:0cm 3.5pt 0cm 3.5pt;height:6.3pt'>
    <p class=MsoNormal align=center style='text-align:center'><span lang=ES-CL
      style='font-size:10.0pt;font-family:"Arial",sans-serif;color:black'>Cuota 1</span></p>
    </td>
    <td width=80 nowrap valign=bottom style='width:60.05pt;border-top:none;
    border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    padding:0cm 3.5pt 0cm 3.5pt;height:6.3pt'>
    <p class=MsoNormal align=center style='text-align:center'><span
      lang=ES-TRAD style='font-size:10.0pt;font-family:"Arial",sans-serif;
      letter-spacing:-.1pt'>{{ date('d-m-Y', strtotime($contrato->fechaContrato)) }}</span></p>
    </td>
    <td width=87 valign=bottom style='width:65.5pt;border-top:none;border-left:
    none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
    padding:0cm 3.5pt 0cm 3.5pt;height:6.3pt'>
    <p class=MsoNormal align=center style='text-align:center'><span
      lang=ES-TRAD style='font-size:10.0pt;letter-spacing:.6pt'>${{ number_format($valor,0, '', '.')   }} 

  </span></p>
    </td>
 
 {{ $contador = 1 }}
@for ($i = 2; $i < $contrato->nroCuotas+1; $i++)
   
@php
  //$startDate = $contrato->anioAContratar . '-' .  date('m', strtotime("+1 month",$contrato->fechaContrato)) . '-07'; // select date in Y-m-d format
$startDate = '07-'. sprintf("%02d", $contador) . '-' . $contrato->anioAContratar ;

$valor = floor(floor(floor($arancelAnual / 11) * $maximoDeCuotas / $contrato->nroCuotas)
  *(1-$contrato->PorcentajeBeca/100));

@endphp 
  <tr style='height:6.3pt'>
  <td width=103 nowrap valign=bottom style='width:77.2pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 3.5pt 0cm 3.5pt;height:6.3pt'>
  <p class=MsoNormal align=center style='text-align:center'><span lang=ES-CL
  style='font-size:10.0pt;font-family:"Arial",sans-serif;color:black'>Cuota {{ $i }}</span></p>
  </td>
  <td width=80 nowrap valign=bottom style='width:60.05pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 3.5pt 0cm 3.5pt;height:6.3pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  lang=ES-TRAD style='font-size:10.0pt;font-family:"Arial",sans-serif;
  letter-spacing:-.1pt'>{{ $startDate }}</span></p>
  </td>
  <td width=87 valign=bottom style='width:65.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 3.5pt 0cm 3.5pt;height:6.3pt'>

   
  <p class=MsoNormal align=center style='text-align:center'><span
  lang=ES-TRAD style='font-size:10.0pt;letter-spacing:.6pt'>${{ number_format($valor , 0, '', '.')  }}
  </span></p>
  </td> 
   }
   }
{{ $contador++ }}
@endfor

