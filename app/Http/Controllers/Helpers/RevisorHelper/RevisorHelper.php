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
   public static function existePersona($persona, $repository){
        $existePersonaRut = Persona::where('rut', '=', $persona['rut'])->first();

        $bringPersona = null;
       if($existePersonaRut==null){ //se crea el apoderado si no existe el rut en la BD
          $bringPersona = $repository->create($persona);
       }else{  //Se updatea la persona que tiene ese rut
          $bringPersona = $repository->update($persona, $existePersonaRut->id);
       }
       return $bringPersona;
    }

}