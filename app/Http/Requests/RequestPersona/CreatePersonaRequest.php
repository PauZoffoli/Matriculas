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
        'PNombreApod' => 'required'|'min:1'|'max:40',
        'SNombreApod' => 'nullable'|'min:1'|'max:40',
        'TNombreApod' => 'nullable'|'max:40',
        'apPatApo' => 'required'|'min:1'|'max:40',
        'apMatApo' => 'nullable'|'min:1'|'max:40',
        'fonoFijoApo' => 'nullable'|'digits_between:8,10'|'numeric',
        'fonoCeluApo' => 'required'|'digits_between:8,10'|'numeric',
        'rutApo' => 'required'|'min:7'|'max:11',
        'correoApo' => 'nullable'|'min:1'|'email'|'max:100'
        ];
    }
}

