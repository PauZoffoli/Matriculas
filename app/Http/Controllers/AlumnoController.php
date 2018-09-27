<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Repositories\AlumnoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AlumnoController extends AppBaseController
{
    /** @var  AlumnoRepository */
    private $alumnoRepository;

    public function __construct(AlumnoRepository $alumnoRepo)
    {
        $this->alumnoRepository = $alumnoRepo;
    }

    /**
     * Display a listing of the Alumno.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->alumnoRepository->pushCriteria(new RequestCriteria($request));
        $alumnos = $this->alumnoRepository->all();

        return view('alumnos.index')
            ->with('alumnos', $alumnos);
    }

    /**
     * Show the form for creating a new Alumno.
     *
     * @return Response
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created Alumno in storage.
     *
     * @param CreateAlumnoRequest $request
     *
     * @return Response
     */
    public function store(CreateAlumnoRequest $request)
    {
        $input = $request->all();

        $alumno = $this->alumnoRepository->create($input);

        Flash::success('Alumno saved successfully.');

        return redirect(route('alumnos.index'));
    }

    /**
     * Display the specified Alumno.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $alumno = $this->alumnoRepository->findWithoutFail($id);

        if (empty($alumno)) {
            Flash::error('Alumno not found');

            return redirect(route('alumnos.index'));
        }

        return view('alumnos.show')->with('alumno', $alumno);
    }

    /**
     * Show the form for editing the specified Alumno.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $alumno = $this->alumnoRepository->findWithoutFail($id);

        if (empty($alumno)) {
            Flash::error('Alumno not found');

            return redirect(route('alumnos.index'));
        }

        return view('alumnos.edit')->with('alumno', $alumno);
    }

    /**
     * Update the specified Alumno in storage.
     *
     * @param  int              $id
     * @param UpdateAlumnoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlumnoRequest $request)
    {
        $alumno = $this->alumnoRepository->findWithoutFail($id);

        if (empty($alumno)) {
            Flash::error('Alumno not found');

            return redirect(route('alumnos.index'));
        }

        $alumno = $this->alumnoRepository->update($request->all(), $id);

        Flash::success('Alumno updated successfully.');

        return redirect(route('alumnos.index'));
    }

    /**
     * Remove the specified Alumno from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $alumno = $this->alumnoRepository->findWithoutFail($id);

        if (empty($alumno)) {
            Flash::error('Alumno not found');

            return redirect(route('alumnos.index'));
        }

        $this->alumnoRepository->delete($id);

        Flash::success('Alumno deleted successfully.');

        return redirect(route('alumnos.index'));
    }
}
