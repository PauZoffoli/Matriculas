<?php

namespace App\Repositories;

use App\Models\TipoPersona;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TipoPersonaRepository
 * @package App\Repositories
 * @version September 13, 2018, 3:09 pm UTC
 *
 * @method TipoPersona findWithoutFail($id, $columns = ['*'])
 * @method TipoPersona find($id, $columns = ['*'])
 * @method TipoPersona first($columns = ['*'])
*/
class TipoPersonaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idTipo',
        'idPersona'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TipoPersona::class;
    }
}
