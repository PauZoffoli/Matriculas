<?php

namespace App\Http\Requests\RequestsForMatricula\RequestPersona;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Persona;

class CreatePersonaAlumnoRequest extends FormRequest
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
        'PNombre' => 'required|max:40',
        'SNombre' => 'nullable|max:40',
        'TNombre' => 'nullable|max:40',
        'ApPat' => 'required|max:40',
        'ApMat' => 'nullable|max:40',
        'fonoFijo' => 'nullable|digits_between:8,10|numeric',
        'fonoCelu' => 'nullable|digits_between:8,10|numeric',
        'email' => 'nullable|min:1|email|max:100'
        ];

    }
}

