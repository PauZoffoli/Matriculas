<?php

namespace App\Http\Requests\RequestsForMatricula\RequestFicha;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\FichaAlumno;

class CreateFichaAlumnoRequest extends FormRequest
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
        'ingresoFamiliarM' => 'required|digits_between:1,11',
        'causas' => 'nullable|max:100',
        'nroConvivientes' => 'required|digits_between:1,2',
        'totalHijos' => 'required|digits_between:1,2',
        'nroDeHijo' => 'required|digits_between:1,2',
        'nroHermanoIDOP' => 'digits_between:1,2',
        'tenenciaVivienda' => 'max:80|min:3',
        'estudiaCon' => 'required|max:100',
        'isapreFonasa' => 'required|max:100',
        'seguroComple' => 'required|max:100',
        'enfermedades' => 'nullable|max:191',
        'medicamentos' => 'nullable|max:191',
        'esAlergico' => 'required|boolean',
        'AlergicoA' => 'nullable|max:191',
        'grupoSanguineo' => 'required|max:100',
        'viveConPadre' => 'required|boolean',
        'viveConMadre' => 'required|boolean',
        'viveConAbuelos' => 'required|boolean',
        'viveConTios' => 'required|boolean',
        'viveConTutor' => 'required|boolean',
        'observacionesSalud' => 'nullable|min:3|max:191',
        ];
    }

   /*
      'id' => 'integer',
        'ingresoFamiliarM' => 'integer',
        'causas' => 'integer',
        'nroConvivientes' => 'integer',
        'totalHijos' => 'integer',
        'nroDeHijo' => 'integer',
        'nroHermaIDOP' => 'integer',
        'tenenciaVivienda' => 'string',
        'estudiaCon' => 'string',
        'isapreFonasa' => 'string',
        'seguroComple' => 'boolean',
        'enfermedades' => 'string',
        'medicamentos' => 'string',
        'esAlergico' => 'boolean',
        'AlergicoA' => 'string',
        'grupoSanguineo' => 'string',
        'idAlumno' => 'integer',
        'viveConPadre' => 'boolean',
        'viveConMadre' => 'boolean',
        'viveConAbuelos' => 'boolean',
        'viveConTios' => 'boolean',
        'viveConTutor' => 'boolean',
        'observacionesSalud'  => 'string',
        'cantidadContactos'  => 'integer',
        'PNombrePContacto'  => 'string',
        'SNombrePContacto' => 'string',
        'TNombrePContacto' => 'string',
        'ApPatPContacto' => 'string',
        'ApMatPContacto' => 'string',
        'fonoFijoPContacto' => 'integer',
        'fonoCeluPContacto' => 'integer',
        'emailPContacto'   => 'string',
        'parentescoPContacto' => 'string',

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
