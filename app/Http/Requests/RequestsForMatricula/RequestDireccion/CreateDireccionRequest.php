<?php

namespace App\Http\Requests\RequestsForMatricula\RequestDireccion;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Direccion;

class CreateDireccionRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       return $rules = [
        'idComuna' => 'required|numeric|digits_between:1,11',
        'calle' => 'required|max:191',
        'nroCalle' => 'required|max:50',
        'bloqueTorre' => 'max:30',
        'dpto' => 'max:30'
        ];
    }

   /*
        'id' => 'integer',
        'idComuna' => 'integer',
        'calle' => 'string',
        'nroCalle' => 'string',
        'bloqueTorre' => 'string',
        'dpto' => 'string'
        */
}
