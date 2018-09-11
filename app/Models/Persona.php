<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class Persona
 * @package App\Models
 * @version September 11, 2018, 3:25 pm UTC
 *
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection AlumnoResponsable
 * @property \Illuminate\Database\Eloquent\Collection Alumno
 * @property \Illuminate\Database\Eloquent\Collection Apoderado
 * @property \Illuminate\Database\Eloquent\Collection userRol
 * @property string PNombre
 * @property string SNombre
 * @property string TNombre
 * @property string ApPat
 * @property string ApMat
 * @property integer fonoFijo
 * @property integer fonoCelu
 * @property integer users_id
 * @property string rut
 * @property string dv
 * @property string tipoPersona
 * @property integer mail
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
        'users_id',
        'rut',
        'dv',
        'tipoPersona',
        'mail'
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
        'users_id' => 'integer',
        'rut' => 'string',
        'dv' => 'string',
        'tipoPersona' => 'string',
        'mail' => 'integer'
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
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class,'users_id');
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
        return $this->hasMany(\App\Models\Alumno::class,'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function apoderados()
    {
        return $this->hasMany(\App\Models\Apoderado::class, 'id');
    }
}
