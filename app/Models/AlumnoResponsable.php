<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class AlumnoResponsable
 * @package App\Models
 * @version September 11, 2018, 2:40 pm UTC
 *
 * @property \App\Models\Persona persona
 * @property \App\Models\Alumno alumno
 * @property \Illuminate\Database\Eloquent\Collection apoderados
 * @property \Illuminate\Database\Eloquent\Collection userRol
 * @property string parentesco
 * @property integer idAlumno
 * @property integer idPersona
 * @property string descripcion
 */
class AlumnoResponsable extends Model
{
   

    public $table = 'alumno_responsable';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'parentesco',
        'idAlumno',
        'idPersona',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parentesco' => 'string',
        'idAlumno' => 'integer',
        'idPersona' => 'integer',
        'descripcion' => 'string'
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
        return $this->belongsTo(\App\Models\Persona::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function alumno()
    {
        return $this->belongsTo(\App\Models\Alumno::class);
    }
}
