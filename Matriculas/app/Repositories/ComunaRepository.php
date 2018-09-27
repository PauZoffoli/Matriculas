<?php

namespace App\Repositories;

use App\Models\Comuna;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ComunaRepository
 * @package App\Repositories
 * @version September 12, 2018, 10:18 pm UTC
 *
 * @method Comuna findWithoutFail($id, $columns = ['*'])
 * @method Comuna find($id, $columns = ['*'])
 * @method Comuna first($columns = ['*'])
*/
class ComunaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'codigoUnico',
        'idProvincia'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Comuna::class;
    }
}
