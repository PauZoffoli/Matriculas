<?php

namespace App\Http\Requests\RequestAlumno;

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
        'ingresoFamiliarM' => 'required|digits_between:1,11|numeric',
        'causas' => 'max:100',
        'nroConvivientes' => 'required',
        'totalHijos' => 'required',
        'nroDeHijo' => 'required',
        'nroHermanoIDOP' => 'required',
        'tenenciaVivienda' => 'required',
        'estudiaCon' => 'required',
        'isapreFonasa' => 'required',
        'seguroComple' => 'required',
        'enfermedades' => 'max:191',
        'medicamentos' => 'max:191',
        'esAlergico' => 'required',
        'AlergicoA' => 'max:191',
        'grupoSanguineo' => 'required',
        'idAlumno' => 'required',
        'viveConPadre' => 'required',
        'viveConMadre' => 'required',
        'viveConAbuelos' => 'required',
        'viveConTios' => 'required',
        'viveConTutor' => 'required',
        'observacionesSalud' => 'required|max:191'
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
