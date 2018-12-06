<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class BecaAlumno
 * @package App\Models
 * @version September 12, 2018, 10:19 pm UTC
 *
 * @property \App\Models\Alumno alumno
 * @property \App\Models\Beca beca
 * @property \Illuminate\Database\Eloquent\Collection alumnoResponsable
 * @property \Illuminate\Database\Eloquent\Collection personas
 * @property \Illuminate\Database\Eloquent\Collection repitencias
 * @property \Illuminate\Database\Eloquent\Collection userRol
 * @property integer idAlumno
 * @property integer idBeca
 */
class DetalleBecaAlumno extends Model
{


    public $table = 'detalle_beca_alumno';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'idAlumno',
        'anioBeca',
        'porcentaje'
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'idAlumno' => 'integer',
        'anioBeca' => 'integer',
        'porcentaje' => 'integer',
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
    public function alumno()
    {
        return $this->belongsTo(\App\Models\Alumno::class);
    }

}
