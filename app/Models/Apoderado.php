<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Apoderado
 * @package App\Models
 * @version September 11, 2018, 2:41 pm UTC
 *
 * @property \App\Models\Persona persona
 * @property \App\Models\Direccione direccione
 * @property \Illuminate\Database\Eloquent\Collection alumnoResponsable
 * @property \Illuminate\Database\Eloquent\Collection Alumno
 * @property \Illuminate\Database\Eloquent\Collection Contrato
 * @property \Illuminate\Database\Eloquent\Collection userRol
 * @property string nivelEducacional
 * @property string profesion
 * @property string nacionalidad
 * @property integer idDirecciones
 * @property string|\Carbon\Carbon fechaNacimiento
 * @property string estadoApoderado
 * @property integer idPersona
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
        'nacionalidad',
        'idDirecciones',
        'fechaNacimiento',
        'estadoApoderado',
        'idPersona'
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
        'nacionalidad' => 'string',
        'idDirecciones' => 'integer',
        'estadoApoderado' => 'string',
        'idPersona' => 'integer'
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function direccione()
    {
        return $this->belongsTo(\App\Models\Direccione::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function alumnos()
    {
        return $this->hasMany(\App\Models\Alumno::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contratos()
    {
        return $this->hasMany(\App\Models\Contrato::class);
    }
}
