<?php
namespace App\Http\Controllers\Helpers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use App\Models\AlumnoResponsable;
use App\Models\TipoPersona;
use App\Models\Tipo;
use App\Models\Persona;
use App\Models\Alumno;
use Flash;
use Illuminate\Support\Facades\Redirect;

class Helper extends Controller 
{

    public function __construct()
    {
       
    }
	

    
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
    /*DEPRECADO DEL CONTROLLER APODERADOPCONTROLLER*/
    public static function obtainObject($nombre, $request, $numero, $url, $message,$id){


       if( !isset( $request[$nombre])) {  //comprobamos que el array no esté nulo                      
              return redirect(route($url, $id))->with('error', $message)->send();
          //  return redirect(route($url, $id))->with('error', $message)->send();
        
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

  /////retorna el primer objeto JSON eg: "de lo chequeado por el apoderado", o de lo contrario lanza error y nos retorna a la url actual
    public static function obtainFirstObject($arrayOfIDs, $numero,$id){

       if( !isset( $request[$arrayOfIDs])) {     
           return null;
       }
       dd("OK");

       $NewArray = array_values(array_filter($request[$arrayOfIDs])); //los nulos del array se eliminan y se cambian los índices, formando un 

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
   //*DEPRECADO, PERO PUEDE SER UTIL*
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

   /*DEPRECADO*********************************/
   //Método que antes de relacionar un pivote de TipoPersona, verifica si ya existe uno igual
   public static function pivotAddTipo($tipo, $claseTipoPersona, $apoderadoAlumnos){

     $idTipo = Tipo::where('nombre', $tipo)->first()->id;
     $claseTipoPersona->idTipo = $idTipo; 

     $existeTipo = TipoPersona::where('idTipo', '=', $idTipo)->where('idPersona', '=', $apoderadoAlumnos->id)->first();
    //dd(array("idTipo" => $claseTipoPersona->idTipo, "idPersona" => $claseTipoPersona->idPersona));
     if($existeTipo==null){
        $val = $apoderadoAlumnos->tipos()->attach($idTipo, array("idTipo" => $claseTipoPersona->idTipo, "idPersona" => $claseTipoPersona->idPersona));
     }

      $tipoPersonaAgregada = TipoPersona::where('idTipo', '=', $idTipo)->where('idPersona', '=', $apoderadoAlumnos->id)->first(); //Hacemos esto para traernos el tipo que acabamos de agregar
      return $tipoPersonaAgregada; //Devolvemos una variable de tipo TipoPersona

  }


   /*DEPRECADO*********************************/
      //Ahora debemos crear un AlumnoResponsable con parentesco "Padre"
   public static function pivotAddAlumnoResponsableApoderado($alumno, $parentesco, $apoderadoAlumnos){


     $existeTipo = AlumnoResponsable::where('idAlumno', '=', $alumno['id'])->where('idPersona', '=', $apoderadoAlumnos->id)->first();
   
     if($existeTipo==null){ //se crea
     
        $alumnoResponsable = new AlumnoResponsable();
        $alumnoResponsable->idAlumno = $alumno['id'];
        $alumnoResponsable->idPersona = $apoderadoAlumnos->id;
        $alumnoResponsable->parentesco = $parentesco;
        $alumnoResponsable->save();
         //dd("CREATE");
     }else { //Se updatea
     
         $existeTipo->parentesco = $parentesco;
         $existeTipo->save();
          //dd("UPDATEO");
     }

    $alumnoResponsableAgregado = AlumnoResponsable::where('idAlumno', '=', $alumno['id'])->where('idPersona', '=', $apoderadoAlumnos->id)->first();; //Hacemos esto para traernos lo q que acabamos de agregar

      return $alumnoResponsableAgregado; //Devolvemos una variable de tipo TipoPersona

  }

    //creo o traigo a la persona si existe por rut
   public static function existePersona($persona, $repository){
        $existePersonaRut = Persona::where('rut', '=', $persona['rut'])->first();

        $bringPersona = null;
        if($existePersonaRut==null){ //se crea
          $bringPersona = $repository->create($persona);
       }else{  //Si la persona ya se encontraba no se updatea, solo se trae
          $bringPersona = $existePersonaRut;
       }
       return $bringPersona;
    }

         //Comprobamos que el rut del Alumno efectivamente exista
   public static function comprobarQueElRutExista($persona){
        $existePersonaRut = Persona::where('rut', '=', $persona['rut'])->first();
        $mensaje = null;
        if($existePersonaRut==null){ //se crea
            $mensaje = "El rut del alumno no existe, no sea pillo ;)";
        }
       return $mensaje;
    }

    public static function existeTipoPersona($nombreTipo, $persona){

     $idTipo = Tipo::where('nombre', $nombreTipo)->first(); //Obtenemos el idTipo según el tipo de relación que queramos, por ejemplo Padre

     //Comprobamos que se nos haya devuelto un valor
     if(isset($idTipo)){
      $idTipo= $idTipo->id;
     }else{
      $idTipo = null;
     }

     $existeTipoPersona = TipoPersona::where('idTipo', '=', $idTipo)->where('idPersona', '=', $persona->id)->first();

     $bringTipoPersona = null;
     if($existeTipoPersona==null){
        $bringTipoPersona = $persona->tipos()->attach($idTipo, array("idTipo" => $idTipo, "idPersona" =>  $persona->id)); //Si la relación no está hecha la hacemos
       
     }else{
        $bringTipoPersona = $existeTipoPersona; //Si la relación ya está hecha la traemos
        
     }

      return $bringTipoPersona; //Devolvemos una variable de tipo TipoPersona
      //Si queda null es por que no se logró devolver nada

  }


  //tenemos que pasarle el alumno de siempre
  //tenemos que pasar el responsable, nuevo o antiguo
  //tenemos que pasar el repo
  //tenemos que pasar el parentesco que queramos 
  //tenemos que pasar el contacto que queramos
  public static function existeAlumnoResponsable($alumno, $responsable, $repository, $parentesco, $contacto){
      $bringAlumnoResponsable = null; //variable que vamos a retornar

      //Si el alumno ya tiene ese tipo de parentesco relacionado, hay que solo editar el id de la persona con quien relacionamos
     
      //Si el alumno ya tiene la relación
       $existeAlumnoResponsable = AlumnoResponsable::where('idAlumno', '=', $alumno['id'])->where('idPersona', '=', $responsable['id'])->first();

        if($existeAlumnoResponsable==null){ //Si la relación no existe, créala
            $bringAlumnoResponsable = $repository->create( array("idAlumno" => $alumno['id'], "idPersona" =>   $responsable['id'], "parentesco" =>  $parentesco,  "contacto" =>  $contacto)); //Si la relación no está hecha la hacemos
       
        }else{ //Si la relación existe, updateala
            $bringAlumnoResponsable = $repository->update(array("idAlumno" => $alumno['id'], "idPersona" =>  $responsable['id'], "parentesco" =>  $parentesco,  "contacto" =>  $contacto), $existeAlumnoResponsable->id);
        }
    
  
      return $bringAlumnoResponsable; //Devolvemos una variable de tipo TipoPersona

  }


//CUIDADO CON ESTA FUNCIÓN, CUALQUIERA QUE NO SEA PADRE O MADRE DE ESE ALUMNO LO VA A BORRAR
  //TAMBIÉN CAMBIA LOS ID DEL ALUMNORELACION
  public static function existeRelacionPorParentesco($idAlumno, $padreExistente, $madreExistente, $parentesco){

   $alumno = new Alumno;
   $alumno->id = $idAlumno;
   $persona = new Persona;
   $persona->id = $padreExistente->id;
   $alResp = new AlumnoResponsable;
   $alResp->parentesco = $parentesco; 

//$alumno->alumnoResponsables()->wherePivot('parentesco' ,'=', $parentesco)->sync([$idAlumno => ['parentesco' =>$alResp->parentesco ]]);


   $alumno->alumnoResponsableParent()->syncWithoutDetaching(

    array( 
      $padreExistente->id  => array( 'parentesco' => "Padre" ),
      $madreExistente->id  => array( 'parentesco' => "Madre" )

    ));
   $alumno->alumnoResponsableParent()->sync(array( $padreExistente->id ,
    $madreExistente->id )

 );

 }

//verifica si ese parentesco o Contacto ya existe, para poder editarlo
  public static function yaExisteElParentesco($alumno, $responsable, $repository, $parentesco, $contacto){
      $parentescoOContacto = null;
      $repetidoParentesco = AlumnoResponsable::where('idAlumno', '=', $alumno['id'])->where('parentesco', '=', $parentesco)->first();
    
      $repetidoContacto = AlumnoResponsable::where('idAlumno', '=', $alumno['id'])->where('contacto', '=', $contacto)->first();

      if(isset($repetidoParentesco)){
         $parentescoOContacto = $repository->update(array("idPersona" =>  $responsable->id),$repetidoParentesco->id);
      }


      if(isset($repetidoContacto)){
          $parentescoOContacto = $repository->update(array("idPersona" =>  $responsable->id),$repetidoContacto->id);
      }


      return $parentescoOContacto;
  }

    /*DEPRECADO*************************/
      //Ahora debemos crear un AlumnoResponsable con parentesco "Padre"
   public static function AddPadreOMadre($alumno, $parentesco, $apoderadoAlumnos){


     $existePersonaRut = Persona::where('rut', '=', $alumno['rut'])->first();
   
     if($existePersonaRut==null){ //se crea
     
        $alumnoResponsable = new Persona();
        $alumnoResponsable->idAlumno = $alumno['id'];
        $alumnoResponsable->idPersona = $apoderadoAlumnos->id;
        $alumnoResponsable->parentesco = $parentesco;
        $alumnoResponsable->save();
         //dd("CREATE");
     }else { //Se updatea
     
         $existeTipo->parentesco = $parentesco;
         $existeTipo->save();
          //dd("UPDATEO");
     }

    $alumnoResponsableAgregado = AlumnoResponsable::where('idAlumno', '=', $alumno['id'])->where('idPersona', '=', $apoderadoAlumnos->id)->first();; //Hacemos esto para traernos lo q que acabamos de agregar

      return $alumnoResponsableAgregado; //Devolvemos una variable de tipo TipoPersona

  }

      public static function contacto1Ficha($request, $ficha){
        
        $ficha['PNombrePContacto'] =  $request['PNombre'];
        $ficha['SNombrePContacto'] =  $request['SNombre'];
        $ficha['TNombrePContacto'] =  $request['TNombre'];
        $ficha['ApPatPContacto'] =  $request['ApPat'];
        $ficha['ApMatPContacto'] =  $request['ApMat'];
        $ficha['fonoFijoPContacto'] =  $request['fonoFijo'];
        $ficha['fonoCeluPContacto'] =  $request['fonoCelu'];
        $ficha['emailPContacto'] =  $request['email'];
        $ficha['parentescoPContacto'] =  $request['parentesco'];
        return $ficha;
      }

        public static function contacto2Ficha($request, $ficha){
        $ficha['PNombreSContacto'] =  $request['PNombre'];
        $ficha['SNombreSContacto'] =  $request['SNombre'];
        $ficha['TNombreSContacto'] =  $request['TNombre'];
        $ficha['ApPatSContacto'] =  $request['ApPat'];
        $ficha['ApMatSContacto'] =  $request['ApMat'];
        $ficha['fonoFijoSContacto'] =  $request['fonoFijo'];
        $ficha['fonoCeluSContacto'] =  $request['fonoCelu'];
        $ficha['emailSContacto'] =  $request['email'];
        $ficha['parentescoSContacto'] =  $request['parentesco'];
                return $ficha;
      }
}