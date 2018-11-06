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
        'idCursoPostu',
        'paisDeOrigen'
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
        'idCursoPostu' => 'integer',
        'paisDeOrigen' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'parentesco' => 'required|min:1',
        'idCursoPostu' => 'required'
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function apoderado()
    {
        return $this->belongsTo(\App\Models\Apoderado::class, 'idApoderado');
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function curso()
    {
        return $this->belongsTo(\App\Models\Curso::class, 'idCursoPostu');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cursoActual()
    {
        return $this->belongsTo(\App\Models\Curso::class, 'idCursoActual');
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
     *
    public function alumnoResponsables()
    {
        return $this->hasMany(\App\Models\AlumnoResponsable::class);
    }*/

     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function alumnoResponsables()
    {
            return $this->belongsToMany(\App\Models\Persona::class, 'alumno_responsable', 'idAlumno','idPersona')
            ->withPivot('id','parentesco', 'contacto');
    }

    public function alumnoResponsableParent()
    {
            return $this->belongsToMany(\App\Models\Persona::class, 'alumno_responsable',  'idAlumno','idPersona')->withPivot('id','parentesco');
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
     UTILIZADO HASTA EL MOMENTO
     **/

    public function repitencia()
    {
        return $this->belongsToMany(\App\Models\Curso::class, 'repitencias', 'idAlumno', 'idCurso');
    }

 /*   public function repitencias()
    {
        return $this->belongsToMany(\App\Models\Curso::class, 'repitencias', 'idAlumno', 'idCurso', 'id');
    }
*/

     public function apoderadoValidation()
    {
        return $this->belongsTo(\App\Models\Apoderado::class, 'idApoderado');
    }

    public function contratos()
    {
        return $this->belongsToMany(\App\Models\Contrato::class,  'alumno_contrato','idAlumno','idContrato');
    }
}
