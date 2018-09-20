<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Curso
 * @package App\Models
 * @version September 12, 2018, 10:19 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection alumnoResponsable
 * @property \Illuminate\Database\Eloquent\Collection Alumno
 * @property \Illuminate\Database\Eloquent\Collection Alumno
 * @property \Illuminate\Database\Eloquent\Collection detalleBecaAlumno
 * @property \Illuminate\Database\Eloquent\Collection personas
 * @property \Illuminate\Database\Eloquent\Collection Repitencia
 * @property \Illuminate\Database\Eloquent\Collection userRol
 * @property integer nivel
 * @property string basicaMedia
 * @property integer arancelAnual
 */
class Curso extends Model
{

    public $table = 'cursos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nivel',
        'basicaMedia',
        'arancelAnual'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nivel' => 'integer',
        'basicaMedia' => 'string',
        'arancelAnual' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

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
    public function repitencias()
    {
        return $this->hasMany(\App\Models\Repitencia::class);
    }
}
