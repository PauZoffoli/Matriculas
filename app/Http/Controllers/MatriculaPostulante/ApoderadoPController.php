<?php

namespace App\Http\Controllers\MatriculaPostulante;

use App\Http\Requests\CreateApoderadoRequest;
use App\Http\Requests\UpdateApoderadoRequest;
use App\Repositories\ApoderadoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ApoderadoPController extends AppBaseController
{
    /** @var  ApoderadoRepository */
    private $apoderadoRepository;

    public function __construct(ApoderadoRepository $apoderadoRepo)
    {
        $this->apoderadoRepository = $apoderadoRepo;
    }

    /**
     * Display a listing of the Apoderado.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->apoderadoRepository->pushCriteria(new RequestCriteria($request));
        $apoderados = $this->apoderadoRepository->all();

        return view('apoderados.index')
            ->with('apoderados', $apoderados);
    }

    /**
     * Show the form for creating a new Apoderado.
     *
     * @return Response
     */
    public function create()
    {
        return view('apoderados.create');
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
        $input = $request->all();

        $apoderado = $this->apoderadoRepository->create($input);

        Flash::success('Apoderado saved successfully.');

        return redirect(route('apoderados.index'));
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
        $apoderado = $this->apoderadoRepository->findWithoutFail($id);

        if (empty($apoderado)) {
            Flash::error('Apoderado not found');

            return redirect(route('apoderados.index'));
        }

        return view('apoderados.show')->with('apoderado', $apoderado);
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
        $apoderado = $this->apoderadoRepository->findWithoutFail($id);

        if (empty($apoderado)) {
            Flash::error('Apoderado not found');

            return redirect(route('apoderados.index'));
        }

        return view('apoderados.edit')->with('apoderado', $apoderado);
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
