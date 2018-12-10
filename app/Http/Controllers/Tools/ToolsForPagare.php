<?php

namespace App\Http\Controllers\Tools;


class ToolsForPagare 
{
	public $mesAContratar;
	public $anioAContratar;
	public $arancelAnualAlumnos;
	public $maximoDeCuotas;

	public function __construct($mesAContratar,$anioAContratar, $arancelAnualAlumnos, $maximoDeCuotas )
	{
		$this->mesAContratar = $mesAContratar;
		$this->anioAContratar = $anioAContratar;
		$this->arancelAnualAlumnos = $arancelAnualAlumnos;
		$this->maximoDeCuotas = $maximoDeCuotas;
	}

	public function setArancelAnualAlumnos($arancelAnualAlumnos){
		$this->arancelAnualAlumnos = $arancelAnualAlumnos;
	}

	public function valorDeI($mesAContratar){

		if( 2 == $mesAContratar )
		{
			return  1;
		}
		if( 3 <= $mesAContratar )
		{
			return 2;
		}
		return 0;
	}

	public function plus(){
		return round( ($this->arancelAnualAlumnos / 11 ) , 0, PHP_ROUND_HALF_UP) 
				* $this->valorDeI($this->mesAContratar);
	}

	public function plusT(){
		return floor( ($this->arancelAnualAlumnos / 11 ) ) 
				* $this->valorDeI($this->mesAContratar);
	}

	//Total a pagar. depende si quiero pagar para este año o el próximo
	//totalAPagarReajustadoSegunFecha
    public function totalAPagar(){

    	//Si el año a contratar no es este, será para el próximo
    	if($this->anioAContratar != date('Y')){
    		return $this->arancelAnualAlumnos;
    	}

        $arancelAnualSinReajustar = (round( $this->arancelAnualAlumnos /11, 0 ,PHP_ROUND_HALF_UP)*
        	$this->maximoDeCuotas);

        return ($arancelAnualSinReajustar + $this->plus() );
    }

}