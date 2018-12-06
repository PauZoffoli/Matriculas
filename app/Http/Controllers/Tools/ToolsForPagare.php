<?php

namespace App\Http\Controllers\Tools;


class ToolsForPagare 
{
	public $mesAContratar;
	public $arancelAnualAlumnos;
	public $maximoDeCuotas;

	public function __construct($mesAContratar, $arancelAnualAlumnos, $maximoDeCuotas )
	{
		$this->mesAContratar = $mesAContratar;
		$this->arancelAnualAlumnos = $arancelAnualAlumnos;
		$this->maximoDeCuotas = $maximoDeCuotas;
	}

	public function setArancelAnualAlumnos($arancelAnualAlumnos){
		$this->arancelAnualAlumnos = $arancelAnualAlumnos;
	}

	public function valorDeI($mesAContratar){

		if( 2 == $mesAContratar )
		{
			return  0;
		}
		if( 3 <= $mesAContratar )
		{
			return 2;
		}
		return 1;
	}

	public function plus(){

		return round( ($this->arancelAnualAlumnos / 11 ) , 0, PHP_ROUND_HALF_UP) 
				* $this->valorDeI($this->mesAContratar);
	}

	public function plusT(){
		return floor( ($this->arancelAnualAlumnos / 11 ) ) 
				* $this->valorDeI($this->mesAContratar);
	}

	 //Total a Pagar arancel reajustado según epoca del año
    public function totalAPagarReajustadoSegunFecha(){
        $arancelAnualSinReajustar = (round( $this->arancelAnualAlumnos /11, 0 ,PHP_ROUND_HALF_UP)*
        	$this->maximoDeCuotas) ;
        return ($arancelAnualSinReajustar + $this->plus() );
    }
}