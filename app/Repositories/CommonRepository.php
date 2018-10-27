<?php

namespace App\Repositories;


use Exception;
use Illuminate\Http\Response;
use Flash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class CommonRepository extends \InfyOm\Generator\Common\BaseRepository 

{

    //http://php.net/manual/es/function.array-search.php
    //Aquí se ponen todas las funciones en Común que tengan los repositorios, viene de BaseRepository
    //fuente: C:\Users\Test\Documents\GitHub\MatriculasIteracion2\vendor\infyomlabs\laravel-generator\src\Common\BaseRepository.php
    //BaseRepository no se updatea puesto que es mala práctica updatear el vendor

    //recomendaciones: aprovechar este motor C:\Users\Test\Documents\GitHub\MatriculasIteracion2\vendor\prettus\l5-repository\src\Prettus\Repository\Eloquent\BaseRepository.php, antes de crear métodos por nuestra cuenta
     
 	
	//Retorna un objeto, si el objeto es null retorna una excepción
    public function requireOne($quien,$id, $columns = ['*'] )
    {
   		$value = $this->findWithoutFail($id, $columns);
   		if (!$value) throw new ModelNotFoundException($quien); //Si está vacío devuelve exception
   		return $value; //si no está vacío devuelve normal  		
   	}

   	//
   	//genera ModelNotFoundException

   	/**
     * Retorna un objeto clase padre, siempre y cuando ese objeto padre se relacione con el hijo que se entrege por parámetro o 
     *  Retornará excepción
     * @param       $relatedParent = string Nombre del objeto padre para setear un mensaje excepción custom
     * @param       $relatedChild  = string Nombre del objeto hijo para setear un mensaje excepción custom
     * @param       $relatedClass  = string Nombre de la relación padre->hijo (ej: alumno para el padre Persona)
     *
     * @return mixed
     */
   	public function hasOneRelated($relatedParent, $relatedChild,$relatedClass, $id)
    {	 	
    	$value = $this->withCount($relatedClass)->requireOne($relatedParent, $id);
    	//$relatedClass."_count";
    	$cadena = "$relatedClass" . "_count";
   		if (!$value->$cadena) throw new ModelNotFoundException($relatedChild); //Si está vacío devuelve exception
   		return $value; //si no está vacío devuelve normal
   	}
    //https://stackoverflow.com/questions/25071149/is-it-possible-to-throw-an-exception-using-short-hand-condition-operator-c-shar


    //	https://stackoverflow.com/questions/18538527/how-to-filter-a-pivot-table-using-eloquent
   	public function findByFieldPivot($modelPivot, $attributeToFind, $variableToFind)
    {	 
    	try{
    		return $modelPivot->where($attributeToFind, $variableToFind)->first();
    	}catch(Exception $e){
    		Flash::error("Ha ocurrido un error de lógica /findByFieldPivot");
    		return redirect('/');
    	}
    	
   	}


}
