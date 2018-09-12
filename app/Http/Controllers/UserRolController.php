<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRolRequest;
use App\Http\Requests\UpdateUserRolRequest;
use App\Repositories\UserRolRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UserRolController extends AppBaseController
{
    /** @var  UserRolRepository */
    private $userRolRepository;

    public function __construct(UserRolRepository $userRolRepo)
    {
        $this->userRolRepository = $userRolRepo;
    }

    /**
     * Display a listing of the UserRol.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userRolRepository->pushCriteria(new RequestCriteria($request));
        $userRols = $this->userRolRepository->all();

        return view('user_rols.index')
            ->with('userRols', $userRols);
    }

    /**
     * Show the form for creating a new UserRol.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_rols.create');
    }

    /**
     * Store a newly created UserRol in storage.
     *
     * @param CreateUserRolRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRolRequest $request)
    {
        $input = $request->all();

        $userRol = $this->userRolRepository->create($input);

        Flash::success('User Rol saved successfully.');

        return redirect(route('userRols.index'));
    }

    /**
     * Display the specified UserRol.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userRol = $this->userRolRepository->findWithoutFail($id);

        if (empty($userRol)) {
            Flash::error('User Rol not found');

            return redirect(route('userRols.index'));
        }

        return view('user_rols.show')->with('userRol', $userRol);
    }

    /**
     * Show the form for editing the specified UserRol.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userRol = $this->userRolRepository->findWithoutFail($id);

        if (empty($userRol)) {
            Flash::error('User Rol not found');

            return redirect(route('userRols.index'));
        }

        return view('user_rols.edit')->with('userRol', $userRol);
    }

    /**
     * Update the specified UserRol in storage.
     *
     * @param  int              $id
     * @param UpdateUserRolRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRolRequest $request)
    {
        $userRol = $this->userRolRepository->findWithoutFail($id);

        if (empty($userRol)) {
            Flash::error('User Rol not found');

            return redirect(route('userRols.index'));
        }

        $userRol = $this->userRolRepository->update($request->all(), $id);

        Flash::success('User Rol updated successfully.');

        return redirect(route('userRols.index'));
    }

    /**
     * Remove the specified UserRol from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userRol = $this->userRolRepository->findWithoutFail($id);

        if (empty($userRol)) {
            Flash::error('User Rol not found');

            return redirect(route('userRols.index'));
        }

        $this->userRolRepository->delete($id);

        Flash::success('User Rol deleted successfully.');

        return redirect(route('userRols.index'));
    }
}
