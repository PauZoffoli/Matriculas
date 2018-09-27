<?php

namespace App\Repositories;

use App\Models\Curso;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CursoRepository
 * @package App\Repositories
 * @version September 12, 2018, 10:19 pm UTC
 *
 * @method Curso findWithoutFail($id, $columns = ['*'])
 * @method Curso find($id, $columns = ['*'])
 * @method Curso first($columns = ['*'])
*/
class CursoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nivel',
        'basicaMedia',
        'arancelAnual'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Curso::class;
    }
}
