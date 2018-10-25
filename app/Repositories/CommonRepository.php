<?php

namespace App\Repositories;

use Exception;

abstract class CommonRepository extends \InfyOm\Generator\Common\BaseRepository

{

    //http://php.net/manual/es/function.array-search.php
    //Aquí se ponen todas las funciones en Común que tengan los repositorios, viene de BaseRepository
    //fuente: C:\Users\Test\Documents\GitHub\MatriculasIteracion2\vendor\infyomlabs\laravel-generator\src\Common\BaseRepository.php
    //BaseRepository no se updatea puesto que es mala práctica updatear el vendor

    //recomendaciones: aprovechar este motor C:\Users\Test\Documents\GitHub\MatriculasIteracion2\vendor\prettus\l5-repository\src\Prettus\Repository\Eloquent\BaseRepository.php, antes de crear métodos por nuestra cuenta
     
 
    public  function notFoundErrorMessageHome($value, $quien){
        if (empty($value)) {
           Flash::error($quien . '  no se encontró!');
           return redirect(route('home'))->send();
        
        }       
    }

}
