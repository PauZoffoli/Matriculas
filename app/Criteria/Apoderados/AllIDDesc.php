<?php  
# app/Criteria/EmployeeCriteria.php
//https://bosnadev.com/2015/03/07/using-repository-pattern-in-laravel-5/
//https://github.com/andersao/l5-repository/issues/301
//https://codecourse.com/watch/the-repository-pattern-in-laravel
namespace App\Criteria\Apoderados;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class AllIDDesc implements CriteriaInterface
{

    public function __construct()
    {
      
    }

    public function apply($model, RepositoryInterface $repository)
    {
    	
        return $model->whereHas('apoderados')->orderBy('id', 'DESC');
    }
}