<?php

namespace App\Repositories;

use App\Models\Apoderado;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ApoderadoRepository
 * @package App\Repositories
 * @version September 12, 2018, 10:18 pm UTC
 *
 * @method Apoderado findWithoutFail($id, $columns = ['*'])
 * @method Apoderado find($id, $columns = ['*'])
 * @method Apoderado first($columns = ['*'])
*/
class ApoderadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nivelEducacional',
        'profesion',
        'paisDeOrigen',
        'idPersona',
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Apoderado::class;
    }
}
