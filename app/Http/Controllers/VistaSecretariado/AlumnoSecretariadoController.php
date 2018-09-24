<?php

namespace App\Http\Controllers\VistaSecretariado;

use App\Repositories\ContratoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Alumno;
use Flash;
use App\Repositories\PersonaRepository;
use App\Repositories\AlumnoRepository;
use Illuminate\Database\Eloquent\Collection;


class AlumnoSecretariadoController extends AppBaseController
{
    private $personaRepository;
    private $apoderadoRepository;
    private $alumnoRepository;

    public function __construct(AlumnoRepository $alumnoRepo)
    {
         $this->alumnoRepository = $alumnoRepo;
            
    }

        public function update($id)
        {
    
       //$alumno = $this->alumnoRepository->findWithoutFail($id);
        //$alumno = $this->alumnoRepository->all()->Where('idApoderado', $id)->get();
        $alumno = Alumno::where('idApoderado', $id)->orderBy('id', 'DESC')->get();
       //dd($alumno);

        if (empty($alumno)) {
            Flash::error('Alumnos no encontrados');

            return redirect(route('apoSecretariadoContr.index')->get());
             }
        
            return view('secretariado.indexContrato')   
            ->with('alumnos', $alumno);
        }

}
