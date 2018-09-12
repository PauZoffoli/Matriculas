<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Persona
 * @package App\Models
 * @version September 12, 2018, 10:18 pm UTC
 *
 * @property \App\Models\Direccione direccione
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection AlumnoResponsable
 * @property \Illuminate\Database\Eloquent\Collection Alumno
 * @property \Illuminate\Database\Eloquent\Collection Apoderado
 * @property \Illuminate\Database\Eloquent\Collection detalleBecaAlumno
 * @property \Illuminate\Database\Eloquent\Collection repitencias
 * @property \Illuminate\Database\Eloquent\Collection userRol
 * @property string PNombre
 * @property string SNombre
 * @property string TNombre
 * @property string ApPat
 * @property string ApMat
 * @property integer fonoFijo
 * @property integer fonoCelu
 * @property integer idUser
 * @property string rut
 * @property string tipoPersona
 * @property string genero
 * @property string email
 * @property string|\Carbon\Carbon fechaNacimiento
 * @property string|\Carbon\Carbon fechaDefuncion
 * @property string estadoCivil
 * @property integer idDireccion
 */
class Persona extends Model
{

    public $table = 'personas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'PNombre',
        'SNombre',
        'TNombre',
        'ApPat',
        'ApMat',
        'fonoFijo',
        'fonoCelu',
        'idUser',
        'rut',
        'tipoPersona',
        'genero',
        'email',
        'fechaNacimiento',
        'fechaDefuncion',
        'estadoCivil',
        'idDireccion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'PNombre' => 'string',
        'SNombre' => 'string',
        'TNombre' => 'string',
        'ApPat' => 'string',
        'ApMat' => 'string',
        'fonoFijo' => 'integer',
        'fonoCelu' => 'integer',
        'idUser' => 'integer',
        'rut' => 'string',
        'tipoPersona' => 'string',
        'genero' => 'string',
        'email' => 'string',
        'estadoCivil' => 'string',
        'idDireccion' => 'integer'
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
    public function direccione()
    {
        return $this->belongsTo(\App\Models\Direccione::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
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
    public function alumnos()
    {
        return $this->hasMany(\App\Models\Alumno::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function apoderados()
    {
        return $this->hasMany(\App\Models\Apoderado::class);
    }
}
