<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlumnoContratoRequest;
use App\Http\Requests\UpdateAlumnoContratoRequest;
use App\Repositories\AlumnoContratoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AlumnoContratoController extends AppBaseController
{
    /** @var  AlumnoContratoRepository */
    private $alumnoContratoRepository;

    public function __construct(AlumnoContratoRepository $alumnoContratoRepo)
    {
        $this->alumnoContratoRepository = $alumnoContratoRepo;
    }

    /**
     * Display a listing of the AlumnoContrato.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->alumnoContratoRepository->pushCriteria(new RequestCriteria($request));
        $alumnoContratos = $this->alumnoContratoRepository->all();

        return view('alumno_contratos.index')
            ->with('alumnoContratos', $alumnoContratos);
    }

    /**
     * Show the form for creating a new AlumnoContrato.
     *
     * @return Response
     */
    public function create()
    {
        return view('alumno_contratos.create');
    }

    /**
     * Store a newly created AlumnoContrato in storage.
     *
     * @param CreateAlumnoContratoRequest $request
     *
     * @return Response
     */
    public function store(CreateAlumnoContratoRequest $request)
    {
        $input = $request->all();

        $alumnoContrato = $this->alumnoContratoRepository->create($input);

        Flash::success('Alumno Contrato saved successfully.');

        return redirect(route('alumnoContratos.index'));
    }

    /**
     * Display the specified AlumnoContrato.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $alumnoContrato = $this->alumnoContratoRepository->findWithoutFail($id);

        if (empty($alumnoContrato)) {
            Flash::error('Alumno Contrato not found');

            return redirect(route('alumnoContratos.index'));
        }

        return view('alumno_contratos.show')->with('alumnoContrato', $alumnoContrato);
    }

    /**
     * Show the form for editing the specified AlumnoContrato.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $alumnoContrato = $this->alumnoContratoRepository->findWithoutFail($id);

        if (empty($alumnoContrato)) {
            Flash::error('Alumno Contrato not found');

            return redirect(route('alumnoContratos.index'));
        }

        return view('alumno_contratos.edit')->with('alumnoContrato', $alumnoContrato);
    }

    /**
     * Update the specified AlumnoContrato in storage.
     *
     * @param  int              $id
     * @param UpdateAlumnoContratoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlumnoContratoRequest $request)
    {
        $alumnoContrato = $this->alumnoContratoRepository->findWithoutFail($id);

        if (empty($alumnoContrato)) {
            Flash::error('Alumno Contrato not found');

            return redirect(route('alumnoContratos.index'));
        }

        $alumnoContrato = $this->alumnoContratoRepository->update($request->all(), $id);

        Flash::success('Alumno Contrato updated successfully.');

        return redirect(route('alumnoContratos.index'));
    }

    /**
     * Remove the specified AlumnoContrato from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $alumnoContrato = $this->alumnoContratoRepository->findWithoutFail($id);

        if (empty($alumnoContrato)) {
            Flash::error('Alumno Contrato not found');

            return redirect(route('alumnoContratos.index'));
        }

        $this->alumnoContratoRepository->delete($id);

        Flash::success('Alumno Contrato deleted successfully.');

        return redirect(route('alumnoContratos.index'));
    }
}
