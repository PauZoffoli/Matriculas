<?php

namespace App\Http\Controllers\VistaSecretariado;

use App\Repositories\ContratoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Apoderado;

class ApoderadoSecretariadoController extends Controller
{
    private $personaRepository;
    private $apoderadoRepository;

     public function __construct(PersonaRepository $personaRepo,ApoderadoRepository $apoderadoRepo)
    {
         $this->personaRepository = $personaRepo;
         $this->apoderadoRepository = $apoderadoRepo;   
    }

     public function index(Request $request)
    { 
         $personas = Persona::orderBy('id', 'DESC')->where('tipoPersona', 'Apoderado')->paginate(10);
         
        return view('secretariado.index')   
            ->with('personas', $personas, 'personas');
    }

    public function searchApoderado(Request $request) {

        if(empty(trim($request->get('rut')))){

            return redirect()->route('apoSecretariadoContr.index');
        }
        // Sets the parameters from the get request to the variables.
        $rutApoderado = $request->get('rutApoderado');
        
        $contratos = Contrato::whereHas('Apoderado', function($query) use($rutApoderado) {
            $query->where('rutApo', $rutApoderado);
        })->get();

        if ( empty($postulacions->all())) {
           Flash::error('El rut del apoderado ingresado no encontró coincidencias, revise que esté correctamente escrito');

           return redirect(route('apoSecretariadoContr.index'));
       }

        return view('inscripcions.revisor.index')->with('postulacions',$postulacions); //Redirigir al index después de buscar
        
    }

}
