<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Repitencias
 * @package App\Models
 * @version September 12, 2018, 10:19 pm UTC
 *
 * @property \App\Models\Alumno alumno
 * @property \App\Models\Curso curso
 * @property \Illuminate\Database\Eloquent\Collection alumnoResponsable
 * @property \Illuminate\Database\Eloquent\Collection detalleBecaAlumno
 * @property \Illuminate\Database\Eloquent\Collection personas
 * @property \Illuminate\Database\Eloquent\Collection userRol
 * @property integer idAlumno
 * @property integer idCurso
 */
class Repitencias extends Model
{

    public $table = 'repitencias';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'idAlumno',
        'idCurso'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'idAlumno' => 'integer',
        'idCurso' => 'integer'
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
        return $this->belongsToMany(\App\Models\Alumno::class, 'repitencias', 'idAlumno', 'idCurso');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function curso()
    {
        return $this->belongsTo(\App\Models\Curso::class);
    }
}
