<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class Beca
 * @package App\Models
 * @version September 12, 2018, 10:19 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection alumnoResponsable
 * @property \Illuminate\Database\Eloquent\Collection DetalleBecaAlumno
 * @property \Illuminate\Database\Eloquent\Collection personas
 * @property \Illuminate\Database\Eloquent\Collection repitencias
 * @property \Illuminate\Database\Eloquent\Collection userRol
 * @property string descripcion
 * @property integer porcentaje
 */
class Beca extends Model
{
    

    public $table = 'becas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'descripcion',
        'porcentaje'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'descripcion' => 'string',
        'porcentaje' => 'integer'
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
     *public function detalleBecaAlumnos()
    {
        return $this->hasMany(\App\Models\DetalleBecaAlumno::class);
    }
*/
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function detalleBecaAlumnos()
    {
            return $this->belongsToMany(\App\Models\DetalleBecaAlumno::class, 'detalle_beca_alumno','idAlumno','idBeca');
    }
}
