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
    public function tipos()
    {
            return $this->belongsToMany(\App\Models\Tipo::class, 'tipo_persona','idPersona','idTipo');
    }


//https://medium.com/@cvallejo/autenticaci%C3%B3n-de-usuarios-y-roles-en-laravel-5-5-97ab59552d91
    public function hasTipo($role = null) {
        $hasTipo = false;
     
        $hasTipo = !$this->tipos->filter(function($item) use ($role) {
        return $item->nombre == $role;
        })->isEmpty();
        return $hasTipo;
    }

    public function hasAnyTipo($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasTipo($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasTipo($roles)) {
                return true;
            }
        }
        return false;
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
    public function alumno()
    {
        return $this->hasOne(\App\Models\Alumno::class, 'idPersona');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     MÉTODO NO COMPROBADO, MEJOR NO USAR.
     */
    public function apoderados()
    {
        return $this->hasOne(\App\Models\Apoderado::class, 'idPersona');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     MÉTODO QUE USAMOS EN EL CONTROLLADOR C:\laragon\www\Matriculas\app\Http\Controllers\MatriculaPostulante\ApoderadoPController
     */
    public function apoderado()
    {
        return $this->hasOne(\App\Models\Apoderado::class, 'idPersona');
    }


     public function fichaAlumno()
    {
        return $this->hasManyThrough(
            \App\Models\FichaAlumno::class,
            \App\Models\Alumno::class,
            'idPersona', // Foreign key on users table...
            'idAlumno', // Foreign key on posts table...
          'id',
          'id'
        );

    }

   

}
