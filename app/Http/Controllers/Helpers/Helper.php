<?php
namespace App\Http\Controllers\Helpers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use App\Models\AlumnoResponsable;
use App\Models\TipoPersona;
use App\Models\Tipo;
use Flash;


class Helper extends Controller 
{

    public function __construct()
    {
       
    }
	
    //https://stackoverflow.com/questions/18945998/laravel-validation-does-not-work-always-fails
    /*
    Validamos y capturamos los mensajes de errores de manera custom
    
    public static function manualValidation($request, $validate, $message){
//dd(($validate->rules()));
      $validateRole =  Validator::make($request[0],$validate->rules());

      if ( $validateRole->fails()){
        $errorString = $message . '<br>+';
        $errorString =$errorString . implode("<br>+",$validateRole->messages()->all());
        return $errorString;
      }
      
      return null;

    }
    */
    
    public static function createPivot($repository, $request , $idAlumno, $relacion, $condicion){
      $responsable = $repository->create($request);

      $tipo = new Tipo();
      $tipoPersona = new TipoPersona();


      foreach ($tipo->all() as $key => $value) {
        if ($value->nombre == $condicion){
          $tipoPersona->idTipo = $value->id;
        }
      }


      $tipoPersona->idPersona = $responsable->id;
      $alumnoRepo = $tipoPersona->save();

      $alumnoResp = new AlumnoResponsable();
      $alumnoResp->idAlumno =  $idAlumno;
      $alumnoResp->idPersona = $responsable->id;
      $alumnoResp->parentesco = $relacion;
      $alumnoRepo = $alumnoResp->save();
    }

    public static function getEnumValueFromTable($table, $pValue ) {

      $enum = array();
      foreach ($table as $value) {
         $enum = array_add($enum, $value->id, $value->$pValue );
     }
     asort($enum);
     return $enum;
    }
    public static function getEnumValuesFromTable($table, $pValue, $sValue ) {

      $enum = array();
      foreach ($table as $value) {
         $enum = array_add($enum, $value->id, $value->$pValue . ' ' . $value->$sValue);
     }
     return $enum;
    }


    public static function getEnumValues($table, $column) {
      $type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '{$column}'"))[0]->Type ;
      preg_match('/^enum\((.*)\)$/', $type, $matches);
      $enum = array();
      foreach( explode(',', $matches[1]) as $value )
      {
        $v = trim( $value, "'" );
        $enum = array_add($enum, $v, $v);
      }
      return $enum;
    }


   // https://stackoverflow.com/questions/42371728/laravel-redirect-inside-of-trait
    
    //Chequea a cualquiera que no sea la persona
    public static function checkthisValue($value, $quien){
        
        if (empty($value)) {
 
              $errorString = $quien . ' no se encontró<br>';
              $errorString = $errorString ;

          return $errorString;    
        }
        
    }

   /* public static function checkthisValue($value, $quien, $urlRedireccion){
        
        if (empty($value)) {
            Flash::error('La persona no tiene un ' . $quien . ' asociado!');
            return redirect(route($urlRedireccion))->send();
        }
        return $value;
    }*/

    //CHEQUEA A LA PERSONA
    public static function checkthis($repository, $id, $quien){
        $value = $repository->findWithoutFail($id);
        
        if (empty($value)) {
            Flash::error($quien . '  no se encontró!');
            return redirect(route('home'))->send();
        }
        return $value;
    }

    public static function updateThis($repository, $request, $id){
     $value = $repository->findWithoutFail($id);
     return $repository->update($request, $id);
   }

     public static function manualValidation($request, $validate, $message, $lugar){
      $validateRole =  Validator::make($request,$validate->rules());
      if ( $validateRole->fails()){
        if($lugar==1){
           $errorString =  $message . '<br>+';
        }else{
        $errorString = '<br> <br>'. $message . '<br>+';
        }
        $errorString =$errorString . implode("<br>+",$validateRole->messages()->all());

        return $errorString;
      }
      
      return null;

    }
    
    //Chequea y trae el objeto del índice que se le indique
    public static function obtainObject($nombre, $request, $numero, $url, $message,$id){


       if( !isset( $request[$nombre])) {  //comprobamos que el array no esté nulo
                  
            return redirect(route($url, $id))->with('error', $message)->send();
        
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

    public static function tipoDeRelacion($arrays){

      if($arrays!=null){
        array_shift($arrays);//los nulos del array se eliminan y se cambian los índices, formando un 
         return  $arrays;
       }else{
        return null;
      }
      
   }


}