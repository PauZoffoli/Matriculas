<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class Contrato
 * @package App\Models
 * @version September 12, 2018, 10:18 pm UTC
 *
 * @property \App\Models\Apoderado apoderado
 * @property \Illuminate\Database\Eloquent\Collection alumnoResponsable
 * @property \Illuminate\Database\Eloquent\Collection detalleBecaAlumno
 * @property \Illuminate\Database\Eloquent\Collection personas
 * @property \Illuminate\Database\Eloquent\Collection repitencias
 * @property \Illuminate\Database\Eloquent\Collection userRol
 * @property integer idApoderado
 * @property string urlContrato
 * @property string urlPagare
 * @property string urlContratoF
 * @property string urlPagareF
 * @property integer nroCuotas
 * @property string|\Carbon\Carbon fechaContrato
 * @property integer anioAContratar
 * @property integer totalAPagar
 */
class Contrato extends Model
{

    public $table = 'contratos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'idApoderado',
        'urlContrato',
        'urlPagare',
        'urlContratoF',
        'urlPagareF',
        'nroCuotas',
        'fechaContrato',
        'anioAContratar',
        'totalAPagar'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'idApoderado' => 'integer',
        'urlContrato' => 'string',
        'urlPagare' => 'string',
        'urlContratoF' => 'string',
        'urlPagareF' => 'string',
        'nroCuotas' => 'integer',
        'anioAContratar' => 'integer',
        'totalAPagar' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function apoderado()
    {
        return $this->belongsTo(\App\Models\Apoderado::class, 'idApoderado');
    }
    public function alumnos()
    {
        return $this->belongsToMany(\App\Models\Alumno::class, 'alumno_contrato','idContrato','idAlumno');
    }
}
