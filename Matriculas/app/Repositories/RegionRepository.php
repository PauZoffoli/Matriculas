<?php

namespace App\Repositories;

use App\Models\Region;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RegionRepository
 * @package App\Repositories
 * @version September 12, 2018, 10:18 pm UTC
 *
 * @method Region findWithoutFail($id, $columns = ['*'])
 * @method Region find($id, $columns = ['*'])
 * @method Region first($columns = ['*'])
*/
class RegionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombreReg',
        'regionOrd',
        'codigoUnico'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Region::class;
    }
}
