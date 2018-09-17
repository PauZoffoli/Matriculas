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
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Validation\ValidationException;
use App\Models\Alumno;
use App\Http\Controllers\Helpers\Helper;
class ApoderadoPController extends AppBaseController
{

//Route::resource('apoderadosPostulantes', 'MatriculaPostulante\ApoderadoPController');
    
    /** @var  ApoderadoRepository */
    private $apoderadoRepository;
      /** @var  PersonaRepository */
    private $personaRepository;
  private $direccionRepository;

    public function __construct(ApoderadoRepository $apoderadoRepo, PersonaRepository $personaRepo, DireccionRepository $direccionRepo)
    {
        $this->personaRepository = $personaRepo;
        $this->apoderadoRepository = $apoderadoRepo;
         $this->direccionRepository = $direccionRepo;

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
//dd($persona->direccion);
         //  dd($apoderado->find(4)->alumnos()->get());

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
    public function update($id, UpdateApoderadoRequest $request) //Debería cambiar la request
    {
    
        ////////////////////////////////////////////////////////////
        //////////////////SECCIÓN PERSONA APODERADO/////////////////
        ////////////////////////////////////////////////////////////
        $persona = $this->personaRepository->findWithoutFail($id); //BUSCAMOS LA PERSONA POR DEFECTO
        if($persona->apoderado==null){ //Verificamos que LA PERSONA TENGA UN APODERADO ASOCIADO
          throw ValidationException::withMessages([
                'Error' => [trans('La persona no tiene un apoderado asociado')],
            ]);
        }

       
        $apoderado = $this->apoderadoRepository->findWithoutFail($persona->apoderado->id); //BUSCAMOS EL APODERADO ASOCIADO
        $direccion = $this->direccionRepository->findWithoutFail($persona->direccion->id);  //BUSCAMOS LA DIRECCION ASOCIADA
       
        if (empty($persona)) { //VERIFICAMOS SI LA PERSONA ESTÁ VACÍA ANTES DE UPDATEARLA
            Flash::error('Persona not found');

            return view('home');
        }

         if (empty($apoderado)) { //VERIFICAMOS SI EL APODERADO ESTÁ VACÍO ANTES DE UPDATEARLO
            Flash::error('Apoderado not found');
            return view('home');//PRUEBA, HAY QUE VER LA FORMA DE DEVOLVER CON MENSAJE
        }
        if (empty($apoderado)) { //VERIFICAMOS SI EL APODERADO ESTÁ VACÍO ANTES DE UPDATEARLO
            Flash::error('Apoderado not found');
            return view('home');//PRUEBA, HAY QUE VER LA FORMA DE DEVOLVER CON MENSAJE
        }


        $direccion = $this->direccionRepository->update($request->direccion, $persona->direccion->id);
        $persona = $this->personaRepository->update(array($request->all()), $id); //ARRAY O SE PRODUCE ERROR Laravel Array to string conversion error
        $apoderado = $this->apoderadoRepository->update($request->apoderado, $persona->apoderado->id);
        
        
        ////////////////////////////////////////////////////////////
        //////////////////////ALUMNOS SELECCIONADOS/////////////////
        ////////////////////////////////////////////////////////////
        $primerAlumno = Helper::obtainObject('alumnosCheck', $request, 0); //Método Helper trae un objet si que comprueba ofsets, arrays nulls, etc.

        if($primerAlumno == null){ //Si no escogió ningún alumno vuelve a la página anterior
            return redirect(route('apoderadosPostulantes.edit', $id))->with('error', 'Usted no ha escogido ningún alumno.');
        }

        $todosLosAlumnos =   Helper::obtainAllObjects('alumnosCheck', $request) ;
        $request->session()->put('todosLosAlumnos', $todosLosAlumnos);//Guardamos los alumnos checkeados por el apoderado en una variable de sesión, esta variable se irá borrando en la medida que se ocupe

        $request->session()->put('idAlumnos', $todosLosAlumnos);//Guardamos los alumnos para sacar sus id y cambiar sus estados al final del proceo de matrícula
        ////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////

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
