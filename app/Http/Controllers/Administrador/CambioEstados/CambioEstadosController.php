<?php

namespace App\Http\Controllers\Administrador\CambioEstados;

use App\Http\Requests\CreateAlumnoContratoRequest;
use App\Http\Requests\UpdateAlumnoContratoRequest;
use App\Repositories\AlumnoContratoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Persona;
class CambioEstadosController extends AppBaseController
{
  

    public function __construct()
    {
        
    }

    /**
     * Cambiamos el estado del apoderado.
     SOLO LO PUEDEN USAR ADMINISTRADORES
     USADO EN resources\views\secretariado\table\blade.php
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, $estado)
    {
        $persona = Persona::find($id);

        if (empty($persona)) {
            Flash::error('Persona no encontrada');
            return redirect()->back();
        }

        $persona->apoderado->estado = $estado;
        $persona->apoderado->save();
        Flash::success('Estado de '. $persona->ApPat . 'cambiado a ' . $persona->apoderado->estado);
        return redirect()->back();
    }


}
