<?php

namespace App\Http\Requests\RequestContacto;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Persona;

class CreateContactoRequest2 extends FormRequest
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
        'PNombreSContactos' => 'required|min:1|max:40',
        'SNombreSContacto' => 'required|min:1|max:40',
        'TNombreSContacto' => 'min:1|max:40',
        'ApPatSContacto' => 'required|min:1|max:40',
        'ApMatSContacto' => 'min:1|max:40',
        'fonoFijoSContacto' => 'numeric|max:9',
        'fonoCeluSContacto' => 'required|numeric|max:9',
        'emailSContacto' => 'required|min:1|max:40',
        'parentescoSContacto' => 'required'
        ];
    }

   /*
         'PNombreSContacto',
        'SNombreSContacto',
        'TNombreSContacto',
        'ApPatSContacto',
        'ApMatSContacto',
        'fonoFijoSContacto',
        'fonoCeluSContacto',
        'emailSContacto',
        'parentescoSContacto'
        */
}
