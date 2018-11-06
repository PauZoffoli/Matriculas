<?php  
# app/Criteria/EmployeeCriteria.php
//https://bosnadev.com/2015/03/07/using-repository-pattern-in-laravel-5/
//https://github.com/andersao/l5-repository/issues/301
//https://codecourse.com/watch/the-repository-pattern-in-laravel
namespace App\Criteria\Alumnos;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindAlumno implements CriteriaInterface
{

/*DEPRECADO, NO FUNCIONÓ*/
	 

	protected $nombreClasePadre = null;
	protected $nombreClaseHijo = null;
	protected $tablaClaseHijo = null;
	protected $idClasePadre = null; //persona

    public function __construct($nombreClasePadre, $nombreClaseHijo, $tablaClaseHijo, $idClasePadre)
    {
     	$this->nombreClasePadre = $nombreClasePadre;
     	$this->nombreClaseHijo = $nombreClaseHijo;
     	$this->tablaClaseHijo = $tablaClaseHijo;
     	$this->idClasePadre = $idClasePadre; 
    }

    public function apply($model, RepositoryInterface $repository)
    {
    	
        return $model->hasOneRelated($relatedParent, $relatedChild,$relatedClass, $id);;
    }
}