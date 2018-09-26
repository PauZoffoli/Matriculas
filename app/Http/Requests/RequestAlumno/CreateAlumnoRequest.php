<?php

namespace App\Http\Requests\RequestAlumno;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Alumno;

class CreateAlumnoRequest extends FormRequest
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
        'parentesco' => 'required',
        'otroParentesco' => 'max:40',
        'repitencias' => '',
        'condicion' => 'min:1|max:40',
        'estado' => 'min:1|max:40',
        'estadoCivilPadres' => 'required|min:1|max:40',
        'idPersona' => 'required|numeric|min:0|max:9',
        'idApoderado' => 'required|numeric|max:9',
        'idCursoActual' => 'required|min:1|max:40',
        'paisDeOrigen' => 'required'
        ];
    }

   /*
        'parentesco' => 'string',
        'otroParentesco' => 'string',
        'repitencias' => 'boolean',
        'condicion' => 'string',
        'estado' => 'string',
        'estadoCivilPadres' => 'string',
        'idPersona' => 'integer',
        'idApoderado' => 'integer',
        'idCursoActual' => 'integer',
        'idCursoPostu' => 'integer',
        'paisDeOrigen' => 'string'
        */
}
