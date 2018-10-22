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
use App\Models\Persona;


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
       // $validate = $validate . Helper::checkthisValue($persona->alumno, 'Alumno');
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
      //  $this->authorize('pass', $persona);
  
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
    public function update($id, CreatePersonaRequest $request) //Debería cambiar la request
    {
        $url =url()->previous(); //Será ocupada más tarde
        $persona = $this->checkIfExist($id); //Chequeamos todas las clases que necesitemos antes, y pasamos por parámetro a persona.

        //Si la persona no tiene una dirección, crearla
        if(!isset($persona->direccion->id)){

           $direccion = $this->direccionRepository->create($request->direccion);
           $request->request->add(['direccion' => $direccion->toArray()]);
           $persona->direccion = $direccion;
        }

        $direccion =Helper::updateThis($this->direccionRepository,$request->direccion, $persona->direccion->id);
       
         $request->request->add(['estado' => 'ApoderadoSeRevisa']);

        unset($request['direccion']); //Produce el error array to string, por eso direccion se borra antes de guardar persona


        /*Se valida antes de updatear
        */

               //Primero que todo validamos el modelo de DireccioneS
$validate = $this->validaciones($request); // Primero hay que hacer las validaciones de las clases que no se validan en el request de los parámetros de la función
if ($validate!=null) {
  throw ValidationException::withMessages([
      $validate,
  ]);
}

        $request->request->add(['idDireccion' => $direccion->id]); //guardamos el id de la dirección updateada
        $persona = $this->personaRepository->update($request->all(), $id);
        Helper::updateThis($this->apoderadoRepository, $request->apoderado, $persona->apoderado->id);
        
        ////////////////////////////////////////////////////////////
        //////////////////////ALUMNOS SELECCIONADOS/////////////////
        ////////////////////////////////////////////////////////////
        //Una vez updateado todo procedemos a guardar los datos en una variable de sessión
       
            $primerAlumno = Helper::obtainFirstObject($request['alumnosCheck'] , 0 , $id); //retorna el primer objeto JSON de lo chequeado por el apoderado, o de lo contrario retorna null
dd($primerAlumno);
            if(!$primerAlumno){ //Redirecciona si no existe el primer alumno
                Flash::error('Usted no ha escogido ningún alumno.');

                return redirect()->route('apoderadosPostulantes.edit', $id)->withErrors(['Feo'])->withInput();
                //return redirect(route('apoderadosPostulantes.edit', $id));
              } 
            

dd($request->all());
        $todosLosAlumnos =   Helper::obtainAllObjects('alumnosCheck', $request) ; //obtenemos array de todos los alumnos seleccionados.
        
        $request->session()->put('todosLosAlumnos', $todosLosAlumnos);//Guardamos los alumnos checkeados por el apoderado en una variable de sesión, esta variable se irá borrando en la medida que se ocupe

        $request->session()->put('idAlumnos', $todosLosAlumnos);//Guardamos los alumnos para sacar sus id y cambiar sus estados al final del proceo de matrícula. Esta no se irá borrando.

        $request->session()->put('apoderadoAlumnos', $persona);//Guardamos el apoderado

        /////////////////////////////////////////////////////////////

         Flash::success('Apoderado editado exitósamente.'); //Definimos un mensaje de éxito

         //dependiendo de la url que venga es para donde voy, si al controller de Revisor/loop o al controler de AAlumnoPcONTROLLER
        

        return redirect()->route('alumnosPostulantes.edit',  $primerAlumno->idPersona); //vamos a editar el primer alumno de la lista, mediante su id de Persona
        


    }


    /*revisar*/
    /*MÉTODO PARA VALIDAR Y DESPEJAR EL CONTROLLER*/
    public function validaciones($request){
        $validate = null;
    //    dd($request->all());
        $validate = Helper::manualValidation($request->all(), (new \App\Http\Requests\RequestPersona\CreatePersonaRequest()), "1)Errores de los datos de la Persona: ",1);

        if(isset($request->apoderado)){
        $validate = $validate . Helper::manualValidation($request->apoderado, (new \App\Http\Requests\RequestApoderado\CreateApoderadoRequest()), "2)Errores de los datos del apoderado: ",2);
        }
        if(isset($request->direccion)){
        $validate =  $validate . Helper::manualValidation($request->direccion, (new \App\Http\Requests\RequestDireccion\CreateDireccionRequest()), "3)Errores de los datos de la Dirección: ", 3);
        }
      
        
        return $validate;

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
