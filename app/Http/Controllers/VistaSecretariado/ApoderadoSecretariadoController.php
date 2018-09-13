<?php

namespace App\Http\Controllers\VistaSecretariado;

use App\Repositories\ContratoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Apoderado;

class ApoderadoSecretariadoController extends Controller
{
    private $apoderadoRepository;

     public function __construct(PostulacionRepository $postulacionRepo,CandidatoRepository $candidatoRepo,ApoderadoRepository $apoderadoRepo)
    {
         $this->apoderadoRepository = $apoderadoRepo;   
    }

     public function index(Request $request)
    { 
         $apoderados = Apoderado::orderBy('id', 'DESC')->paginate(10);
         
        return view('secretariado.index')
            ->with('apoderados', $apoderados, 'apoderados');
    }

    public function searchApoderado(Request $request) {

        if(empty(trim($request->get('rutApoderado')))){

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
