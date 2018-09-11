<?php

namespace App\Repositories;

use App\Models\Alumno;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AlumnoRepository
 * @package App\Repositories
 * @version September 9, 2018, 11:45 pm UTC
 *
 * @method Alumno findWithoutFail($id, $columns = ['*'])
 * @method Alumno find($id, $columns = ['*'])
 * @method Alumno first($columns = ['*'])
*/
class AlumnoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idApoderado',
        'fechaNacimiento',
        'parentesco',
        'otroParentesco',
        'genero',
        'haRepetido',
        'correoAl',
        'cursoActual',
        'cursoPostular',
        'idDireccion',
        'nacionalidad',
        'fechaDefuncion',
        'estado',
        'estadoCivilPadres',
        'idPersona',
        'PCursoRepetido',
        'SCursoRepetido',
        'TCursoRepetido',
        'idFicha',
        'urlContratoFirmado',
        'urlPagareFirmado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Alumno::class;
    }
}
