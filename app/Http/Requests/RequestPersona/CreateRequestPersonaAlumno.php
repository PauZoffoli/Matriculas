<?php

namespace App\Http\Requests\RequestPersona;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Persona;

class CreateRequestPersonaAlumno extends FormRequest
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
        'PNombreApod' => 'required|max:40',
        'SNombreApod' => 'nullable|max:40',
        'TNombreApod' => 'nullable|max:40',
        'apPatApo' => 'required|max:40',
        'apMatApo' => 'nullable|max:40',
        'fonoFijoApo' => 'nullable|digits_between:8,10|numeric',
        'fonoCeluApo' => 'nullable|digits_between:8,10|numeric',
        'rutApo' => 'required|min:7|max:11',
        'correoApo' => 'nullable|min:1|email|max:100'
        ];

    }
}

