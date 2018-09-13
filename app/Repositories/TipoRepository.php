<?php

namespace App\Repositories;

use App\Models\Tipo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TipoRepository
 * @package App\Repositories
 * @version September 13, 2018, 2:56 pm UTC
 *
 * @method Tipo findWithoutFail($id, $columns = ['*'])
 * @method Tipo find($id, $columns = ['*'])
 * @method Tipo first($columns = ['*'])
*/
class TipoRepository extends BaseRepository
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
        return Tipo::class;
    }
}
