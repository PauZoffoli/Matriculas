<?php

namespace App\Repositories;

use App\Models\Contrato;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ContratoRepository
 * @package App\Repositories
 * @version September 12, 2018, 10:18 pm UTC
 *
 * @method Contrato findWithoutFail($id, $columns = ['*'])
 * @method Contrato find($id, $columns = ['*'])
 * @method Contrato first($columns = ['*'])
*/
class ContratoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idApoderado',
        'urlContrato',
        'urlPagare',
        'urlContratoF',
        'urlPagareF',
        'nroCuotas',
        'fechaContrato',
        'anioAContratar',
        'totalAPagar'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Contrato::class;
    }
}
