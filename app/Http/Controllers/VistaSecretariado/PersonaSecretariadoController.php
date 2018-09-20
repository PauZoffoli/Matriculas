<?php

namespace App\Http\Controllers\VistaSecretariado;

use App\Http\Requests
use App\Repositories\PersonaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Exceptions\Handler;
use App\Models\Persona;
use Auth;

use Exception;


class InscripcionRevisorPostulacionController extends AppBaseController
{
    /** @var  PostulacionRepository */
    private $personaRepository;

    public function __construct(PersonaRepository $personaRepo)
    {
        $this->personaRepository = $personaRepo;

    }



    /**
     * Display a listing of the Postulacion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
       abort(404);
           
    }

     /**
     * Show the form for creating a new Postulacion.
     *
     * @return Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created Postulacion in storage.
     *
     * @param CreatePostulacionRequest $request
     *
     * @return Response
     */
    public function store(CreatePostulacionRequest $request)
    {

       abort(404);

}
    /**
     * Display the specified Postulacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified Postulacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
       abort(404);
    }

    /**
     * Update the specified Postulacion in storage.
     *
     * @param  int              $id
     * @param UpdatePostulacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonaRequest $request)
    {


        $postulacion = $this->postulacionRepository->findWithoutFail($id);

        if (empty($postulacion)) {
            Flash::error('Persona no encontrada');

            return redirect(route('secretariado.index'));
        }

        //$request['nombreFunc'] = $request['nombreFunc'];

        //$postulacion = $this->postulacionRepository->update($request->all(), $id);
     
        //dd($postulacion);
        $redirect = 'apoSecretariadoContr/'. $id .'/edit';
       //dd( $redirect);

         return redirect($redirect)->with('message', 'Postulación editada exitósamente');
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
