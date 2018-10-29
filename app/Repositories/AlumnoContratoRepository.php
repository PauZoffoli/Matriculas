<?php

namespace App\Repositories;

use App\Models\AlumnoContrato;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AlumnoContratoRepository
 * @package App\Repositories
 * @version October 29, 2018, 9:06 pm UTC
 *
 * @method AlumnoContrato findWithoutFail($id, $columns = ['*'])
 * @method AlumnoContrato find($id, $columns = ['*'])
 * @method AlumnoContrato first($columns = ['*'])
*/
class AlumnoContratoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idContrato',
        'idAlumno'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AlumnoContrato::class;
    }
}
