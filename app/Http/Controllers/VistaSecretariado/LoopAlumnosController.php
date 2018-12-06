<?php

namespace App\Http\Controllers\VistaSecretariado;

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
use App\Http\Requests\CreateAlumnoResponsableRequest;
use App\Http\Requests\UpdateAlumnoResponsableRequest;
use App\Repositories\AlumnoResponsableRepository;

use App\Repositories\PersonaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Helpers\Helper;
use App\Http\Controllers\Helpers\RevisorHelper\RevisorHelper;
use App\Models\Alumno;
use App\Models\Repitencias;
use App\Models\FichaAlumno;
use App\Models\Apoderado;
use App\Models\AlumnoResponsable;
use App\Models\Curso;
use App\Models\Persona;
use App\Models\Tipo;
use App\Models\TipoPersona;
use App\Models\Comuna;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Auth;
use App\Enums;
use Exception;

use \App\Http\Requests\RequestsForMatricula as RequestsForMatricula;//manual validations

class LoopAlumnosController extends AppBaseController
{

   // Route::resource('alumnosPostulantesRevisor', 'VistaSecretariado\LoopAlumnosController'); //Agregado para ir al controller especial para que la secretaria edite al alumno

    
    /** @var  ApoderadoRepository */
   private $alumnoRepository;
      /** @var  PersonaRepository */
    private $personaRepository;
    private $fichaAlumnoRepository;
    private $apoderadoRepository;
    private $direccionRepository;
    private $alumnoResponsableRepository;

    public function __construct(DireccionRepository $direccionRepo,AlumnoRepository $alumnoRepo, PersonaRepository $personaRepo,FichaAlumnoRepository $fichaAlumnoRepo,ApoderadoRepository $apoderadoRepo,AlumnoResponsableRepository $alumnoResponsableRepo)
    {
        $this->personaRepository = $personaRepo;
        $this->alumnoRepository = $alumnoRepo;
        $this->fichaAlumnoRepository = $fichaAlumnoRepo;
        $this->apoderadoRepository = $apoderadoRepo;
        $this->direccionRepository = $direccionRepo;
        $this->alumnoResponsableRepository = $alumnoResponsableRepo;

    }

    public function edit($id)
    {
        return view('MatriculaPostulante.alumnos.edit')->with('id', $id);
    }
     

