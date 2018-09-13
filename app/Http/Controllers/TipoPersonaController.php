<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipoPersonaRequest;
use App\Http\Requests\UpdateTipoPersonaRequest;
use App\Repositories\TipoPersonaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TipoPersonaController extends AppBaseController
{
    /** @var  TipoPersonaRepository */
    private $tipoPersonaRepository;

    public function __construct(TipoPersonaRepository $tipoPersonaRepo)
    {
        $this->tipoPersonaRepository = $tipoPersonaRepo;
    }

    /**
     * Display a listing of the TipoPersona.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipoPersonaRepository->pushCriteria(new RequestCriteria($request));
        $tipoPersonas = $this->tipoPersonaRepository->all();

        return view('tipo_personas.index')
            ->with('tipoPersonas', $tipoPersonas);
    }

    /**
     * Show the form for creating a new TipoPersona.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_personas.create');
    }

    /**
     * Store a newly created TipoPersona in storage.
     *
     * @param CreateTipoPersonaRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoPersonaRequest $request)
    {
        $input = $request->all();

        $tipoPersona = $this->tipoPersonaRepository->create($input);

        Flash::success('Tipo Persona saved successfully.');

        return redirect(route('tipoPersonas.index'));
    }

    /**
     * Display the specified TipoPersona.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoPersona = $this->tipoPersonaRepository->findWithoutFail($id);

        if (empty($tipoPersona)) {
            Flash::error('Tipo Persona not found');

            return redirect(route('tipoPersonas.index'));
        }

        return view('tipo_personas.show')->with('tipoPersona', $tipoPersona);
    }

    /**
     * Show the form for editing the specified TipoPersona.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoPersona = $this->tipoPersonaRepository->findWithoutFail($id);

        if (empty($tipoPersona)) {
            Flash::error('Tipo Persona not found');

            return redirect(route('tipoPersonas.index'));
        }

        return view('tipo_personas.edit')->with('tipoPersona', $tipoPersona);
    }

    /**
     * Update the specified TipoPersona in storage.
     *
     * @param  int              $id
     * @param UpdateTipoPersonaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoPersonaRequest $request)
    {
        $tipoPersona = $this->tipoPersonaRepository->findWithoutFail($id);

        if (empty($tipoPersona)) {
            Flash::error('Tipo Persona not found');

            return redirect(route('tipoPersonas.index'));
        }

        $tipoPersona = $this->tipoPersonaRepository->update($request->all(), $id);

        Flash::success('Tipo Persona updated successfully.');

        return redirect(route('tipoPersonas.index'));
    }

    /**
     * Remove the specified TipoPersona from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoPersona = $this->tipoPersonaRepository->findWithoutFail($id);

        if (empty($tipoPersona)) {
            Flash::error('Tipo Persona not found');

            return redirect(route('tipoPersonas.index'));
        }

        $this->tipoPersonaRepository->delete($id);

        Flash::success('Tipo Persona deleted successfully.');

        return redirect(route('tipoPersonas.index'));
    }
}
