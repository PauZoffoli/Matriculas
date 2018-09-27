<?php

namespace App\Repositories;

use App\Models\FichaAlumno;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FichaAlumnoRepository
 * @package App\Repositories
 * @version September 12, 2018, 10:18 pm UTC
 *
 * @method FichaAlumno findWithoutFail($id, $columns = ['*'])
 * @method FichaAlumno find($id, $columns = ['*'])
 * @method FichaAlumno first($columns = ['*'])
*/
class FichaAlumnoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return FichaAlumno::class;
    }
}
