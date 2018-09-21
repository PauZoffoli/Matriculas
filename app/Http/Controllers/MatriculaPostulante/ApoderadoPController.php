<?php

namespace App\Http\Controllers\MatriculaPostulante;

use App\Http\Requests\CreateApoderadoRequest;
use App\Http\Requests\UpdateApoderadoRequest;
use App\Repositories\ApoderadoRepository;
use App\Http\Requests\CreatePersonaRequest;
use App\Http\Requests\UpdatePersonaRequest;
use App\Repositories\PersonaRepository;
use App\Http\Requests\CreateDireccionRequest;
use App\Http\Requests\UpdateDireccionRequest;
use App\Repositories\DireccionRepository;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Repositories\AlumnoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Validation\ValidationException;
use App\Models\Alumno;
use App\Http\Controllers\Helpers\Helper;
use App\Models\Comuna;
class ApoderadoPController extends AppBaseController
{

//Route::resource('apoderadosPostulantes', 'MatriculaPostulante\ApoderadoPController');
    
    /** @var  ApoderadoRepository */
    private $apoderadoRepository;
      /** @var  PersonaRepository */
    private $personaRepository;
  private $direccionRepository;
   private $alumnoRepository;

    public function __construct(ApoderadoRepository $apoderadoRepo,AlumnoRepository $alumnoRepo,PersonaRepository $personaRepo, DireccionRepository $direccionRepo)
    {
        $this->personaRepository = $personaRepo;
        $this->apoderadoRepository = $apoderadoRepo;
         $this->direccionRepository = $direccionRepo;
         $this->alumnoRepository = $alumnoRepo;

    }
    
    //Método para chequear un bundle de cosas básicas del controller.
    public function checkIfExist($id){
        
        $persona = Helper::checkthis($this->personaRepository, $id, 'Persona');
        
        $validate = Helper::checkthisValue($persona->apoderado, 'Apoderado');
        $validate = $validate . Helper::checkthisValue($persona->alumno, 'Alumno');
        if ($validate!=null) {
           Flash::error($validate);
        return redirect(route('home'))->send();
        }
        return $persona;

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
        $persona = $this->checkIfExist($id); //Chequeamos todas las clases que necesitemos antes.
        $comuna = new Comuna;
        $comuna = $comuna->all();
        $comuna =  Helper::getEnumValueFromTable($comuna, 'nombreComu');

        return view('MatriculaPostulante.apoderados.edit')->with('persona', $persona)->with('comuna', $comuna);

    }

    /**
     * Update the specified Apoderado in storage.
     *
     * @param  int              $id
     * @param UpdateApoderadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateApoderadoRequest $request) //Debería cambiar la request
    {
    
        $persona = $this->checkIfExist($id); //Chequeamos todas las clases que necesitemos antes, y pasamos por parámetro a persona.

        Helper::updateThis($this->direccionRepository,$request->direccion, $persona->direccion->id);
        unset($request['direccion']); //Produce el error array to string, por eso direccion se borra antes
        $persona = $this->personaRepository->update($request->all(), $id);
        Helper::updateThis($this->apoderadoRepository, $request->apoderado, $persona->apoderado->id);
        
        ////////////////////////////////////////////////////////////
        //////////////////////ALUMNOS SELECCIONADOS/////////////////
        ////////////////////////////////////////////////////////////
        $primerAlumno = Helper::obtainObject('alumnosCheck', $request, 0, 'apoderadosPostulantes.edit', 'Usted no ha escogido ningún alumno.', $id); //Método Helper trae un objet si es que comprueba ofsets, arrays nulls, etc.


        $todosLosAlumnos =   Helper::obtainAllObjects('alumnosCheck', $request) ;
        $request->session()->put('todosLosAlumnos', $todosLosAlumnos);//Guardamos los alumnos checkeados por el apoderado en una variable de sesión, esta variable se irá borrando en la medida que se ocupe

        $request->session()->put('idAlumnos', $todosLosAlumnos);//Guardamos los alumnos para sacar sus id y cambiar sus estados al final del proceo de matrícula

        /////////////////////////////////////////////////////////////

        Flash::success('Apoderado editado exitósamente.');
        return redirect()->route('alumnosPostulantes.edit',  $primerAlumno->idPersona); //vamos a editar el primer alumno de la lista, mediante su id de Persona
    

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
