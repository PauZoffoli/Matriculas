<?php

namespace App\Http\Controllers\VistaSecretariado;

use App\Repositories\ContratoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Persona;
use Flash;
use App\Repositories\PersonaRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Helpers\Helper;
use Illuminate\Pagination\AbstractPaginator;
use App\Criteria\Apoderados;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class ApoderadoSecretariadoController extends AppBaseController
{
    private $personaRepository;
    
     public function __construct(PersonaRepository $personaRepo)
    {
         $this->personaRepository = $personaRepo;
            
    }

//https://github.com/andersao/l5-repository/issues/301 PAGINATE AND CRITERIA
     public function index(Request $request)
    { 
        $personas = $this->personaRepository->pushCriteria(new 
            Apoderados\ApoderadoByTipo('ApoderadoPostulante')
            )->with('apoderados.contratos.alumnos');
   
        return view('secretariado.index')   
            ->with('personas',$personas->paginate(15));
    }

    
    public function searchPersona(Request $request) {

        if(empty(trim($request->get('rut')))){

            return redirect()->route('apoSecretariadoContr.index');
        }
        // Sets the parameters from the get request to the variables.
        $rut = $request->get('rut');
        
        $personas = Persona::whereHas('apoderado', function($query) use($rut) {
            $query->where('rut', 'LIKE', '%' .$rut .'%');
        })->get();

        if ( empty($personas->all())) {
           Flash::error('El rut de la persona ingresada no encontró coincidencias, revise que esté correctamente escrito');

           return redirect(route('apoSecretariadoContr.index'));
       }

        return view('secretariado.index')->with('personas',$personas); //Redirigir al index después de buscar
        
    }

    /**
     * Show the form for editing the specified Apoderado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
         $persona =  $this->personaRepository->hasOneRelated('Persona', 'Apoderado', 'apoderado', $id);

        return view('MatriculaPostulante.apoderados.edit')->with('persona', $persona)->with('revisorMatriculando', true); //vamos a la vista edit de apoderados, pero este redirige al controller update 

    }



    

}
