<?php

namespace App\Http\Controllers\MatriculaPostulante;

use App\Http\Requests\CreateApoderadoRequest;
use App\Http\Requests\UpdateApoderadoRequest;
use App\Repositories\ApoderadoRepository;
use App\Http\Requests\CreatePersonaRequest;
use App\Http\Requests\UpdatePersonaRequest;
use App\Http\Requests\CreateAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Repositories\AlumnoRepository;

use App\Repositories\PersonaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Validation\ValidationException;
class AlumnoPController extends AppBaseController
{

//Route::resource('alumnosPostulantes', 'MatriculaPostulante\ApoderadoPController');
    
    /** @var  ApoderadoRepository */
   private $alumnoRepository;
      /** @var  PersonaRepository */
    private $personaRepository;

    public function __construct(AlumnoRepository $alumnoRepo, PersonaRepository $personaRepo)
    {
        $this->personaRepository = $personaRepo;
        $this->alumnoRepository = $alumnoRepo;

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
        $persona = $this->personaRepository->findWithoutFail($id);

        if (empty($persona)) {
            Flash::error('Persona not found');

            return redirect(route('personas.index'));
        }

        return view('MatriculaPostulante.apoderados.edit')->with('persona', $persona);

    }

    /**
     * Update the specified Apoderado in storage.
     *
     * @param  int              $id
     * @param UpdateApoderadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlumnoRequest $request) //Debería cambiar la request
    {

        $persona = $this->personaRepository->findWithoutFail($id); //BUSCAMOS LA PERSONA POR DEFECTO
    
        if($persona->apoderado==null){ //Verificamos que LA PERSONA TENGA UN APODERADO ASOCIADO
          throw ValidationException::withMessages([
                'Error' => [trans('La persona no tiene un apoderado asociado')],
            ]);
        }
       
        $apoderado = $this->apoderadoRepository->findWithoutFail($persona->apoderado->id); //BUSCAMOS EL APODERADO ASOCIADO

        if (empty($persona)) { //VERIFICAMOS SI LA PERSONA ESTÁ VACÍA ANTES DE UPDATEARLA
            Flash::error('Persona not found');

            return view('home');
        }

         if (empty($apoderado)) { //VERIFICAMOS SI EL APODERADO ESTÁ VACÍO ANTES DE UPDATEARLO
            Flash::error('Apoderado not found');
            return view('home');//PRUEBA, HAY QUE VER LA FORMA DE DEVOLVER CON MENSAJE
        }

        $persona = $this->personaRepository->update($request->all(), $id);
        $apoderado = $this->apoderadoRepository->update($request->apoderado, $persona->apoderado->id);

        Flash::success('Apoderado editado exitósamente.');
        return redirect()->route('apoderadosPostulantes.edit', $id);
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
        abort(404);
    }
     /**

    /**
     * Display a listing of the Apoderado.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        abort(404);
    }

    /**
     * Show the form for creating a new Apoderado.
     *
     * @return Response
     */
    public function create()
    {
        abort(404);
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
        abort(404);
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
        abort(404);
    }
}
