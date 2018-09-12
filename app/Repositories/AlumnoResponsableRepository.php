<?php

namespace App\Repositories;

use App\Models\AlumnoResponsable;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AlumnoResponsableRepository
 * @package App\Repositories
 * @version September 12, 2018, 10:18 pm UTC
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
        'otroParentesco',
        'idPersona',
        'idAlumno',
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
