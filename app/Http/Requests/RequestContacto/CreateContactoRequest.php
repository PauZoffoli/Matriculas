<?php

namespace App\Http\Requests\RequestContacto;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Persona;

class CreateContactoRequest extends FormRequest
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
        'cantidadContactos' => 'required|integer|between:1,2',
        'PNombrePContactos' => 'required|min:1|max:40',
        'SNombrePContacto' => 'required|min:1|max:40',
        'TNombrePContacto' => 'min:1|max:40',
        'ApPatPContacto' => 'required|min:1|max:40',
        'ApMatPContacto' => 'min:1|max:40',
        'fonoFijoPContacto' => 'numeric|max:9',
        'fonoCeluPContacto' => 'required|numeric|max:9',
        'emailPContacto' => 'required|min:1|max:40',
        'parentescoPContacto' => 'required'
        ];
    }

   /*
        'cantidadContactos',
        'PNombrePContacto',
        'SNombrePContacto',
        'TNombrePContacto',
        'ApPatPContacto',
        'ApMatPContacto',
        'fonoFijoPContacto',
        'fonoCeluPContacto',
        'emailPContacto',
        'parentescoPContacto',
        */
}
