<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDireccionRequest;
use App\Http\Requests\UpdateDireccionRequest;
use App\Repositories\DireccionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DireccionController extends AppBaseController
{
    /** @var  DireccionRepository */
    private $direccionRepository;

    public function __construct(DireccionRepository $direccionRepo)
    {
        $this->direccionRepository = $direccionRepo;
    }

    /**
     * Display a listing of the Direccion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->direccionRepository->pushCriteria(new RequestCriteria($request));
        $direccions = $this->direccionRepository->all();

        return view('direccions.index')
            ->with('direccions', $direccions);
    }

    /**
     * Show the form for creating a new Direccion.
     *
     * @return Response
     */
    public function create()
    {
        return view('direccions.create');
    }

    /**
     * Store a newly created Direccion in storage.
     *
     * @param CreateDireccionRequest $request
     *
     * @return Response
     */
    public function store(CreateDireccionRequest $request)
    {
        $input = $request->all();

        $direccion = $this->direccionRepository->create($input);

        Flash::success('Direccion saved successfully.');

        return redirect(route('direccions.index'));
    }

    /**
     * Display the specified Direccion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $direccion = $this->direccionRepository->findWithoutFail($id);

        if (empty($direccion)) {
            Flash::error('Direccion not found');

            return redirect(route('direccions.index'));
        }

        return view('direccions.show')->with('direccion', $direccion);
    }

    /**
     * Show the form for editing the specified Direccion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $direccion = $this->direccionRepository->findWithoutFail($id);

        if (empty($direccion)) {
            Flash::error('Direccion not found');

            return redirect(route('direccions.index'));
        }

        return view('direccions.edit')->with('direccion', $direccion);
    }

    /**
     * Update the specified Direccion in storage.
     *
     * @param  int              $id
     * @param UpdateDireccionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDireccionRequest $request)
    {
        $direccion = $this->direccionRepository->findWithoutFail($id);

        if (empty($direccion)) {
            Flash::error('Direccion not found');

            return redirect(route('direccions.index'));
        }

        $direccion = $this->direccionRepository->update($request->all(), $id);

        Flash::success('Direccion updated successfully.');

        return redirect(route('direccions.index'));
    }

    /**
     * Remove the specified Direccion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $direccion = $this->direccionRepository->findWithoutFail($id);

        if (empty($direccion)) {
            Flash::error('Direccion not found');

            return redirect(route('direccions.index'));
        }

        $this->direccionRepository->delete($id);

        Flash::success('Direccion deleted successfully.');

        return redirect(route('direccions.index'));
    }
}
