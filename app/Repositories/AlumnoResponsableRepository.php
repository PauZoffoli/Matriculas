<?php

namespace App\Repositories;

use App\Models\AlumnoResponsable;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AlumnoResponsableRepository
 * @package App\Repositories
 * @version September 11, 2018, 2:40 pm UTC
 *
 * @method AlumnoResponsable findWithoutFail($id, $columns = ['*'])
 * @method AlumnoResponsable find($id, $columns = ['*'])
 * @method AlumnoResponsable first($columns = ['*'])
*/
class AlumnoResponsableRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'parentesco',
        'idAlumno',
        'idPersona',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AlumnoResponsable::class;
    }
}
