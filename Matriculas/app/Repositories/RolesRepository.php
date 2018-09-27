<?php

namespace App\Repositories;

use App\Models\Roles;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RolesRepository
 * @package App\Repositories
 * @version September 12, 2018, 10:18 pm UTC
 *
 * @method Roles findWithoutFail($id, $columns = ['*'])
 * @method Roles find($id, $columns = ['*'])
 * @method Roles first($columns = ['*'])
*/
class RolesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Roles::class;
    }
}
