<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRepitenciasRequest;
use App\Http\Requests\UpdateRepitenciasRequest;
use App\Repositories\RepitenciasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RepitenciasController extends AppBaseController
{
    /** @var  RepitenciasRepository */
    private $repitenciasRepository;

    public function __construct(RepitenciasRepository $repitenciasRepo)
    {
        $this->repitenciasRepository = $repitenciasRepo;
    }

    /**
     * Display a listing of the Repitencias.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->repitenciasRepository->pushCriteria(new RequestCriteria($request));
        $repitencias = $this->repitenciasRepository->all();

        return view('repitencias.index')
            ->with('repitencias', $repitencias);
    }

    /**
     * Show the form for creating a new Repitencias.
     *
     * @return Response
     */
    public function create()
    {
        return view('repitencias.create');
    }

    /**
     * Store a newly created Repitencias in storage.
     *
     * @param CreateRepitenciasRequest $request
     *
     * @return Response
     */
    public function store(CreateRepitenciasRequest $request)
    {
        $input = $request->all();

        $repitencias = $this->repitenciasRepository->create($input);

        Flash::success('Repitencias saved successfully.');

        return redirect(route('repitencias.index'));
    }

    /**
     * Display the specified Repitencias.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $repitencias = $this->repitenciasRepository->findWithoutFail($id);

        if (empty($repitencias)) {
            Flash::error('Repitencias not found');

            return redirect(route('repitencias.index'));
        }

        return view('repitencias.show')->with('repitencias', $repitencias);
    }

    /**
     * Show the form for editing the specified Repitencias.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $repitencias = $this->repitenciasRepository->findWithoutFail($id);

        if (empty($repitencias)) {
            Flash::error('Repitencias not found');

            return redirect(route('repitencias.index'));
        }

        return view('repitencias.edit')->with('repitencias', $repitencias);
    }

    /**
     * Update the specified Repitencias in storage.
     *
     * @param  int              $id
     * @param UpdateRepitenciasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRepitenciasRequest $request)
    {
        $repitencias = $this->repitenciasRepository->findWithoutFail($id);

        if (empty($repitencias)) {
            Flash::error('Repitencias not found');

            return redirect(route('repitencias.index'));
        }

        $repitencias = $this->repitenciasRepository->update($request->all(), $id);

        Flash::success('Repitencias updated successfully.');

        return redirect(route('repitencias.index'));
    }

    /**
     * Remove the specified Repitencias from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $repitencias = $this->repitenciasRepository->findWithoutFail($id);

        if (empty($repitencias)) {
            Flash::error('Repitencias not found');

            return redirect(route('repitencias.index'));
        }

        $this->repitenciasRepository->delete($id);

        Flash::success('Repitencias deleted successfully.');

        return redirect(route('repitencias.index'));
    }
}
