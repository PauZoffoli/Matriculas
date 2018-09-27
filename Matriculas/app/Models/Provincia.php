<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Provincia
 * @package App\Models
 * @version September 12, 2018, 10:18 pm UTC
 *
 * @property \App\Models\Regione regione
 * @property \Illuminate\Database\Eloquent\Collection alumnoResponsable
 * @property \Illuminate\Database\Eloquent\Collection Comuna
 * @property \Illuminate\Database\Eloquent\Collection detalleBecaAlumno
 * @property \Illuminate\Database\Eloquent\Collection personas
 * @property \Illuminate\Database\Eloquent\Collection repitencias
 * @property \Illuminate\Database\Eloquent\Collection userRol
 * @property string nombreProv
 * @property string codigoUnico
 * @property integer idRegion
 */
class Provincia extends Model
{

    public $table = 'provincias';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombreProv',
        'codigoUnico',
        'idRegion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombreProv' => 'string',
        'codigoUnico' => 'string',
        'idRegion' => 'integer'
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
    public function regione()
    {
        return $this->belongsTo(\App\Models\Regione::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function comunas()
    {
        return $this->hasMany(\App\Models\Comuna::class);
    }
}
