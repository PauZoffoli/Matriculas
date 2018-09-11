<?php

namespace App\Repositories;

use App\Models\Apoderado;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ApoderadoRepository
 * @package App\Repositories
 * @version September 11, 2018, 2:41 pm UTC
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
        'nacionalidad',
        'idDirecciones',
        'fechaNacimiento',
        'estadoApoderado',
        'idPersona'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Apoderado::class;
    }
}
