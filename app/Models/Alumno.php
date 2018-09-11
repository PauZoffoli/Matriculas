<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Alumno
 * @package App\Models
 * @version September 9, 2018, 11:45 pm UTC
 *
 * @property \App\Models\Persona persona
 * @property \App\Models\Apoderado apoderado
 * @property \App\Models\Direccione direccione
 * @property \App\Models\FichaAlumno fichaAlumno
 * @property \Illuminate\Database\Eloquent\Collection AlumnoResponsable
 * @property \Illuminate\Database\Eloquent\Collection apoderados
 * @property \Illuminate\Database\Eloquent\Collection userRol
 * @property integer idApoderado
 * @property string|\Carbon\Carbon fechaNacimiento
 * @property string parentesco
 * @property string otroParentesco
 * @property string genero
 * @property string haRepetido
 * @property string correoAl
 * @property string cursoActual
 * @property string cursoPostular
 * @property integer idDireccion
 * @property string nacionalidad
 * @property string|\Carbon\Carbon fechaDefuncion
 * @property string estado
 * @property string estadoCivilPadres
 * @property integer idPersona
 * @property string PCursoRepetido
 * @property string SCursoRepetido
 * @property string TCursoRepetido
 * @property integer idFicha
 * @property string urlContratoFirmado
 * @property string urlPagareFirmado
 */
class Alumno extends Model
{

    public $table = 'alumnos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'idApoderado',
        'fechaNacimiento',
        'parentesco',
        'otroParentesco',
        'genero',
        'haRepetido',
        'correoAl',
        'cursoActual',
        'cursoPostular',
        'idDireccion',
        'nacionalidad',
        'fechaDefuncion',
        'estado',
        'estadoCivilPadres',
        'idPersona',
        'PCursoRepetido',
        'SCursoRepetido',
        'TCursoRepetido',
        'idFicha',
        'urlContratoFirmado',
        'urlPagareFirmado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'idApoderado' => 'integer',
        'parentesco' => 'string',
        'otroParentesco' => 'string',
        'genero' => 'string',
        'haRepetido' => 'string',
        'correoAl' => 'string',
        'cursoActual' => 'string',
        'cursoPostular' => 'string',
        'idDireccion' => 'integer',
        'nacionalidad' => 'string',
        'estado' => 'string',
        'estadoCivilPadres' => 'string',
        'idPersona' => 'integer',
        'PCursoRepetido' => 'string',
        'SCursoRepetido' => 'string',
        'TCursoRepetido' => 'string',
        'idFicha' => 'integer',
        'urlContratoFirmado' => 'string',
        'urlPagareFirmado' => 'string'
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
    public function apoderado()
    {
        return $this->belongsTo(\App\Models\Apoderado::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function direccione()
    {
        return $this->belongsTo(\App\Models\Direccione::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function fichaAlumno()
    {
        return $this->belongsTo(\App\Models\FichaAlumno::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function alumnoResponsables()
    {
        return $this->hasMany(\App\Models\AlumnoResponsable::class);
    }
}
