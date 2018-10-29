<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class AlumnoContrato
 * @package App\Models
 * @version October 29, 2018, 9:06 pm UTC
 *
 * @property \App\Models\Alumno alumno
 * @property \App\Models\Contrato contrato
 * @property \Illuminate\Database\Eloquent\Collection alumnoResponsable
 * @property \Illuminate\Database\Eloquent\Collection detalleBecaAlumno
 * @property \Illuminate\Database\Eloquent\Collection personas
 * @property \Illuminate\Database\Eloquent\Collection repitencias
 * @property \Illuminate\Database\Eloquent\Collection tipoPersona
 * @property \Illuminate\Database\Eloquent\Collection userRol
 * @property integer idContrato
 * @property integer idAlumno
 */
class AlumnoContrato extends Model
{
    

    public $table = 'alumno_contrato';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'idContrato',
        'idAlumno'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'idContrato' => 'integer',
        'idAlumno' => 'integer'
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
    public function alumno()
    {
        return $this->belongsTo(\App\Models\Alumno::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function contrato()
    {
        return $this->belongsTo(\App\Models\Contrato::class);
    }
}
