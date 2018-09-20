<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class FichaAlumno
 * @package App\Models
 * @version September 12, 2018, 10:18 pm UTC
 *
 * @property \App\Models\Alumno alumno
 * @property \Illuminate\Database\Eloquent\Collection alumnoResponsable
 * @property \Illuminate\Database\Eloquent\Collection detalleBecaAlumno
 * @property \Illuminate\Database\Eloquent\Collection personas
 * @property \Illuminate\Database\Eloquent\Collection repitencias
 * @property \Illuminate\Database\Eloquent\Collection userRol
 * @property integer ingresoFamiliarM
 * @property integer causas
 * @property integer nroConvivientes
 * @property integer totalHijos
 * @property integer nroDeHijo
 * @property integer nroHermaIDOP
 * @property string tenenciaVivienda
 * @property string estudiaCon
 * @property string isapreFonasa
 * @property boolean seguroComple
 * @property string enfermedades
 * @property string medicamentos
 * @property boolean esAlergico
 * @property string AlergicoA
 * @property string grupoSanguineo
 * @property integer idAlumno
 */
class FichaAlumno extends Model
{

    public $table = 'ficha_alumno';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'ingresoFamiliarM',
        'causas',
        'nroConvivientes',
        'totalHijos',
        'nroDeHijo',
        'nroHermaIDOP',
        'tenenciaVivienda',
        'estudiaCon',
        'isapreFonasa',
        'seguroComple',
        'enfermedades',
        'medicamentos',
        'esAlergico',
        'AlergicoA',
        'grupoSanguineo',
        'idAlumno'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ingresoFamiliarM' => 'integer',
        'causas' => 'integer',
        'nroConvivientes' => 'integer',
        'totalHijos' => 'integer',
        'nroDeHijo' => 'integer',
        'nroHermaIDOP' => 'integer',
        'tenenciaVivienda' => 'string',
        'estudiaCon' => 'string',
        'isapreFonasa' => 'string',
        'seguroComple' => 'boolean',
        'enfermedades' => 'string',
        'medicamentos' => 'string',
        'esAlergico' => 'boolean',
        'AlergicoA' => 'string',
        'grupoSanguineo' => 'string',
        'idAlumno' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'ingresoFamiliarM' => 'required|min:1',
         //  'causas' => 'required'
            
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function alumno()
    {
        return $this->belongsTo(\App\Models\Alumno::class);
    }
}
