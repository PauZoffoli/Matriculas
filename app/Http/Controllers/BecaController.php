<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBecaRequest;
use App\Http\Requests\UpdateBecaRequest;
use App\Repositories\BecaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BecaController extends AppBaseController
{
    /** @var  BecaRepository */
    private $becaRepository;

    public function __construct(BecaRepository $becaRepo)
    {
        $this->becaRepository = $becaRepo;
    }

    /**
     * Display a listing of the Beca.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->becaRepository->pushCriteria(new RequestCriteria($request));
        $becas = $this->becaRepository->all();

        return view('becas.index')
            ->with('becas', $becas);
    }

    /**
     * Show the form for creating a new Beca.
     *
     * @return Response
     */
    public function create()
    {
        return view('becas.create');
    }

    /**
     * Store a newly created Beca in storage.
     *
     * @param CreateBecaRequest $request
     *
     * @return Response
     */
    public function store(CreateBecaRequest $request)
    {
        $input = $request->all();

        $beca = $this->becaRepository->create($input);

        Flash::success('Beca saved successfully.');

        return redirect(route('becas.index'));
    }

    /**
     * Display the specified Beca.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $beca = $this->becaRepository->findWithoutFail($id);

        if (empty($beca)) {
            Flash::error('Beca not found');

            return redirect(route('becas.index'));
        }

        return view('becas.show')->with('beca', $beca);
    }

    /**
     * Show the form for editing the specified Beca.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $beca = $this->becaRepository->findWithoutFail($id);

        if (empty($beca)) {
            Flash::error('Beca not found');

            return redirect(route('becas.index'));
        }

        return view('becas.edit')->with('beca', $beca);
    }

    /**
     * Update the specified Beca in storage.
     *
     * @param  int              $id
     * @param UpdateBecaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBecaRequest $request)
    {
        $beca = $this->becaRepository->findWithoutFail($id);

        if (empty($beca)) {
            Flash::error('Beca not found');

            return redirect(route('becas.index'));
        }

        $beca = $this->becaRepository->update($request->all(), $id);

        Flash::success('Beca updated successfully.');

        return redirect(route('becas.index'));
    }

    /**
     * Remove the specified Beca from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $beca = $this->becaRepository->findWithoutFail($id);

        if (empty($beca)) {
            Flash::error('Beca not found');

            return redirect(route('becas.index'));
        }

        $this->becaRepository->delete($id);

        Flash::success('Beca deleted successfully.');

        return redirect(route('becas.index'));
    }
}
