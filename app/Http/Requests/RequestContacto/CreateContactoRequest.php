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
        'PNombre' => 'required|min:1',
        'ApPat' => 'required'
        
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
