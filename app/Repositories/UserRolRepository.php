<?php

namespace App\Repositories;

use App\Models\UserRol;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserRolRepository
 * @package App\Repositories
 * @version September 12, 2018, 10:19 pm UTC
 *
 * @method UserRol findWithoutFail($id, $columns = ['*'])
 * @method UserRol find($id, $columns = ['*'])
 * @method UserRol first($columns = ['*'])
*/
class UserRolRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idUser',
        'idRol'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserRol::class;
    }
}
