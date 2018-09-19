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
use App\Http\Requests\CreateFichaAlumnoRequest;
use App\Http\Requests\UpdateFichaAlumnoRequest;
use App\Repositories\FichaAlumnoRepository;
use App\Http\Requests\CreateDireccionRequest;
use App\Http\Requests\UpdateDireccionRequest;
use App\Repositories\DireccionRepository;

use App\Repositories\PersonaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Helpers\Helper;
use App\Models\Alumno;
use App\Models\Repitencias;
use App\Models\FichaAlumno;
use App\Models\Apoderado;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
class AlumnoPController extends AppBaseController
{

//Route::resource('alumnosPostulantes', 'MatriculaPostulante\AlumnoPController');
    //https://adminlte.io/themes/AdminLTE/pages/tables/simple.html
    
    /** @var  ApoderadoRepository */
   private $alumnoRepository;
      /** @var  PersonaRepository */
    private $personaRepository;
    private $fichaAlumnoRepository;
    private $apoderadoRepository;
    private $direccionRepository;

    public function __construct(DireccionRepository $direccionRepo,AlumnoRepository $alumnoRepo, PersonaRepository $personaRepo,FichaAlumnoRepository $fichaAlumnoRepo,ApoderadoRepository $apoderadoRepo)
    {
        $this->personaRepository = $personaRepo;
        $this->alumnoRepository = $alumnoRepo;
        $this->fichaAlumnoRepository = $fichaAlumnoRepo;
        $this->apoderadoRepository = $apoderadoRepo;
        $this->direccionRepository = $direccionRepo;

    }

    //Método para chequear un bundle de cosas básicas del controller.
    public function checkIfExist($id){
        
        $persona = Helper::checkthis($this->personaRepository, $id, 'Persona');
        
        $validate = Helper::checkthisValue($persona->alumno, 'Alumno');
        $validate = $validate . Helper::checkthisValue($persona->direccion, 'Dirección');
        if ($validate!=null) {
           Flash::error($validate);
        return redirect(route('home'))->send();
        }


        return $persona;

    }
    /**
     * Show the form for editing the specified Alumno.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $persona = $this->checkIfExist($id);
        //dd($persona->alumno->repitencia);

        $responsables = null;
        $padre = null;
        $madre = null;
        $pContacto = null;
        $sContacto = null;
      
        if (!$persona->alumnoResponsables->isEmpty()) {
 
            foreach ($persona->alumnoResponsables as $value) {

                if( $value->pivot->pivotParent->hasTipo("Padre")){
                
                    $padre = $value->pivot->pivotParent;
                    
                }
                if( $value->pivot->pivotParent->hasTipo("Madre")){
                
                    $madre = $value->pivot->pivotParent;
                    
                }

                if( $value->pivot->pivotParent->hasTipo("PrimerContacto")){
                
                    $pContacto = $value->pivot->pivotParent;
                    
                }

                if( $value->pivot->pivotParent->hasTipo("SegundoContacto")){
                
                    $sContacto = $value->pivot->pivotParent;
                    
                }
            }
            
        }       

        return view('MatriculaPostulante.alumnos.edit')->with('alumno', $persona)->with('padre',$padre)->with('madre',$madre)->with('pContacto',$pContacto)->with('sContacto',$sContacto);

    }

    /*Tabla pivote
    */
    //dd($padre);
        // $responsable = $persona->alumnoResponsables[0]->pivot->pivotParent;
 // $padre = $this->personaRepository->findWithoutFail($padre->id);

   // dd("es padre");
                    //$persona->pluck($value->pivot->pivotParent);
                   // $persona->add($value->pivot->pivotParent);
                  //  array_push($persona, ['padre' => $value->pivot->pivotParent]);

       //dd($responsable->hasTipo("AlumnoPostulante"));
        //dd($persona->alumnoResponsables[0]->pivot->pivotParent->id);


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
        $persona = $this->checkIfExist($id); //Chequeamos si es que las entidades que necesitamos existen

        $validate = $this->validaciones($request); // Primero hay que hacer las validaciones de las clases que no se validan en el request de los parámetros de la función
        if ($validate!=null) {
          throw ValidationException::withMessages([
              $validate,
          ]);
        }

        if($persona->alumno->fichaAlumno==null){ //Si el alumno no tiene una ficha asociada, se le crea en el momento
             $fichaAlumno = $this->fichaAlumnoRepository->create($request->fichaAlumno[0]);
        }

