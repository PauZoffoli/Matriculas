<?php

namespace App\Repositories;

use App\Models\Persona;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PersonaRepository
 * @package App\Repositories
 * @version September 12, 2018, 10:18 pm UTC
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
        'idUser',
        'rut',
        'tipoPersona',
        'genero',
        'email',
        'fechaNacimiento',
        'fechaDefuncion',
        'estadoCivil',
        'idDireccion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Persona::class;
    }
}
