<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipoRequest;
use App\Http\Requests\UpdateTipoRequest;
use App\Repositories\TipoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TipoController extends AppBaseController
{
    /** @var  TipoRepository */
    private $tipoRepository;

    public function __construct(TipoRepository $tipoRepo)
    {
        $this->tipoRepository = $tipoRepo;
    }

    /**
     * Display a listing of the Tipo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipoRepository->pushCriteria(new RequestCriteria($request));
        $tipos = $this->tipoRepository->all();

        return view('tipos.index')
            ->with('tipos', $tipos);
    }

    /**
     * Show the form for creating a new Tipo.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipos.create');
    }

    /**
     * Store a newly created Tipo in storage.
     *
     * @param CreateTipoRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoRequest $request)
    {
        $input = $request->all();

        $tipo = $this->tipoRepository->create($input);

        Flash::success('Tipo saved successfully.');

        return redirect(route('tipos.index'));
    }

    /**
     * Display the specified Tipo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipo = $this->tipoRepository->findWithoutFail($id);

        if (empty($tipo)) {
            Flash::error('Tipo not found');

            return redirect(route('tipos.index'));
        }

        return view('tipos.show')->with('tipo', $tipo);
    }

    /**
     * Show the form for editing the specified Tipo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipo = $this->tipoRepository->findWithoutFail($id);

        if (empty($tipo)) {
            Flash::error('Tipo not found');

            return redirect(route('tipos.index'));
        }

        return view('tipos.edit')->with('tipo', $tipo);
    }

    /**
     * Update the specified Tipo in storage.
     *
     * @param  int              $id
     * @param UpdateTipoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoRequest $request)
    {
        $tipo = $this->tipoRepository->findWithoutFail($id);

        if (empty($tipo)) {
            Flash::error('Tipo not found');

            return redirect(route('tipos.index'));
        }

        $tipo = $this->tipoRepository->update($request->all(), $id);

        Flash::success('Tipo updated successfully.');

        return redirect(route('tipos.index'));
    }

    /**
     * Remove the specified Tipo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipo = $this->tipoRepository->findWithoutFail($id);

        if (empty($tipo)) {
            Flash::error('Tipo not found');

            return redirect(route('tipos.index'));
        }

        $this->tipoRepository->delete($id);

        Flash::success('Tipo deleted successfully.');

        return redirect(route('tipos.index'));
    }
}
