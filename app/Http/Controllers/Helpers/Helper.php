<?php
namespace App\Http\Controllers\Helpers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
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


/* get ENUM values String from specified DB table column using my Database Class
// (using substituted table and col names.)
$DB = new Database();
$sql = "SHOW COLUMNS FROM tbl_the_table LIKE 'category'";
$DB->get_data($sql);
while($DB->row = mysql_fetch_array($DB->result_id)) {
  $type = $DB->row["Type"];
}

// format the values
// $type currently has the value of: enum('Equipment','Set','Show')


// ouput will be: Equipment','Set','Show')
$output = str_replace("enum('", "", $type);

 // $output will now be: Equipment','Set','Show
$output = str_replace("')", "", $output);

// array $results contains the ENUM values
$results = explode("','", $output);

// create HTML select object
echo"<select name=\\"the_name\\">\
";

// now output the array items as HTML Options
for($i = 0; $i < count($results); $i++) {
  echo "<option value=\\"$results[$i]\\">$results[$i]</option>\
";
}

// close HTML select object
echo"</select>";
?>*/

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


}