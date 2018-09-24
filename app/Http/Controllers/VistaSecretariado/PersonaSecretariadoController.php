<?php

namespace App\Http\Controllers\VistaSecretariado;

use App\Http\Requests;
use App\Repositories\PersonaRepository;
use App\Http\Controllers\AppBaseController;


use App\Http\Requests\CreateDireccionRequest;
use App\Http\Requests\UpdateDireccionRequest;
use App\Repositories\DireccionRepository;

use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Exceptions\Handler;
use App\Models\Persona;
use App\Model\Apoderado;
use Auth;

use Exception;


class PersonaSecretariadoController extends AppBaseController
{
    
    private $PersonaRepository;
    private $direccionRepository;

    public function __construct(PersonaRepository $personaRepo,DireccionRepository $direccionRepo)
    {
        $this->PersonaRepository = $personaRepo;
        $this->direccionRepository = $direccionRepo;

    }

   
    public function index(Request $request)
    {
       abort(404);
           
    }

 
    public function create()
    {
        abort(404);
    }

  
    public function store(CreatePostulacionRequest $request)
    {

       abort(404);

}
    
    public function show($id)
    {
        abort(404);
    }

 
    public function edit($id)
    {
       abort(404);
    }

  
    public function update($id, Request $request)
    {


        $persona = $this->PersonaRepository->findWithoutFail($id);

        if (empty($persona)) {
            Flash::error('Persona no encontrada');

            return redirect(route('secretariado.index'));
        }
        
        $this->direccionRepository->update($request->direccion, $persona->idDireccion);
        unset($request['direccion']);

         $persona = $this->PersonaRepository->update($request->all(), $id);
         $redirect = 'apoSecretariadoContr/'. $id .'/edit';
    
         return redirect($redirect)->with('message', 'Persona editada exitósamente');
    }

    /**
     * Remove the specified Postulacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
     abort(404);
    }
}
