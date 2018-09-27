<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Direccion
 * @package App\Models
 * @version September 12, 2018, 10:18 pm UTC
 *
 * @property \App\Models\Comuna comuna
 * @property \Illuminate\Database\Eloquent\Collection alumnoResponsable
 * @property \Illuminate\Database\Eloquent\Collection detalleBecaAlumno
 * @property \Illuminate\Database\Eloquent\Collection Persona
 * @property \Illuminate\Database\Eloquent\Collection repitencias
 * @property \Illuminate\Database\Eloquent\Collection userRol
 * @property integer idComuna
 * @property string calle
 * @property string nroCalle
 * @property string bloqueTorre
 * @property string dpto
 */
class Direccion extends Model
{

    public $table = 'direcciones';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'idComuna',
        'calle',
        'nroCalle',
        'bloqueTorre',
        'dpto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'idComuna' => 'integer',
        'calle' => 'string',
        'nroCalle' => 'string',
        'bloqueTorre' => 'string',
        'dpto' => 'string'
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
    public function comuna()
    {
        return $this->belongsTo(\App\Models\Comuna::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function personas()
    {
        return $this->hasMany(\App\Models\Persona::class, 'id');
    }
}
