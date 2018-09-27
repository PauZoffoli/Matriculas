<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Region
 * @package App\Models
 * @version September 12, 2018, 10:18 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection alumnoResponsable
 * @property \Illuminate\Database\Eloquent\Collection detalleBecaAlumno
 * @property \Illuminate\Database\Eloquent\Collection personas
 * @property \Illuminate\Database\Eloquent\Collection Provincia
 * @property \Illuminate\Database\Eloquent\Collection repitencias
 * @property \Illuminate\Database\Eloquent\Collection userRol
 * @property string nombreReg
 * @property string regionOrd
 * @property string codigoUnico
 */
class Region extends Model
{

    public $table = 'regiones';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombreReg',
        'regionOrd',
        'codigoUnico'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombreReg' => 'string',
        'regionOrd' => 'string',
        'codigoUnico' => 'string'
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
    public function provincias()
    {
        return $this->hasMany(\App\Models\Provincia::class);
    }
}
