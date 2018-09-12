<?php

namespace App\Repositories;

use App\Models\Repitencias;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RepitenciasRepository
 * @package App\Repositories
 * @version September 12, 2018, 10:19 pm UTC
 *
 * @method Repitencias findWithoutFail($id, $columns = ['*'])
 * @method Repitencias find($id, $columns = ['*'])
 * @method Repitencias first($columns = ['*'])
*/
class RepitenciasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idAlumno',
        'idCurso'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Repitencias::class;
    }
}
