<?php

namespace App\Enums;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

abstract class Enum {
   /* static function getKeys(){
        $class = new \ReflectionClass(get_called_class());
        //return array_keys($class->getValues());
        //return array_keys($class->getConstants());
 return array_keys($class->define());

        return array_keys($class->getConstants());

    }

    static function getKeys(){

	$refl = new \ReflectionClass(get_called_class());
	return array_flip($refl->getConstants());
}

}*/
static function getKeys(){

	$refl = new \ReflectionClass(get_called_class());
	return ($refl->getConstants());
}



 static function getConstantValue($x) {
       
        $fooClass = new \ReflectionClass(get_called_class());
        $constants = $fooClass->getConstants();

        $constName = null;
        foreach ( $constants as $name => $value )
        {
            if ( $value == $x )
            {
                $constName = $name;
                break;
            }
        }

        return $constName;
    }

}
?>