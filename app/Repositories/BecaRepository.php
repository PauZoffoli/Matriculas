<?php

namespace App\Repositories;

use App\Models\Beca;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BecaRepository
 * @package App\Repositories
 * @version September 12, 2018, 10:19 pm UTC
 *
 * @method Beca findWithoutFail($id, $columns = ['*'])
 * @method Beca find($id, $columns = ['*'])
 * @method Beca first($columns = ['*'])
*/
class BecaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
        'porcentaje'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Beca::class;
    }
}
