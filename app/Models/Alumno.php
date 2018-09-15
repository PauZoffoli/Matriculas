<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class Alumno
 * @package App\Models
 * @version September 12, 2018, 10:17 pm UTC
 *
 * @property \App\Models\Apoderado apoderado
 * @property \App\Models\Curso curso
 * @property \App\Models\Curso curso
 * @property \App\Models\Persona persona
 * @property \Illuminate\Database\Eloquent\Collection AlumnoResponsable
 * @property \Illuminate\Database\Eloquent\Collection DetalleBecaAlumno
 * @property \Illuminate\Database\Eloquent\Collection FichaAlumno
 * @property \Illuminate\Database\Eloquent\Collection personas
 * @property \Illuminate\Database\Eloquent\Collection Repitencia
 * @property \Illuminate\Database\Eloquent\Collection userRol
 * @property string parentesco
 * @property string otroParentesco
 * @property boolean repitencias
 * @property string condicion
 * @property string estado
 * @property string estadoCivilPadres
 * @property integer idPersona
 * @property integer idApoderado
 * @property integer idCursoActual
 * @property integer idCursoPostu
 */
class Alumno extends Model
{


    public $table = 'alumnos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'parentesco',
        'otroParentesco',
        'repitencias',
        'condicion',
        'estado',
        'estadoCivilPadres',
        'idPersona',
        'idApoderado',
        'idCursoActual',
        'idCursoPostu'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parentesco' => 'string',
        'otroParentesco' => 'string',
        'repitencias' => 'boolean',
        'condicion' => 'string',
        'estado' => 'string',
        'estadoCivilPadres' => 'string',
        'idPersona' => 'integer',
        'idApoderado' => 'integer',
        'idCursoActual' => 'integer',
        'idCursoPostu' => 'integer'
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
        return $this->belongsTo(\App\Models\Apoderado::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function curso()
    {
        return $this->belongsTo(\App\Models\Curso::class);
    }

    


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function persona()
    {
        return $this->belongsTo(\App\Models\Persona::class, 'idPersona');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function alumnoResponsables()
    {
        return $this->hasMany(\App\Models\AlumnoResponsable::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detalleBecaAlumnos()
    {
        return $this->hasMany(\App\Models\DetalleBecaAlumno::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany CUSTOM
     **/
    public function fichaAlumno()
    {
        return $this->hasOne(\App\Models\FichaAlumno::class, 'idAlumno');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function repitencias()
    {
        return $this->hasMany(\App\Models\Repitencias::class);
    }
}
