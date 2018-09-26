<?php

namespace App\Http\Requests\RequestContacto;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Persona;

class CreatePadresRequest extends FormRequest
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
        'SNombre' => 'required|max:40',
        'TNombre' => 'max:40',
        'ApPat' => 'required|max:40',
        'ApMat' => 'max:40',
        'fonoFijo' => 'nullable|digits_between:8,10|numeric',
        'fonoCelu' => 'required|digits_between:8,10|numeric',
        'email' => 'nullable|email|max:100',
        'estadoCivil' => 'required|max:40'
        ];
    }

   /*
       'id' => 'integer',
        'PNombre' => 'string',
        'SNombre' => 'string',
        'TNombre' => 'string',
        'ApPat' => 'string',
        'ApMat' => 'string',
        'fonoFijo' => 'integer',
        'fonoCelu' => 'integer',
        'idUser' => 'integer',
        'rut' => 'string',
        'tipoPersona' => 'string',
        'genero' => 'string',
        'email' => 'string',
        'estadoCivil' => 'string',
        'idDireccion' => 'integer'
        */
}
