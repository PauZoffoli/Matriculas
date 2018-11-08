<?php

namespace App\Http\Requests\RequestsForMatricula\RequestContacto;

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
     *between es del 1 al 10
     * @return array
     */
    public function rules()
    {
       return $rules = [
        'cantidadContactos' => 'required|integer|between:0,1,2',
        'PNombrePContactos' => 'required|min:1|max:50',
        'SNombrePContacto' => 'nullable|min:1|max:50',
        'TNombrePContacto' => 'nullable|min:1|max:50',
        'ApPatPContacto' => 'required|min:1|max:50',
        'ApMatPContacto' => 'nullable|min:1|max:50',
        'fonoFijoPContacto' => 'nullable|numeric|max:9',
        'fonoCeluPContacto' => 'required|numeric|max:9',
        'emailPContacto' => 'nullable|min:1|max:50',
        'parentescoPContacto' => 'required|max:191'
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
