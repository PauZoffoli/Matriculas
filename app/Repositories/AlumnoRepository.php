<?php

namespace App\Repositories;

use App\Models\Alumno;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AlumnoRepository
 * @package App\Repositories
 * @version September 12, 2018, 10:17 pm UTC
 *
 * @method Alumno findWithoutFail($id, $columns = ['*'])
 * @method Alumno find($id, $columns = ['*'])
 * @method Alumno first($columns = ['*'])
*/
class AlumnoRepository extends CommonRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'parentesco',
        'otroParentesco',
        'repitencias',
        'condicion',
        'estado',
        'estadoCivilPadres',
        'idPersona',
        'idApoderado',
        'idCursoActual',
        'idCursoPostu'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Alumno::class;
    }
}
