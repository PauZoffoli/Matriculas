<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Provincia
 * @package App\Models
 * @version September 12, 2018, 10:18 pm UTC
 *
 * @property \App\Models\Regione regione
 * @property \Illuminate\Database\Eloquent\Collection alumnoResponsable
 * @property \Illuminate\Database\Eloquent\Collection Comuna
 * @property \Illuminate\Database\Eloquent\Collection detalleBecaAlumno
 * @property \Illuminate\Database\Eloquent\Collection personas
 * @property \Illuminate\Database\Eloquent\Collection repitencias
 * @property \Illuminate\Database\Eloquent\Collection userRol
 * @property string nombreProv
 * @property string codigoUnico
 * @property integer idRegion
 */
class PeriodoEscolar extends Model
{

    public $table = 'periodo_escolar';
    
 
    protected $dates = ['deleted_at'];


    public $fillable = [
        'fechaInicio',
        'fechaTermino'
       
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
      
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

  
}
