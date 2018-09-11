<?php

namespace App\Repositories;

use App\Models\Persona;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PersonaRepository
 * @package App\Repositories
 * @version September 11, 2018, 3:25 pm UTC
 *
 * @method Persona findWithoutFail($id, $columns = ['*'])
 * @method Persona find($id, $columns = ['*'])
 * @method Persona first($columns = ['*'])
*/
class PersonaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'PNombre',
        'SNombre',
        'TNombre',
        'ApPat',
        'ApMat',
        'fonoFijo',
        'fonoCelu',
        'users_id',
        'rut',
        'dv',
        'tipoPersona',
        'mail'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Persona::class;
    }
}