        Helper::updateThis($this->direccionRepository,$request->direccion, $persona->alumno->id);
        unset($request['direccion']); //Produce el error array to string, por eso direccion se borra antes
        $persona = $this->personaRepository->update($request->all(), $id);
        $alumno = Helper::updateThis($this->alumnoRepository,$request->alumno, $persona->alumno->id);
        Helper::updateThis($this->fichaAlumnoRepository, $request->fichaAlumno[0],  $request->fichaAlumno[0]['id']);
        
        /////////////AHORA OCUPAMOS LAS VARIABLES DE SESIÓN/////////////////
        $todosLosAlumnos = $request->session()->get('todosLosAlumnos');
        $todosLosAlumnos =  Helper::deleteFirst($todosLosAlumnos); //Borramos el primer elemento del array, que fue el que acabamos de utilizar y updatear

        if ($todosLosAlumnos!=null) {
           
           // \Session::flash('flash_message','Alumno editado exitósamente.');
            $request->session()->put('todosLosAlumnos', $todosLosAlumnos);//Guardamos los alumnos que nos van quedando en la misma variable
            return redirect()->route('alumnosPostulantes.edit', json_decode($todosLosAlumnos[0])->idPersona);
        }
        session()->forget('todosLosAlumnos'); //cuando quede ningún alumno en la variable la olvidaremos

        $this->cambioDeEstados($alumno, $request); //Método que está en el mismo controller. Cambiamos los estados de los Alumnos

        \Session::flash('flash_message','Alumno editado exitósamente.');
        return view('MatriculaPostulante.FinProcesoMatricula');
    }



    /*MÉTODO PARA VALIDAR Y DESPEJAR EL CONTROLLER*/
    public function validaciones($request){
            /////////////////////////////////////////////
        ///////CUSTOM VALIDATION FICHA ALUMNO////////
        /////////////////////////////////////////////

        $validate = Helper::manualValidation($request->fichaAlumno, (new CreateFichaAlumnoRequest()), "1)Errores de la Ficha del Alumno: ", 1);
        $validate = $validate . Helper::manualValidation($request->padre, (new CreatePersonaRequest()), "2)Errores de los datos del Padre: ",2);
        $validate = $validate . Helper::manualValidation($request->madre, (new CreatePersonaRequest()), "3)Errores de los datos de la Madre: ",3);
        $validate = $validate . Helper::manualValidation($request->pContacto, (new CreatePersonaRequest()), "4)Errores de los datos del Primer Contacto: ",4);
        $validate = $validate . Helper::manualValidation($request->sContacto, (new CreatePersonaRequest()), "5)Errores de los datos del Segundo Contacto: ",5);

        return $validate;

        /////////////////////////////////////////////
        ///////////////END CUSTOM VALIDATION/////////
        /////////////////////////////////////////////

    }


/*Método que cambia los estados de Alumno y Apderado*/
    public function cambioDeEstados($alumno, $request)
    {
        
        /**********Objetivo?: Saber que el apoderado***************/
        /*********ya hizo la matricula de su alumno ***************/
        $estadoApoderado= ["estado" => "MatriculaRevisadaPorApoderado"];
        $estadoAlumno= ["estado" => "MatriculaRevisadaPorApoderado"];

        $idAlumnos = $request->session()->get('idAlumnos'); //con esta variable de sesión le cambiamos los estados a todos los alumnos que el apoderado haya checado.

        foreach ($idAlumnos as $key) {
           $alumno = $this->alumnoRepository->update($estadoAlumno, json_decode($key)->id);
        }

        $apoderado = $this->apoderadoRepository->update($estadoApoderado, $alumno->idApoderado);

        session()->forget('idAlumnos');

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
     //$erros = app()->make('App\Http\Requests\CreateFichaAlumnoRequest');// $validate->validate($request->fichaAlumno, $validate->rules(), $validate->messages());
 //$validate->validate($request->fichaAlumno, $validate->rules(), $validate->messages());
 //dd($validate->fails());
//$input=(new FichaAlumno($request->fichaAlumno[0]));
//CreateFichaAlumnoRequest::validate($request->fichaAlumno[0], $input->rules(), $input->messages());
           //  $input = CreateFichaAlumnoRequest::validate($request->fichaAlumno[0], CreateFichaAlumnoRequest::rules());
          
          //  $input('App\Http\Requests\CreateFichaAlumnoRequest'); // FormRequest
            // dd("hola");
}
