<?php
namespace App\Http\Controllers\Helpers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class Helper extends Controller 
{
	public function __construct()
    {

    }
    
    //Chequea y trae el objeto del índice que se le indique
    public static function obtainObject($nombre, $request, $numero){


       if( !isset( $request[$nombre])) {  //comprobamos que el array no esté nulo
             return null; 
       }

       $NewArray = array_values(array_filter($request[$nombre])); //los nulos del array se eliminan y se cambian los índices, formando un 

       if( !isset( $NewArray[$numero])) { //queremos saber si se salió del ofset
             return null; 
       }

       if( $NewArray[$numero]!=null){ 
            return json_decode( $NewArray[$numero]); //sobre ese nuevo array buscamos el número que necesitamos
        }
       return null;
   }

   //Chequea y trae todos los objetos del índice que se le indique
   //Elimina los nulos y reordena los índices
    public static function obtainAllObjects($nombre, $request){

       if( !isset( $request[$nombre])) {  //comprobamos que el array no esté nulo
             return null; 
       }

       $NewArray = array_values(array_filter($request[$nombre])); //los nulos del array se eliminan y se cambian los índices, formando un 
       return  $NewArray ;
   }



}