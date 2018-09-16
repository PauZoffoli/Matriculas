<?php
namespace App\Http\Controllers\Helpers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class Helper extends Controller 
{
	public function __construct()
    {

    }

    public static function manualValidation($request, $validate){
//dd(($validate->rules()));
      $validateRole =  Validator::make($request[0],$validate->rules());

      if ( $validateRole->fails()){

        $errorString = implode("<br>",$validateRole->messages()->all());
        return $errorString;
      }
      
      return null;

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

   //Chequea y trae todos los objetos del índice que se le indique
   //Elimina los nulos y reordena los índices
    public static function deleteFirst($arrays){

      if($arrays!=null){
        array_shift($arrays);//los nulos del array se eliminan y se cambian los índices, formando un 
         return  $arrays;
       }else{
        return null;
      }
      
   }


}