    /**
     * Update the specified Apoderado in storage.
     *
     * @param  int              $id
     * @param UpdateApoderadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonaRequest $request) //Debería cambiar la request
    {
   

        $persona =  $this->personaRepository->hasOneRelated('Persona', 'Alumno', 'alumno', $id);
   //dd("ASD");
        //------------>0)VALIDAMOS QUE TODO FUNCIONE
        $validate = $this->validaciones($request); // Primero hay que hacer las validaciones de las clases que no se validan en el request de los parámetros de la función

        if ($validate!=null) {
          throw ValidationException::withMessages([
              $validate,
          ]);
        } 



        ///----->>>>>1) Esta sección es solo para colectar los datos de las variables padre, madre, pContacto y sContacto//////////////////////////////////



        if($request->alumno['parentesco']=="Madre" || $request->alumno['parentesco']=="Padre"){ //Si el parentesco es madre o Padre llenamos los datos de su array para que que todas las variables de contacto luscan igual
           
            $getApoderadoPersona = Apoderado::where('id' , $persona->alumno->idApoderado)->first()->persona->getAttributes(); //Obtenemos el actual apoderado
           
            if($request->alumno['parentesco']=="Madre"){
                $request->madre = $getApoderadoPersona;
                $request->madre['parentesco'] = "Madre";
            }
            if($request->alumno['parentesco']=="Padre"){
                $request->padre = $getApoderadoPersona;
                $request->padre['parentesco'] = "Padre";
            }
         
        } 


        $cantidadDeContactos = $request->fichaAlumno[0]['cantidadContactos']; //inicializamos la variable que recibimos desde la vista para usarla más adelante

        //Aquí agregamos Apoderado Madre o Padre como primer y segundo contacto si es que marcó la opción
        if($cantidadDeContactos == "1" || $cantidadDeContactos == "2"){ //Cuantos contactos decidí inscribir
          //  dd(isset($request->padreOMadrePC));
            //si está vacío significa que marcaron padre o Madre
            $ficha = null;
            $ficha = $request->fichaAlumno[0]; //Tomamos los datos de la ficha para editarlos
            $ficha['idAlumno'] =  $persona->alumno->id; //Le asignamos el idAlumno

            if(isset($request->padreOMadrePC)){ //cambiamos el primer contacto
              
                if($request->padreOMadrePC == "1"){ //Quiere que el apoderado sea primer contacto
                    $ficha =  Helper::contacto1Ficha($request->padre, $ficha);
                }
                if($request->padreOMadrePC == "2"){ //2 es madre
                    $ficha = Helper::contacto1Ficha($request->madre, $ficha);
                }
            }

            if(isset($request->padreOMadreSC)){ //Cambiamos el segundo contacto
             
                if($request->padreOMadreSC == "1"){ //1 es padre 2 es madre
                    $ficha = Helper::contacto2Ficha($request->padre, $ficha);
                }
                if($request->padreOMadreSC == "2"){
                    $ficha = Helper::contacto2Ficha($request->madre, $ficha);
                }
            }
             $request->merge([ 'fichaAlumno' => ['0' => $ficha ] ]); //mergeamos la fichaAlumno con los datos que agregamos
           
        }

        //------> 6)Ahora el padre y madre se lo debemos añadir al alumno para evitar pérdidas de datos
     
        
   
        ///----->>>>>2) Una vez colectados los datos de Padre y madre procederemos a guardarlos, verificando que no exista el rut con anterioridad: Si existe con anterioridad, vamos a trabajar con los datos antiguos.
        //tambien es importante resaltar que debemos guardar ese cambio de padre o madre para el alumno y así mantenerlo siempre relacionado.
        //Se adhieren persona y dirección, CON updateos
        $padreExistente = null;
        $madreExistente = null;
        if(isset($request->padre)){
            $padreExistente = RevisorHelper::addOrUpdatePersonaAndDireccion(
                                        $request->padre,
                                        $this->personaRepository,
                                        (isset($request->padre['direccion']) ? $request->padre['direccion'] : null),
                                        $this->direccionRepository
                            ); //Padre antiguo o nueva con la que vamos a trabajar

            $alumnoConPadreAsociado = Alumno::where('id' , '=', $persona->alumno->id)->update(['idPadre' => $padreExistente->id]); //con el padre que acabamos de crear o update lo retornamos para agregarselo al alumno
        }
        if(isset($request->madre)){
            $madreExistente = RevisorHelper::addOrUpdatePersonaAndDireccion(
                                        $request->madre,
                                        $this->personaRepository,
                                        (isset($request->madre['direccion']) ? $request->madre['direccion'] : null),
                                        $this->direccionRepository
                            ); //Madre antiguo o nueva con la que vamos a trabajar

            $alumnoConMadreAsociada = Alumno::where('id' , '=', $persona->alumno->id)->update(['idMadre' => $madreExistente->id]);
        }


        ///----->>>>>4) SINCRONIZAMOS los datos de padres y madres del contacto, evitando que pueda haber más de un padre
        //o el regristro es borrado 
        Helper::existeRelacionPorParentesco($request->alumno['id'] , $padreExistente,  $madreExistente, "Padre");

        if($persona->alumno->fichaAlumno==null){ //Si el alumno no tiene una ficha asociada, se le crea en el momento
            $fichaAlumno = $this->fichaAlumnoRepository->create($request->fichaAlumno[0]);
            $request->merge([ 'fichaAlumno' => ['0' =>$fichaAlumno->toArray()] ]);
        }

        $idFicha = FichaAlumno::where('idAlumno' , $persona->alumno->id)->first();


        //------------>5)Updateamos todo

        
        if(!isset($persona->direccion->id)){//Si la persona no tiene una dirección, crearla

           $direccion = $this->direccionRepository->create($request->direccion);
           $request->request->add(['direccion' => $direccion->toArray()]);
           $persona->direccion = $direccion;
        }




        $persona->alumno->repitencia()->sync($request->repitencia); //AGREGAMOS LOS DATOS PIVOTE DE LAS REPITENCIAS https://stackoverflow.com/questions/23968415/laravel-eloquent-attach-vs-sync 
        $request->request->add(['alumno[repitencias]' => $persona->alumno->repitencia()->count()]); //cambiamos el valor del request"repitencias que tiene el número de repitencias del alumno"
 


            //*-->-------->UPDATE DIRECCION
        $direccion =Helper::updateThis($this->direccionRepository,$request->direccion, $persona->direccion->id);
        unset($request['direccion']); //Produce el error array to string, por eso direccion se borra antes
        $request->request->add(['idDireccion' => $direccion->id]); //guardamos el id de la dirección updateada

        $persona = $this->personaRepository->update($request->all(), $id);


        $alumno = Helper::updateThis($this->alumnoRepository,$request->alumno, $persona->alumno->id);
        Helper::updateThis($this->fichaAlumnoRepository, $request->fichaAlumno[0], $idFicha->id);
              
        //------------>6)Jugamos con las variables de sesión para ir cerrando el proceso de matrícula
        //********************************************
        

        $alumnosSeleccionados = $request->session()->get('todosLosAlumnos');

        if ($alumnosSeleccionados==null) {
            $errorMessage = "No se encuentra la variable de sesión correspondiente. Reinicie el proceso de matrícula desde el principio.";
            return redirect()->back()->withErrors($errorMessage)->withInput($request->all());
        }

        $navigate = Helper::navigateNext($id, $alumnosSeleccionados);

    
        //SI SELECCIONÓ ESTE AÑO LE SALDRÁ LA VARIABLE ANIO, si seleccinó el siguiente no le saldrá nada
        if($navigate){
            return redirect()->route('alumnosPostulantesRevisor.edit', [$navigate , 'generandoContrato', (isset($request['Anio']) ? 'Anio' : '')]);
        }


        //------------>7)Cambiamos los estados una vez terminado todo para que el apoderado no pueda volver a acceder a hacer cambios
        //********************************************
        
        //DESCOMENTAR, NO BORRARDESCOMENTAR, NO BORRARDESCOMENTAR, NO BORRARDESCOMENTAR, NO BORRARDESCOMENTAR, NO BORRAR
        $this->cambioDeEstados($alumno, $request); //Método que está en el mismo controller. Cambiamos los estados de los Alumnos
       
        // \Session::flush(); LAS SECRETARIAS PUEDEN SEGUIR REVISANDO POR ESO NO HAY QUE BORRARLE LA SESIÓN
        //Auth::logout();

         
        $alumnosSeleccionados = $request->session()->get('todosLosAlumnos');
        $al = [];

        foreach ($alumnosSeleccionados as $key) {

            $alumno = $this->personaRepository->findWithoutFail($key);
            array_push($al, $alumno->alumno);
        }

       
         return view('secretariado.indexContrato')->with('alumnos', $al);


    }




      /*revisar*/
    /*MÉTODO PARA VALIDAR Y DESPEJAR EL CONTROLLER*/
    public function validaciones($request){
        $validate = null;
    //    dd($request->all());
        $validate = Helper::manualValidation($request->all(), (new RequestsForMatricula\RequestPersona\CreatePersonaAlumnoRequest()), "1)Errores de los datos de la Persona: ",1);

        if(isset($request->direccion)){
        $validate =  $validate . Helper::manualValidation($request->direccion, (new RequestsForMatricula\RequestDireccion\CreateDireccionRequest()), "2)Errores de los datos de la Dirección: ", 3);
        }
/*dd($request->fichaAlumno[0],
    $request->direccion
 );*/

        if(isset($request->fichaAlumno[0])){
        $validate =  $validate . Helper::manualValidation($request->fichaAlumno[0], (new RequestsForMatricula\RequestFicha\CreateFichaAlumnoRequest()), "3)Errores de la Ficha del Alumno: ", 4);
        }
   

        if(isset($request->padre)){
             $validate = $validate . Helper::manualValidation($request->padre, (new RequestsForMatricula\RequestPadres\CreatePadresRequest()), "4)Errores de los datos del Padre: ",5);
        }
        if(isset($request->madre)){
             $validate = $validate . Helper::manualValidation($request->madre, (new RequestsForMatricula\RequestPadres\CreatePadresRequest()), "5)Errores de los datos de la Madre: ",6);
        }
          
        if(isset($request->pContacto)){
        $validate = $validate . Helper::manualValidation($request->pContacto, (new RequestsForMatricula\RequestContacto\CreatePersonaRequest()), "6)Errores de los datos del Primer Contacto: ",4);
        }

        if(isset($request->sContacto)){
             $validate = $validate . Helper::manualValidation($request->sContacto, (new RequestsForMatricula\RequestContacto\CreatePersonaRequest()), "7)Errores de los datos del Segundo Contacto: ",5);
        }

  
        
        return $validate;

    }





/*Método que cambia los estados de Alumno y Apderado siempre tiene que se lo último en cambiarse*/
    public function cambioDeEstados($alumno, $request)
    {
        
        /**********Objetivo?: Saber que el apoderado***************/
        /*********ya hizo la matricula de su alumno ***************/
        $estadoApoderado= ["estado" => "MatriculaRevisadaPorRevisor"];
        $estadoAlumno= ["estado" => "MatriculaRevisadaPorRevisor"];

        $todosLosAlumnos = $request->session()->get('todosLosAlumnos');

        //ESTO BUSCA A TODAS LAS PERSONAS-ALUMNOS Y LES CAMBIA EL ESTADO
        foreach ($todosLosAlumnos as $key) {
           $personaAlumno = $this->personaRepository->findWithoutFail($key);
           $alumno = $this->alumnoRepository->update($estadoAlumno, $personaAlumno->alumno->id);

        }

        $apoderado = $this->apoderadoRepository->update($estadoApoderado, $alumno->idApoderado);

        //session()->forget('idAlumnos');
    }

    /**
     * Show the form for editing the specified Alumno.
     *@php //https://laracasts.com/discuss/channels/laravel/laravel-convert-amount-in-digit-to-words?page=1 number formatter
    $f = new NumberFormatter("es", NumberFormatter::SPELLOUT);
echo $f->format(1432);
@endphp
     * @param  int $id
     *
     * @return Response
     */

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
