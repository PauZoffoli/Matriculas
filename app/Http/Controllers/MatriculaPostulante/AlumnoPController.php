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

use App\Enums;


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
     *@php //https://laracasts.com/discuss/channels/laravel/laravel-convert-amount-in-digit-to-words?page=1 number formatter
    $f = new NumberFormatter("es", NumberFormatter::SPELLOUT);
echo $f->format(1432);
@endphp
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $persona = $this->checkIfExist($id);


        $responsables = null;
        $padre = null;
        $madre = null;

        if (!$persona->alumnoResponsables->isEmpty()) {
 
            foreach ($persona->alumnoResponsables as $value) {

                if( $value->pivot->pivotParent->hasTipo("Padres")){
                
                    $padre = $value->pivot->pivotParent;
                    
                }
                if( $value->pivot->pivotParent->hasTipo("Padres")){
                
                    $madre = $value->pivot->pivotParent;
                    
                }

                
            }
            
        }       

        return view('MatriculaPostulante.alumnos.edit')->with('persona', $persona)->with('padre',$padre)->with('madre',$madre);

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
    

        $persona = $this->checkIfExist($id); //Chequeamos si es que las entidades que necesitamos existen


/////////////////////////////////////////////////////esto tiene que descomentarse después
     /*   $validate = $this->validaciones($request); // Primero hay que hacer las validaciones de las clases que no se validan en el request de los parámetros de la función
        if ($validate!=null) {
          throw ValidationException::withMessages([
              $validate,
          ]);
        } */
/////////////////////////////////////////////////////esto tiene que descomentarse después
//dd($request->all());
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
   
        ///----->>>>>2) Una vez colectados los datos de Padre y madre procederemos a guardarlos, verificando que no exista el rut con anterioridad: Si existe con anterioridad, vamos a trabajar con los datos antiguos
        $padreExistente = null;
        $madreExistente = null;
 

        if(isset($request->padre)){
            $padreExistente = Helper::existePersona($request->padre, $this->personaRepository); //Padre antiguo o nueva con la que vamos a trabajar
        }
        if(isset($request->madre)){
            $madreExistente = Helper::existePersona($request->madre, $this->personaRepository); //madre antigua o nueva con la que vamos a trabajar
        }

        ///----->>>>>3)Ahora procedemos a añadir los tipos de las variable anteriores
        if(isset($padreExistente)){
            Helper::existeTipoPersona("Padres", $padreExistente); //estas variables 
        }
        if(isset($madreExistente)){
            Helper::existeTipoPersona("Padres", $madreExistente);
        }

        ///----->>>>>4) SINCRONIZAMOS los datos de padres y madres del contacto, evitando que pueda haber más de un padre
        //o el regristro es borrado 
        Helper::existeRelacionPorParentesco($request->alumno['id'] , $padreExistente,  $madreExistente, "Padre");


        if($persona->alumno->fichaAlumno==null){ //Si el alumno no tiene una ficha asociada, se le crea en el momento
             $fichaAlumno = $this->fichaAlumnoRepository->create($request->fichaAlumno[0]);
        }


        //------------>5)Updateamos todo
        $persona->alumno->repitencia()->sync($request->repitencia); //AGREGAMOS LOS DATOS PIVOTE DE LAS REPITENCIAS https://stackoverflow.com/questions/23968415/laravel-eloquent-attach-vs-sync 
        $request->request->add(['alumno[repitencias]' => $persona->alumno->repitencia()->count()]); //cambiamos el valor del request"repitencias que tiene el número de repitencias del alumno"
        Helper::updateThis($this->direccionRepository,$request->direccion, $persona->direccion->id);
        unset($request['direccion']); //Produce el error array to string, por eso direccion se borra antes
        $persona = $this->personaRepository->update($request->all(), $id);
        $alumno = Helper::updateThis($this->alumnoRepository,$request->alumno, $persona->alumno->id);
        Helper::updateThis($this->fichaAlumnoRepository, $request->fichaAlumno[0],  $request->fichaAlumno[0]['id']);
        
        //------------>6)Jugamos con las variables de sesión para ir cerrando el proceso de matrícula
        //********************************************
        $todosLosAlumnos = $request->session()->get('todosLosAlumnos');
        $todosLosAlumnos =  Helper::deleteFirst($todosLosAlumnos); //Borramos el primer elemento del array, que fue el que acabamos de utilizar y updatear

        if ($todosLosAlumnos!=null) {
           
           // \Session::flash('flash_message','Alumno editado exitósamente.');
            $request->session()->put('todosLosAlumnos', $todosLosAlumnos);//Guardamos los alumnos que nos van quedando en la misma variable
            return redirect()->route('alumnosPostulantes.edit', json_decode($todosLosAlumnos[0])->idPersona);
        }
        session()->forget('todosLosAlumnos'); //cuando quede ningún alumno en la variable la olvidaremos
        session()->forget('apoderadoAlumnos');

        //------------>7)Cambiamos los estados una vez terminado todo para que el apoderado no pueda volver a acceder a hacer cambios
        //********************************************
        $this->cambioDeEstados($alumno, $request); //Método que está en el mismo controller. Cambiamos los estados de los Alumnos

        \Session::flash('flash_message','Alumno editado exitósamente.');
        return view('MatriculaPostulante.FinProcesoMatricula');
    }


    /*revisar*/
    /*MÉTODO PARA VALIDAR Y DESPEJAR EL CONTROLLER*/
    public function validaciones($request){

        $validate = Helper::manualValidation($request->fichaAlumno, (new CreateFichaAlumnoRequest()), "1)Errores de la Ficha del Alumno: ", 1);

        if(isset($request->padre)){
             $validate = $validate . Helper::manualValidation($request->padre, (new CreatePersonaRequest()), "2)Errores de los datos del Padre: ",2);
        }
        if(isset($request->madre)){
        $validate = $validate . Helper::manualValidation($request->madre, (new CreatePersonaRequest()), "3)Errores de los datos de la Madre: ",3);
        }
        if(isset($request->fichaAlumno[0]['cantidadContactos'])){
            
        $validate = $validate . Helper::manualValidation($request->pContacto, (new CreatePersonaRequest()), "4)Errores de los datos del Primer Contacto: ",4);
        }
        if(isset($request->fichaAlumno[0]['cantidadContactos'])){
       $validate = $validate . Helper::manualValidation($request->sContacto, (new CreatePersonaRequest()), "5)Errores de los datos del Segundo Contacto: ",5);
        }

 

        return $validate;

    }




/*Método que cambia los estados de Alumno y Apderado*/
    public function cambioDeEstados($alumno, $request)
    {
        
        /**********Objetivo?: Saber que el apoderado***************/
        /*********ya hizo la matricula de su alumno ***************/
        $estadoApoderado= ["estado" => "MatriculaRevisadaPorApoderado"];
        $estadoAlumno= ["estado" => "MatriculaRevisadaPorApoderado"];

        $idAlumnos = $request->session()->get('idAlumnos'); //con esta variable de sesión le cambiamos los estados a todos los alumnos que el apoderado haya checado.

       
        if ($idAlumnos==null) {
           Flash::error( "La variable de sesión no existe! Usted ya ha inscrito a su alumno.");
           return redirect(route('home'))->send();
         }

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

}
