<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlumnoResponsableRequest;
use App\Http\Requests\UpdateAlumnoResponsableRequest;
use App\Repositories\AlumnoResponsableRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AlumnoResponsableController extends AppBaseController
{
    /** @var  AlumnoResponsableRepository */
    private $alumnoResponsableRepository;

    public function __construct(AlumnoResponsableRepository $alumnoResponsableRepo)
    {
        $this->alumnoResponsableRepository = $alumnoResponsableRepo;
    }

    /**
     * Display a listing of the AlumnoResponsable.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->alumnoResponsableRepository->pushCriteria(new RequestCriteria($request));
        $alumnoResponsables = $this->alumnoResponsableRepository->all();

        return view('alumno_responsables.index')
            ->with('alumnoResponsables', $alumnoResponsables);
    }

    /**
     * Show the form for creating a new AlumnoResponsable.
     *
     * @return Response
     */
    public function create()
    {
        return view('alumno_responsables.create');
    }

    /**
     * Store a newly created AlumnoResponsable in storage.
     *
     * @param CreateAlumnoResponsableRequest $request
     *
     * @return Response
     */
    public function store(CreateAlumnoResponsableRequest $request)
    {
        $input = $request->all();

        $alumnoResponsable = $this->alumnoResponsableRepository->create($input);

        Flash::success('Alumno Responsable saved successfully.');

        return redirect(route('alumnoResponsables.index'));
    }

    /**
     * Display the specified AlumnoResponsable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $alumnoResponsable = $this->alumnoResponsableRepository->findWithoutFail($id);

        if (empty($alumnoResponsable)) {
            Flash::error('Alumno Responsable not found');

            return redirect(route('alumnoResponsables.index'));
        }

        return view('alumno_responsables.show')->with('alumnoResponsable', $alumnoResponsable);
    }

    /**
     * Show the form for editing the specified AlumnoResponsable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $alumnoResponsable = $this->alumnoResponsableRepository->findWithoutFail($id);

        if (empty($alumnoResponsable)) {
            Flash::error('Alumno Responsable not found');

            return redirect(route('alumnoResponsables.index'));
        }

        return view('alumno_responsables.edit')->with('alumnoResponsable', $alumnoResponsable);
    }

    /**
     * Update the specified AlumnoResponsable in storage.
     *
     * @param  int              $id
     * @param UpdateAlumnoResponsableRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlumnoResponsableRequest $request)
    {
        $alumnoResponsable = $this->alumnoResponsableRepository->findWithoutFail($id);

        if (empty($alumnoResponsable)) {
            Flash::error('Alumno Responsable not found');

            return redirect(route('alumnoResponsables.index'));
        }

        $alumnoResponsable = $this->alumnoResponsableRepository->update($request->all(), $id);

        Flash::success('Alumno Responsable updated successfully.');

        return redirect(route('alumnoResponsables.index'));
    }

    /**
     * Remove the specified AlumnoResponsable from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $alumnoResponsable = $this->alumnoResponsableRepository->findWithoutFail($id);

        if (empty($alumnoResponsable)) {
            Flash::error('Alumno Responsable not found');

            return redirect(route('alumnoResponsables.index'));
        }

        $this->alumnoResponsableRepository->delete($id);

        Flash::success('Alumno Responsable deleted successfully.');

        return redirect(route('alumnoResponsables.index'));
    }
}
