<?php

namespace App\Enums;
use App\Enums;
use Illuminate\Support\Facades\DB;

abstract class EstadoCivilPadresEnum extends Enum {


    const SOLTERO = "Soltero/a";
    const CASADO = "Casado/a";
    const VIUDO = "Viudo/a";
    const DIVORCIADO = "Divorciado/a";
    const SEPARADO = "Separado/a";
    const CONVIVIENTE = "Conviviente";

 static function getPossibleENUM(){

        //Se rellena la cadena con los datos por parámetro
        $cadena = 'SHOW COLUMNS FROM ' . 'alumnos' . ' WHERE Field = "' . 'estadoCivilPadres' . '"';

        $type = DB::select(DB::raw($cadena))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $values = array();

        foreach(explode(',', $matches[1]) as $value){
            $values[trim($value, "'")] = trim($value, "'");
            
        }
        return $values;
    }

}

?>