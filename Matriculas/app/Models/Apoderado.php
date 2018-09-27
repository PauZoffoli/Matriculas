<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class Apoderado
 * @package App\Models
 * @version September 12, 2018, 10:18 pm UTC
 *
 * @property \App\Models\Persona persona
 * @property \Illuminate\Database\Eloquent\Collection alumnoResponsable
 * @property \Illuminate\Database\Eloquent\Collection Alumno
 * @property \Illuminate\Database\Eloquent\Collection Contrato
 * @property \Illuminate\Database\Eloquent\Collection detalleBecaAlumno
 * @property \Illuminate\Database\Eloquent\Collection personas
 * @property \Illuminate\Database\Eloquent\Collection repitencias
 * @property \Illuminate\Database\Eloquent\Collection userRol
 * @property string nivelEducacional
 * @property string profesion
 * @property string paisDeOrigen
 * @property integer idPersona
 * @property string estado
 */
class Apoderado extends Model
{


    public $table = 'apoderados';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nivelEducacional',
        'profesion',
        'paisDeOrigen',
        'idPersona',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nivelEducacional' => 'string',
        'profesion' => 'string',
        'paisDeOrigen' => 'string',
        'idPersona' => 'integer',
        'estado' => 'string'
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
    public function persona()
    {
        return $this->belongsTo(\App\Models\Persona::class, 'idPersona');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     FUNCIONA
     **/
    public function alumnos()
    {
        return $this->hasMany(\App\Models\Alumno::class, 'idApoderado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contratos()
    {
        return $this->hasMany(\App\Models\Contrato::class);
    }


}
