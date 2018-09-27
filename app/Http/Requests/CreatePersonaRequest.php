<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Persona;
use Auth;
class CreatePersonaRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //para que nadie más pueda cambiar los datos de otro apoderado
        //METODO DEPRECADO POR QUE JUAN ENCONTRÓ SOLUCIÓN
       // return Persona::where('id', $this->id)  ->where('idUser', $this->user()->id)->exists();

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Persona::$rules;
    }
}
