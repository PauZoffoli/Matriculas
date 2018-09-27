<?php

namespace App\Http\Requests\RequestPersona;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Persona;

class CreatePersonaRequest extends FormRequest
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
        'fonoCelu' => 'required|digits_between:8,10|numeric',
        'email' => 'required|min:1|email|max:100',
        'fechaNacimiento' => ['required','date'],
        ];

    }
}

