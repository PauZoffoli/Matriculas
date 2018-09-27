<?php

namespace App\Repositories;

use App\Models\Direccion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DireccionRepository
 * @package App\Repositories
 * @version September 12, 2018, 10:18 pm UTC
 *
 * @method Direccion findWithoutFail($id, $columns = ['*'])
 * @method Direccion find($id, $columns = ['*'])
 * @method Direccion first($columns = ['*'])
*/
class DireccionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idComuna',
        'calle',
        'nroCalle',
        'bloqueTorre',
        'dpto'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Direccion::class;
    }
}
