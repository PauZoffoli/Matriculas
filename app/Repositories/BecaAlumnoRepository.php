<?php

namespace App\Repositories;

use App\Models\BecaAlumno;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BecaAlumnoRepository
 * @package App\Repositories
 * @version September 12, 2018, 10:19 pm UTC
 *
 * @method BecaAlumno findWithoutFail($id, $columns = ['*'])
 * @method BecaAlumno find($id, $columns = ['*'])
 * @method BecaAlumno first($columns = ['*'])
*/
class BecaAlumnoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idAlumno',
        'idBeca'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BecaAlumno::class;
    }
}
