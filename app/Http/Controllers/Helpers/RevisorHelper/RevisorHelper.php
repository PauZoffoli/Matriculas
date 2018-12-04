<?php

namespace App\Http\Controllers\Helpers\RevisorHelper;

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


class RevisorHelper extends Controller 
{

    public function __construct()
    {
       
    }
    

    /*El revisor es quién puede editar los datos de un contacto o padre mal ingresados, por eso se le crea este método que crea o updatea*/
   public static function addOrUpdatePersona($personaRequest, $personaRepository){
        $existePersonaRut = Persona::where('rut', '=', $personaRequest['rut'])->first();
       unset($personaRequest['direccion']);
        $bringPersona = null;
       if($existePersonaRut==null){ //se crea el apoderado si no existe el rut en la BD
          $bringPersona = $personaRepository->create($personaRequest);
       }else{  //Se updatea la persona que tiene ese rut
          $bringPersona = $personaRepository->update($personaRequest, $existePersonaRut->id);
       }
       return $bringPersona;
    }

    public static function verifyDireccionIfNullOrIsset($direccionRequest, $cadenaAVerificar){
        
        if(!isset($direccionRequest[$cadenaAVerificar]) ){
          return true;
        }

        if($direccionRequest[$cadenaAVerificar]==null){
            return true;
            dd("entró");
        }

        return false;
    }

    /*El revisor es quién puede editar los datos de un contacto o padre mal ingresados, por eso se le crea este método que crea o updatea*/
    public static function addOrUpdatePersonaAndDireccion($personaRequest, $personaRepository, $direccionRequest, $direccionRepository){

      $persona =  self::addOrUpdatePersona($personaRequest, $personaRepository);

      if(self::verifyDireccionIfNullOrIsset($direccionRequest, 'idComuna')||
        self::verifyDireccionIfNullOrIsset($direccionRequest, 'calle')||
        self::verifyDireccionIfNullOrIsset($direccionRequest, 'nroCalle')){
        return $persona;
      }

      if($direccionRequest != null){
            $bringDireccion = null;
           
            //dd(isset($persona->direccion));
            if($persona->idDireccion == null){ //se crea el apoderado si no existe el rut en la BD
              $newDireccion = $direccionRepository->create($direccionRequest);
              $persona->idDireccion = $newDireccion->id;
              $persona->save();
              //dd($persona,$direccionRequest,  "created");
            
             }else{  //Se updatea la persona que tiene ese rut
               $newDireccion = $direccionRepository->update($direccionRequest, $persona->direccion->id);
               $persona->idDireccion = $newDireccion->id;
               $persona->save();

              //dd($persona, $direccionRequest, "UPDATED");
            }
      }
     
      return $persona;
      
    }

   
   
    



}