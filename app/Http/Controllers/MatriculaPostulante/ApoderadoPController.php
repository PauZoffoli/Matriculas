<?php

namespace App\Http\Controllers\MatriculaPostulante;

use App\Http\Requests\CreateApoderadoRequest;
use App\Http\Requests\UpdateApoderadoRequest;
use App\Repositories\ApoderadoRepository;
use App\Http\Requests\CreatePersonaRequest;
use App\Http\Requests\UpdatePersonaRequest;
use App\Repositories\PersonaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ApoderadoPController extends AppBaseController
{

//Route::resource('apoderadosPostulantes', 'MatriculaPostulante\ApoderadoPController');
    
    /** @var  ApoderadoRepository */
    private $apoderadoRepository;
      /** @var  PersonaRepository */
    private $personaRepository;

    public function __construct(ApoderadoRepository $apoderadoRepo, PersonaRepository $personaRepo)
    {
        $this->personaRepository = $personaRepo;
        $this->apoderadoRepository = $apoderadoRepo;

    }

    /**

    /**
     * Display a listing of the Apoderado.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        abort(404);
    }

    /**
     * Show the form for creating a new Apoderado.
     *
     * @return Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created Apoderado in storage.
     *
     * @param CreateApoderadoRequest $request
     *
     * @return Response
     */
    public function store(CreateApoderadoRequest $request)
    {
        abort(404);
    }

    /**
     * Display the specified Apoderado.
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
     * Show the form for editing the specified Apoderado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $persona = $this->personaRepository->findWithoutFail($id);

        if (empty($persona)) {
            Flash::error('Persona not found');

            return redirect(route('personas.index'));
        }

        return view('MatriculaPostulante.apoderados.edit')->with('apoderado', $persona);

    }

    /**
     * Update the specified Apoderado in storage.
     *
     * @param  int              $id
     * @param UpdateApoderadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateApoderadoRequest $request)
    {
        $apoderado = $this->apoderadoRepository->findWithoutFail($id);

        if (empty($apoderado)) {
            Flash::error('Apoderado not found');

            return redirect(route('apoderados.index'));
        }

        $apoderado = $this->apoderadoRepository->update($request->all(), $id);

        Flash::success('Apoderado updated successfully.');

        return redirect(route('apoderados.index'));
    }

    /**
     * Remove the specified Apoderado from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $apoderado = $this->apoderadoRepository->findWithoutFail($id);

        if (empty($apoderado)) {
            Flash::error('Apoderado not found');

            return redirect(route('apoderados.index'));
        }

        $this->apoderadoRepository->delete($id);

        Flash::success('Apoderado deleted successfully.');

        return redirect(route('apoderados.index'));
    }
}
