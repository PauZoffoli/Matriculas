<?php

namespace App\Http\Requests\RequestApoderado;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Persona;
use App\Models\Apoderado;

class CreateApoderadoRequest extends FormRequest
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
        'nivelEducacional' => 'required|min:1|max:40',
        'profesion' => 'required|min:1|max:100',
        'paisDeOrigen' => 'required|min:1|max:40',
        'idPersona' => 'numeric|min:1|max:40',
        'estado' => 'required|min:1|max:40'
        ];
    }

   /*
       'nivelEducacional' => 'string',
        'profesion' => 'string',
        'paisDeOrigen' => 'string',
        'idPersona' => 'integer',
        'estado' => 'string'
        */
}
