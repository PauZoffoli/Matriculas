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
