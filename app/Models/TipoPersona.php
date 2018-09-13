<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class TipoPersona
 * @package App\Models
 * @version September 13, 2018, 3:09 pm UTC
 *
 * @property \App\Models\Persona persona
 * @property \App\Models\Tipo tipo
 * @property \Illuminate\Database\Eloquent\Collection alumnoResponsable
 * @property \Illuminate\Database\Eloquent\Collection detalleBecaAlumno
 * @property \Illuminate\Database\Eloquent\Collection personas
 * @property \Illuminate\Database\Eloquent\Collection repitencias
 * @property \Illuminate\Database\Eloquent\Collection userRol
 * @property integer idTipo
 * @property integer idPersona
 */
class TipoPersona extends Model
{

    public $table = 'tipo_persona';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'idTipo',
        'idPersona'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'idTipo' => 'integer',
        'idPersona' => 'integer'
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
    public function tipo()
    {
        return $this->belongsTo(\App\Models\Tipo::class);
    }
}
