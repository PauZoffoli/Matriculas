<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Tipo
 * @package App\Models
 * @version September 13, 2018, 2:56 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection alumnoResponsable
 * @property \Illuminate\Database\Eloquent\Collection detalleBecaAlumno
 * @property \Illuminate\Database\Eloquent\Collection personas
 * @property \Illuminate\Database\Eloquent\Collection repitencias
 * @property \Illuminate\Database\Eloquent\Collection TipoPersona
 * @property \Illuminate\Database\Eloquent\Collection userRol
 * @property string nombre
 * @property string descripcion
 */
class Tipo extends Model
{

    public $table = 'tipos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tipoPersonas()
    {
        return $this->hasMany(\App\Models\TipoPersona::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\Many to Many
    de esto, el idPersona va a ser nuestro filtro, muy importante que esté primero return $this->belongsToMany(\App\Models\Persona::class,  'tipo_persona','idPersona','idTipo');
     Many to many
     **/
    public function personas()
    {
        return $this->belongsToMany(\App\Models\Persona::class,  'tipo_persona','idPersona','idTipo');
    }
}
