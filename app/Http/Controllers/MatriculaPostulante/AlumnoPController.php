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

    public function __construct(AlumnoRepository $alumnoRepo, PersonaRepository $personaRepo,FichaAlumnoRepository $fichaAlumnoRepo,ApoderadoRepository $apoderadoRepo)
    {
        $this->personaRepository = $personaRepo;
        $this->alumnoRepository = $alumnoRepo;
        $this->fichaAlumnoRepository = $fichaAlumnoRepo;
        $this->apoderadoRepository = $apoderadoRepo;

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
        $persona = $this->personaRepository->findWithoutFail($id);

        if (empty($persona)) {
            Flash::error('Persona not found');

            return redirect(route('personas.index'));
        }

   
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
dd($request->all());
        /////////////////////////////////////////////
        ///////CUSTOM VALIDATION FICHA ALUMNO////////
        /////////////////////////////////////////////
        //dd($request->fichaAlumno);
        $validate = Helper::manualValidation($request->fichaAlumno, (new CreateFichaAlumnoRequest()));
          if ($validate!=null) {
              throw ValidationException::withMessages([
                 $validate,
             ]);
          }
        /////////////////////////////////////////////
        ///////////////END CUSTOM VALIDATION/////////
        /////////////////////////////////////////////

        $persona = $this->personaRepository->findWithoutFail($id); //BUSCAMOS LA PERSONA POR DEFECTO
    
        if($persona->alumno==null){ //Verificamos que LA PERSONA TENGA UN Alumno ASOCIADO
        
            throw ValidationException::withMessages([
                'Error' => [trans('La persona no tiene un alumno asociado')],
            ]);
        }

   
        if($persona->alumno->fichaAlumno==null){ //Si el alumno no tiene una ficha asociada, se le crea en el momento
             $fichaAlumno = $this->fichaAlumnoRepository->create($request->fichaAlumno[0]);
        }
      
        $alumno = $this->alumnoRepository->findWithoutFail($persona->alumno->id); //BUSCAMOS EL Alumno ASOCIADO
        $fichaAlumno = $this->fichaAlumnoRepository->findWithoutFail($persona->alumno->fichaAlumno->idAlumno); //BUSCAMOS la ficha alumno ASOCIADO

        if (empty($persona)) { //VERIFICAMOS SI LA PERSONA ESTÁ VACÍA ANTES DE UPDATEARLA
            Flash::error('Persona not found');

            return view('home');
        }

         if (empty($alumno)) { //VERIFICAMOS SI EL Alumno ESTÁ VACÍO ANTES DE UPDATEARLO
            Flash::error('Alumno not found');
            return view('home');//PRUEBA, HAY QUE VER LA FORMA DE DEVOLVER CON MENSAJE
        }

        $persona = $this->personaRepository->update($request->all(), $id);
        $alumno = $this->alumnoRepository->update($request->alumno, $persona->alumno->id);
        $fichaAlumno = $this->fichaAlumnoRepository->update($request->fichaAlumno[0], $request->fichaAlumno[0]['id']);

        ////////////////////////////////////////////////////////////
        //////////////////////ALUMNOS SESION////////////////////////
        ////////////////////////////////////////////////////////////
        $todosLosAlumnos = $request->session()->get('todosLosAlumnos');

        $todosLosAlumnos =   Helper::deleteFirst($todosLosAlumnos);

        if ($todosLosAlumnos!=null) {
           
           // \Session::flash('flash_message','Alumno editado exitósamente.');

            $request->session()->put('todosLosAlumnos', $todosLosAlumnos);//Guardamos los alumnos checkeados por el apoderado 
             return redirect()->route('alumnosPostulantes.edit', json_decode($todosLosAlumnos[0])->idPersona);
        }
        session()->forget('todosLosAlumnos');



        ////////////////////////////////////////////////////////////
        //////////////////END ALUMNOS SESION////////////////////////
        ////////////////////////////////////////////////////////////

         cambioDeEstados($alumno); //Método que está en el mismo controller.

        \Session::flash('flash_message','Alumno editado exitósamente.');
        return view('MatriculaPostulante.FinProcesoMatricula');
    }

    public function cambioDeEstados($alumno)
    {
        
        ////////////////////////////////////////////////////////////
        //////////////////CAMBIOS A LOS ESTADOS/////////////////////
        ////////////////////////////////////////////////////////////
        
        /**********Objetivo?: Saber que el apoderado***************/
        /*********ya hizo la matricula de su alumno ***************/
        $estadoApoderado= ["estado" => "MatriculaRevisadaPorApoderado"];
        $estadoAlumno= ["estado" => "MatriculaRevisadaPorApoderado"];

        $idAlumnos = $request->session()->get('idAlumnos');

        foreach ($idAlumnos as $key) {
           $alumno = $this->alumnoRepository->update($estadoAlumno, json_decode($key)->id);
        }

        $apoderado = $this->apoderadoRepository->update($estadoApoderado, $alumno->idApoderado);

        session()->forget('idAlumnos');

        ////////////////////////////////////////////////////////////
        //////////////END CAMBIOS A LOS ESTADOS/////////////////////
        ////////////////////////////////////////////////////////////

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
