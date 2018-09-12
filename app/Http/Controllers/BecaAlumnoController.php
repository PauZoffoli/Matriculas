<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBecaAlumnoRequest;
use App\Http\Requests\UpdateBecaAlumnoRequest;
use App\Repositories\BecaAlumnoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BecaAlumnoController extends AppBaseController
{
    /** @var  BecaAlumnoRepository */
    private $becaAlumnoRepository;

    public function __construct(BecaAlumnoRepository $becaAlumnoRepo)
    {
        $this->becaAlumnoRepository = $becaAlumnoRepo;
    }

    /**
     * Display a listing of the BecaAlumno.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->becaAlumnoRepository->pushCriteria(new RequestCriteria($request));
        $becaAlumnos = $this->becaAlumnoRepository->all();

        return view('beca_alumnos.index')
            ->with('becaAlumnos', $becaAlumnos);
    }

    /**
     * Show the form for creating a new BecaAlumno.
     *
     * @return Response
     */
    public function create()
    {
        return view('beca_alumnos.create');
    }

    /**
     * Store a newly created BecaAlumno in storage.
     *
     * @param CreateBecaAlumnoRequest $request
     *
     * @return Response
     */
    public function store(CreateBecaAlumnoRequest $request)
    {
        $input = $request->all();

        $becaAlumno = $this->becaAlumnoRepository->create($input);

        Flash::success('Beca Alumno saved successfully.');

        return redirect(route('becaAlumnos.index'));
    }

    /**
     * Display the specified BecaAlumno.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $becaAlumno = $this->becaAlumnoRepository->findWithoutFail($id);

        if (empty($becaAlumno)) {
            Flash::error('Beca Alumno not found');

            return redirect(route('becaAlumnos.index'));
        }

        return view('beca_alumnos.show')->with('becaAlumno', $becaAlumno);
    }

    /**
     * Show the form for editing the specified BecaAlumno.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $becaAlumno = $this->becaAlumnoRepository->findWithoutFail($id);

        if (empty($becaAlumno)) {
            Flash::error('Beca Alumno not found');

            return redirect(route('becaAlumnos.index'));
        }

        return view('beca_alumnos.edit')->with('becaAlumno', $becaAlumno);
    }

    /**
     * Update the specified BecaAlumno in storage.
     *
     * @param  int              $id
     * @param UpdateBecaAlumnoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBecaAlumnoRequest $request)
    {
        $becaAlumno = $this->becaAlumnoRepository->findWithoutFail($id);

        if (empty($becaAlumno)) {
            Flash::error('Beca Alumno not found');

            return redirect(route('becaAlumnos.index'));
        }

        $becaAlumno = $this->becaAlumnoRepository->update($request->all(), $id);

        Flash::success('Beca Alumno updated successfully.');

        return redirect(route('becaAlumnos.index'));
    }

    /**
     * Remove the specified BecaAlumno from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $becaAlumno = $this->becaAlumnoRepository->findWithoutFail($id);

        if (empty($becaAlumno)) {
            Flash::error('Beca Alumno not found');

            return redirect(route('becaAlumnos.index'));
        }

        $this->becaAlumnoRepository->delete($id);

        Flash::success('Beca Alumno deleted successfully.');

        return redirect(route('becaAlumnos.index'));
    }
}
