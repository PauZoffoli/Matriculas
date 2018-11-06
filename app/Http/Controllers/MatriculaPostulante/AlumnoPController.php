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
use Illuminate\Support\Arr;
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
use Auth;
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
         
         $persona =  $this->personaRepository->hasOneRelated('Persona', 'Alumno', 'alumno', $id);


/////////////////////////////////////////////////////esto tiene que descomentarse después
     /*   $validate = $this->validaciones($request); // Primero hay que hacer las validaciones de las clases que no se validan en el request de los parámetros de la función
        if ($validate!=null) {
          throw ValidationException::withMessages([
              $validate,
          ]);
        } */
/////////////////////////////////////////////////////esto tiene que descomentarse después


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

        $padreExistente = null;
        $madreExistente = null;
        if(isset($request->padre)){
            $padreExistente = Helper::existePersona($request->padre, $this->personaRepository); //Padre antiguo o nueva con la que vamos a trabajar
            $alumnoConPadreAsociado = Alumno::where('id' , '=', $persona->alumno->id)->update(['idPadre' => $padreExistente->id]); //con el padre que acabamos de crear o update lo retornamos para agregarselo al alumno
        }
        if(isset($request->madre)){
            $madreExistente = Helper::existePersona($request->madre, $this->personaRepository); //madre antigua o nueva con la que vamos a trabajar
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
     
        $request->request->add(['idDireccion' => $direccion->id]); //guardamos el id de la dirección updateada

        //https://stackoverflow.com/questions/38664845/exclude-laravel-specific-values-from-request
        $persona = $this->personaRepository->update($request->except('direccion'), $id);

        $alumno = Helper::updateThis($this->alumnoRepository,Arr::except($request->only('alumno'), 'idCursoPostu'), $persona->alumno->id);

        Helper::updateThis($this->fichaAlumnoRepository, $request->fichaAlumno[0], $idFicha->id);
       
        //------------>6)Jugamos con las variables de sesión para ir cerrando el proceso de matrícula
        //********************************************

        
        $alumnosSeleccionados = $request->session()->get('todosLosAlumnos');
        $navegarEntreIdDeAlumnos = Helper::navigateNext($id, $alumnosSeleccionados);
        if($navegarEntreIdDeAlumnos){
            return redirect()->route('alumnosPostulantes.edit', $navegarEntreIdDeAlumnos);
        }

        //------------>7)Cambiamos los estados una vez terminado todo para que el apoderado no pueda volver a acceder a hacer cambios
        //********************************************
        $this->cambioDeEstados($alumno, $request); //Método que está en el mismo controller. Cambiamos los estados de los Alumnos



        \Session::flush();
        Auth::logout();
   
        \Session::flash('flash_message','Alumno editado exitósamente.');
        return view('MatriculaPostulante.FinProcesoMatricula');
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

        /*if(isset($request->fichaAlumno)){
        $validate =  $validate . Helper::manualValidation($request->fichaAlumno, (new \App\Http\Requests\RequestFicha\CreateFichaAlumnoRequest()), "4)Errores de la Ficha del Alumno: ", 4);
        }


/*
        if(isset($request->padre)){
             $validate = $validate . Helper::manualValidation($request->padre, (new \App\Http\Requests\RequestPadres\CreatePadresRequest()), "5)Errores de los datos del Padre: ",5);
        }
        if(isset($request->madre)){
             $validate = $validate . Helper::manualValidation($request->madre, (new \App\Http\Requests\RequestPadres\CreatePadresRequest()), "6)Errores de los datos de la Madre: ",6);
        }
    
        if(isset($request->pContacto)){
        $validate = $validate . Helper::manualValidation($request->pContacto, (new CreatePersonaRequest()), "7)Errores de los datos del Primer Contacto: ",4);
        }
        //
        if(isset($request->sContacto)){
             $validate = $validate . Helper::manualValidation($request->sContacto, (new CreatePersonaRequest()), "8)Errores de los datos del Segundo Contacto: ",5);
        }*/

      
        
        return $validate;

    }





/*Método que cambia los estados de Alumno y Apderado siempre tiene que se lo último en cambiarse*/
    public function cambioDeEstados($alumno, $request)
    {
        
        /**********Objetivo?: Saber que el apoderado***************/
        /*********ya hizo la matricula de su alumno ***************/
        $estadoApoderado= ["estado" => "MatriculaRevisadaPorApoderado"];
        $estadoAlumno= ["estado" => "MatriculaRevisadaPorApoderado"];

        $idAlumnos = $request->session()->get('todosLosAlumnos');
        foreach ($idAlumnos as $key) {
           $alumno = $this->alumnoRepository->update($estadoAlumno, $key);
        }

        $apoderado = $this->apoderadoRepository->update($estadoApoderado, $alumno->idApoderado);

        session()->forget('todosLosAlumnos');

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
        return view('MatriculaPostulante.alumnos.edit')->with('id', $id);
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
