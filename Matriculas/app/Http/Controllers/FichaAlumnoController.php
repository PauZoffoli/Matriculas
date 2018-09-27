<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFichaAlumnoRequest;
use App\Http\Requests\UpdateFichaAlumnoRequest;
use App\Repositories\FichaAlumnoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FichaAlumnoController extends AppBaseController
{
    /** @var  FichaAlumnoRepository */
    private $fichaAlumnoRepository;

    public function __construct(FichaAlumnoRepository $fichaAlumnoRepo)
    {
        $this->fichaAlumnoRepository = $fichaAlumnoRepo;
    }

    /**
     * Display a listing of the FichaAlumno.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->fichaAlumnoRepository->pushCriteria(new RequestCriteria($request));
        $fichaAlumnos = $this->fichaAlumnoRepository->all();

        return view('ficha_alumnos.index')
            ->with('fichaAlumnos', $fichaAlumnos);
    }

    /**
     * Show the form for creating a new FichaAlumno.
     *
     * @return Response
     */
    public function create()
    {
        return view('ficha_alumnos.create');
    }

    /**
     * Store a newly created FichaAlumno in storage.
     *
     * @param CreateFichaAlumnoRequest $request
     *
     * @return Response
     */
    public function store(CreateFichaAlumnoRequest $request)
    {
        $input = $request->all();

        $fichaAlumno = $this->fichaAlumnoRepository->create($input);

        Flash::success('Ficha Alumno saved successfully.');

        return redirect(route('fichaAlumnos.index'));
    }

    /**
     * Display the specified FichaAlumno.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fichaAlumno = $this->fichaAlumnoRepository->findWithoutFail($id);

        if (empty($fichaAlumno)) {
            Flash::error('Ficha Alumno not found');

            return redirect(route('fichaAlumnos.index'));
        }

        return view('ficha_alumnos.show')->with('fichaAlumno', $fichaAlumno);
    }

    /**
     * Show the form for editing the specified FichaAlumno.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fichaAlumno = $this->fichaAlumnoRepository->findWithoutFail($id);

        if (empty($fichaAlumno)) {
            Flash::error('Ficha Alumno not found');

            return redirect(route('fichaAlumnos.index'));
        }

        return view('ficha_alumnos.edit')->with('fichaAlumno', $fichaAlumno);
    }

    /**
     * Update the specified FichaAlumno in storage.
     *
     * @param  int              $id
     * @param UpdateFichaAlumnoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFichaAlumnoRequest $request)
    {
        $fichaAlumno = $this->fichaAlumnoRepository->findWithoutFail($id);

        if (empty($fichaAlumno)) {
            Flash::error('Ficha Alumno not found');

            return redirect(route('fichaAlumnos.index'));
        }

        $fichaAlumno = $this->fichaAlumnoRepository->update($request->all(), $id);

        Flash::success('Ficha Alumno updated successfully.');

        return redirect(route('fichaAlumnos.index'));
    }

    /**
     * Remove the specified FichaAlumno from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fichaAlumno = $this->fichaAlumnoRepository->findWithoutFail($id);

        if (empty($fichaAlumno)) {
            Flash::error('Ficha Alumno not found');

            return redirect(route('fichaAlumnos.index'));
        }

        $this->fichaAlumnoRepository->delete($id);

        Flash::success('Ficha Alumno deleted successfully.');

        return redirect(route('fichaAlumnos.index'));
    }
}
