<?php

namespace App\Enums;
use App\Enums;
use Illuminate\Support\Facades\DB;
use App\Models\Curso;

abstract class CursoEnum extends Enum {

 static function getPossibleENUM(){
       $curso = new Curso; //ENUMERADORES
        $curso = $curso->all();
       $enum = array();
      foreach ($curso as $value) {
         $enum = array_add($enum, $value->id, $value->nivel . ' ' . $value->basicaMedia );
     }
    
     return $enum;
    }

}

?>