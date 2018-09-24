<?php

namespace App\Enums;
use App\Enums;
use Illuminate\Support\Facades\DB;
use App\Models\Comuna;

abstract class ComunaEnum extends Enum {

 static function getPossibleENUM(){
       $comuna = new Comuna; //ENUMERADORES
        $comuna = $comuna->all();
       $enum = array();
      foreach ($comuna as $value) {
         $enum = array_add($enum, $value->id, $value->nombreComu );
     }
     asort($enum);
     return $enum;
    }

}

?>