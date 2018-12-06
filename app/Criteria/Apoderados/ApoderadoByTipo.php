<?php  
# app/Criteria/EmployeeCriteria.php
//https://bosnadev.com/2015/03/07/using-repository-pattern-in-laravel-5/
//https://github.com/andersao/l5-repository/issues/301
//https://codecourse.com/watch/the-repository-pattern-in-laravel
namespace App\Criteria\Apoderados;

use Prettus\Repository\Contracts\CriteriaInterface;
//use Prettus\Repository\Contracts\RepositoryInterface as Repository;
use Prettus\Repository\Contracts\RepositoryInterface;


class ApoderadoByTipo implements CriteriaInterface
{
	protected $tipoPersona = null;

    public function __construct($tipoPersona)
    {
       $this->tipoPersona = $tipoPersona;
    }

    public function apply($model, RepositoryInterface $repository)
    {
    	$tipoRequerido =  $this->tipoPersona;
    	
    	return $model
    		->whereHas('apoderados')
    		->whereHas('tipos', function ($item) use ($tipoRequerido) 
    		{
    			$item->where('nombre', 'LIKE','%' . $tipoRequerido .'%');
    	    })
    		->orderBy('id', 'DESC')
    	    ;
    }
}