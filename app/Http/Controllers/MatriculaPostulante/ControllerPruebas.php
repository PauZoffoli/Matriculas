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
        //dd($persona->alumno->repitencia()->count());

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

        return view('MatriculaPostulante.alumnos.edit')->with('persona', $persona)->with('padre',$padre)->with('madre',$madre)->with('pContacto',$pContacto)->with('sContacto',$sContacto);

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



        //dd($request->alumno['parentesco'], $request->padreOMadrePC,$request->padreOMadreSC  , $request->padre , $request->madre ,$request->pContacto ,$request->sContacto );

        if($persona->alumno->fichaAlumno==null){ //Si el alumno no tiene una ficha asociada, se le crea en el momento
             $fichaAlumno = $this->fichaAlumnoRepository->create($request->fichaAlumno[0]);
        }

        $persona->alumno->repitencia()->sync($request->repitencia); //AGREGAMOS LOS DATOS PIVOTE DE LAS REPITENCIAS https://stackoverflow.com/questions/23968415/laravel-eloquent-attach-vs-sync 

        $request->request->add(['alumno[repitencias]' => $persona->alumno->repitencia()->count()]); //cambiamos el valor del request"repitencias que tiene el número de repitencias del alumno"

        Helper::updateThis($this->direccionRepository,$request->direccion, $persona->direccion->id);
        unset($request['direccion']); //Produce el error array to string, por eso direccion se borra antes
        $persona = $this->personaRepository->update($request->all(), $id);
        $alumno = Helper::updateThis($this->alumnoRepository,$request->alumno, $persona->alumno->id);
        Helper::updateThis($this->fichaAlumnoRepository, $request->fichaAlumno[0],  $request->fichaAlumno[0]['id']);
        
        /////////////AHORA OCUPAMOS LAS VARIABLES DE SESIÓN/////////////////
        $todosLosAlumnos = $request->session()->get('todosLosAlumnos');

        $todosLosAlumnos =  Helper::deleteFirst($todosLosAlumnos); //Borramos el primer elemento del array, que fue el que acabamos de utilizar y updatear

        ////////////////////////////////////////////////////////////////////
        ///////////////////////GUARDADO DE CONTACTOS////////////////////////
        ////////////////////////////////////////////////////////////////////
        //dd($request->padreOMadrePC, $request->padreOMadreSC );


   /*     if($request->padreOMadrePC =="0" && $request->padreOMadreSC =="0"){ //Si los contactos no son ni el padre ni la madre
            $this->Contactos($persona, $request);
        }
        
        $apoderadoAlumnos = $request->session()->get('apoderadoAlumnos');

        $tipoPersona = new TipoPersona();
        $tipoPersona->idPersona = $apoderadoAlumnos->id;


        //Si el apoderado es padre, madre
        if($request->alumno['parentesco']=="Padre" || $request->alumno['parentesco']=="Madre"){
            //Agregar el tipo a la persona Apoderado

            if($request->alumno['parentesco']=="Padre"){
                Helper::pivotAddTipo('Padre', $tipoPersona, $apoderadoAlumnos); //Llamamos al método para agregar un pivote de TipoPersona
            }

            if($request->alumno['parentesco']=="Madre"){
                Helper::pivotAddTipo('Madre', $tipoPersona, $apoderadoAlumnos); //Llamamos al método para agregar un pivote de TipoPersona
            }
        }


        //Si el padre será el primer contacto
    if($request->padreOMadrePC == "1"){
            //Agregar tipos a la persona Padre de ese alumno
        //Tengo que agregar al padre la relación de tipo Primer Contacto
        dd("HOLA");
            
    }


        //si la madre será el segundo contacto
    if($request->padreOMadreSC == "1"){
            //Agregar tipos a la persona Madre

    }

        */


    //Cómo valido?
    //Si marcó Parentesco Padre, valido a la madre
    //Si marcó Parentesco Madre valido al padre
    //Si marcó 0 contactos no valido nada
    //Si marcó que desea tener 1 contacto valido Primer Contacto
    //Si marcó que desea tener 2 contactos valido el Segundo Contacto
    //Si marcó que desea que la madre sea el primer contacto al momento 



    //Esto refiere al apoderado


//Si el apoderado es padre o madre relacionar a la persona por variable "Padres" siempre y cuando la relación no exista de antes
//Además. si es padre o madre se va a tener que crear la relación de la Persona APODERADO actual a la tabla
//Alumo Responsable y relacionarlas

       $apoderadoAlumnos = $request->session()->get('apoderadoAlumnos');
        if($request->alumno['parentesco']=="Padre" || $request->alumno['parentesco']=="Madre"){ //Si el apoderado es padre o madre
            
            $tipoPersona = new TipoPersona();
            $tipoPersona->idPersona = $apoderadoAlumnos->id;
            //Agregar el tipo a la persona Apoderado

            if($request->alumno['parentesco']=="Padre"){
                Helper::pivotAddTipo('Padres', $tipoPersona, $apoderadoAlumnos); //Llamamos al método para agregar un pivote de TipoPersona

                //Ahora debemos crear un AlumnoResponsable con parentesco "Padre"
                Helper::pivotAddAlumnoResponsableApoderado($request->alumno, "Padre", $apoderadoAlumnos);

                //Ahora debemos comprobar que la madre exista, si no se crea
                $existePersonaRut = Persona::where('rut', '=', $request->madre['rut'])->first();
                if ($existePersonaRut ==null){
                    $madre = $this->personaRepository->create($request->madre);
                    Helper::pivotAddAlumnoResponsableApoderado($request->alumno, "Madre", $madre);

                }else{
                     Helper::pivotAddAlumnoResponsableApoderado($request->alumno, "Madre", $request->madre);

                }
                //dd("Padre Apoderado Creado");
            }

            if($request->alumno['parentesco']=="Madre"){
                Helper::pivotAddTipo('Padres', $tipoPersona, $apoderadoAlumnos); //Llamamos al método para agregar un pivote de TipoPersona
                Helper::pivotAddAlumnoResponsableApoderado($request->alumno, "Madre", $apoderadoAlumnos);

                 $existePersonaRut = Persona::where('rut', '=', $request->padre['rut'])->first();
             //    dd($existePersonaRut);
                if ($existePersonaRut ==null){
                    $padre = $this->personaRepository->create($request->madre); //  dd("ee");

                    Helper::pivotAddAlumnoResponsableApoderado($request->alumno, "Padre", $padre);

                }else{
                     //     dd("ee");
                     Helper::pivotAddAlumnoResponsableApoderado($request->alumno, "Padre", $request->all());

                }

               // dd("Madre Apoderado Creado");
            }
           //  dd("Padre O Madre");
        }

        //Si el parentesco del apoderado con el alumno no es ni Padre ni Madre, puede ser cualquier grado de parentesco,
        //por lo que creo a dos padres, es decir, dos personas mientras su rut no exista en la base de datos.

            //Si su rut existe, no lo edito
            //Si su rut no existe lo guardo0.
       // dd($request->all());
        if($request->alumno['parentesco']!="Padre" && $request->alumno['parentesco']!="Madre"){ //Si es que el parentesco del alumno con el apoderado no ni padre ni madre, tenemos que guardar los datos de ambos.

            //¿Existe su rut de antes?

            $existeRutPadre = Persona::where('rut', $request->padre['rut'])->first();
            if ($existeRutPadre==null) {//Creo la persona 
                $this->personaRepository->create($request->padre);
                dd("Se creó la persona con rut diferente");
            }else{ //Updateo la la relación de la persona con el Alumno
                //Tengo que preguntar si anteriormente tenian una relación
                $existeAlumnoResponsable = AlumnoResponsable::where('idAlumno',$request->alumno['id'])->where('idPersona',$apoderadoAlumnos->id)->first(); //id del alumno e id de la persona
                
                if ($existeAlumnoResponsable==null) { //Creo la relación
                    $AlumnoResponsable = new AlumnoResponsable();
                    $AlumnoResponsable->idAlumno = $request->alumno['id'];
                    $AlumnoResponsable->idPersona = $apoderadoAlumnos->id;
                    $AlumnoResponsable->parentesco = $request->alumno['parentesco'];

                    $AlumnoResponsable->save();
                    dd("Alumno responsable nuevo creado");
                }else{
                   
                    $existeAlumnoResponsable->parentesco = $request->alumno['parentesco'];
                    $existeAlumnoResponsable->save();
                    //dd("Alumno responsable updateo creado");
                }

            }

            //¿Existe su rut de antes?
            $existeRutMadre = Persona::where('rut', $request->madre['rut'])->first();
            if ($existeRutMadre==null) {//Creo la persona 
                $this->personaRepository->create($request->madre);
                dd("Se creó la persona con rut diferente");
            }else{ //Updateo la la relación de la persona con el Alumno
                //Tengo que preguntar si anteriormente tenian una relación
                $existeAlumnoResponsable = AlumnoResponsable::where('idAlumno',$request->alumno['id'])->where('idPersona',$apoderadoAlumnos->id)->first(); //id del alumno e id de la persona
                
                if ($existeAlumnoResponsable==null) { //Creo la relación
                    $AlumnoResponsable = new AlumnoResponsable();
                    $AlumnoResponsable->idAlumno = $request->alumno['id'];
                    $AlumnoResponsable->idPersona = $apoderadoAlumnos->id;
                    $AlumnoResponsable->parentesco = $request->alumno['parentesco'];

                    $AlumnoResponsable->save();
                    dd("Alumno responsable nuevo creado");
                }else{
                   
                    $existeAlumnoResponsable->parentesco = $request->alumno['parentesco'];
                    $existeAlumnoResponsable->save();
                     dd("Alumno responsable updateo creado");
                }

            }
            dd("Funcó");
        }

    //Esto refiere a los Contactos

/***************Segundo Contacto***************************/
        //Preguntar si el rut ingresado existe en la bd:
//--------->>>>> Si existe los datos de este no se borran, se verifica que ese idPersona ya está asociada a ser un Contacto, 
            //si no está asociada a ser un contacto, se agrega como Contacto, si está asociada no se hace nada.

       
        //Verificamos que alumno y persona en AlumnoResponsable no se relacionen de antes:
           # //- si se relacionan de antes,

                 //1.-Se updatea el "contacto" del AlumnoResponsable a SegundoContacto
                 //2.-Se pregunta si el parentesco es padre o madre o ninguno de los dos
                    
                    //2.1.-Si es ninguno de los dos
                        //1.- Se updatea el parentesco del AlumnoResponsable con el valor de la variable por default
                    //2.2.-Si es alguno de los dos
                            //1.1-Se updatea el parentesco del AlumnoResponsable con el valor de la variable parentesco HTML
    

           # //- si no se relacionan de antes de hace el attach.


//--------->>>>> Si el rut no existe  
           //1.-Se crea la persona y se le agrega tipo "Contacto"
           //2.-Se pregunta si el parentesco es padre o madre o ninguno de los dos

//2.1.-Si es ninguno de los dos
            //1.-Se crea la relación AlumnoResponsable
            //2.-Se saca parentesco de la variable que viene por default y se guarda
//2.2.-Si es alguno de los dos
                //1.1-Se crea la relación AlumnoResponsable
                //1.2-Se obtiene el parentesco HTML se le pone al "parentesco"    AlumnoResponsable 
                  
                
 //3.-El AlumnoResponsable será un "SegundoContacto"
//4.- Se salva esta relación

        


/***************Primer Contacto***************************/////////
        //Preguntar si el rut ingresado existe en la bd:
            //- Si existe los datos de este no se borran, se verifica que ese idPersona ya está asociada a ser un Contacto, 
            //- si no está asociada a ser un contacto, se agrega como Contacto, si está asociada no se hace nada.

        //Verificamos que alumno y persona en Alumno responsable no se relacionen de antes:
            //- si se relacionan de antes, updateamos el contacto a primer contacto de alumno responsable
            //- si no se relacionan de antes de hace el attach.

        //Si el rut del ingresado no existe:
            //1.-Se crea la persona y se le agrega tipo "Contacto"
            //2.-Se crea la relación AlumnoResponsable


   
        ////////////////////////////////////////////////////////////////////
        //////////////////END//GUARDADO DE CONTACTOS////////////////////////
        ////////////////////////////////////////////////////////////////////
       

        if ($todosLosAlumnos!=null) {
           
           // \Session::flash('flash_message','Alumno editado exitósamente.');
            $request->session()->put('todosLosAlumnos', $todosLosAlumnos);//Guardamos los alumnos que nos van quedando en la misma variable
            return redirect()->route('alumnosPostulantes.edit', json_decode($todosLosAlumnos[0])->idPersona);
        }
        session()->forget('todosLosAlumnos'); //cuando quede ningún alumno en la variable la olvidaremos
        session()->forget('apoderadoAlumnos');

        $this->cambioDeEstados($alumno, $request); //Método que está en el mismo controller. Cambiamos los estados de los Alumnos

        \Session::flash('flash_message','Alumno editado exitósamente.');
        return view('MatriculaPostulante.FinProcesoMatricula');
    }



    /*MÉTODO PARA VALIDAR Y DESPEJAR EL CONTROLLER*/
    public function validaciones($request){

        $validate = Helper::manualValidation($request->fichaAlumno, (new CreateFichaAlumnoRequest()), "1)Errores de la Ficha del Alumno: ", 1);
        $validate = $validate . Helper::manualValidation($request->padre, (new CreatePersonaRequest()), "2)Errores de los datos del Padre: ",2);
        $validate = $validate . Helper::manualValidation($request->madre, (new CreatePersonaRequest()), "3)Errores de los datos de la Madre: ",3);
        $validate = $validate . Helper::manualValidation($request->pContacto, (new CreatePersonaRequest()), "4)Errores de los datos del Primer Contacto: ",4);
        $validate = $validate . Helper::manualValidation($request->sContacto, (new CreatePersonaRequest()), "5)Errores de los datos del Segundo Contacto: ",5);

        return $validate;

    }

    public function Contactos($persona, $request){
        if(isset($persona->alumno->alumnoResponsables[0])){
        $valor = $persona->alumno->alumnoResponsables;
        $tienePadre = null;
        $tieneMadre = null;
        $tienepContacto = null;
        $tienesContacto = null;

            foreach ($valor as $key => $value) {

               $personaPivotEncontrada = Persona::find($value->pivot->idPersona);
              
               if($personaPivotEncontrada->hasTipo("Padre")){
                    $tienePadre = $tienePadre . "SI";
                    $this->personaRepository->update($request->padre, $value->pivot->idPersona);

               }

                if($personaPivotEncontrada->hasTipo("Madre")){
                    $tieneMadre = $tieneMadre . "SI";
                    $this->personaRepository->update($request->madre, $value->pivot->idPersona);
               }

                if($personaPivotEncontrada->hasTipo("PrimerContacto")){
                     $tienepContacto = $tienepContacto . "SI";
                     $this->personaRepository->update($request->pContacto, $value->pivot->idPersona);
                      AlumnoResponsable::where('id', $value->pivot->id)->update(array('parentesco' => $request->pContacto['parentesco']));


               }
                if($personaPivotEncontrada->hasTipo("SegundoContacto")){
                     $tienesContacto = $tienesContacto . "SI";
                     $this->personaRepository->update($request->sContacto, $value->pivot->idPersona);
                     AlumnoResponsable::where('id', $value->pivot->id)->update(array('parentesco' => $request->sContacto['parentesco']));
               }
                   
            }
        if($tienePadre==null){
             Helper::createPivot($this->personaRepository,$request->padre , $persona->alumno->id , "Padre", "Padre");
             dd("tienePadre");
        }
        if($tieneMadre==null){
            Helper::createPivot($this->personaRepository,$request->madre , $persona->alumno->id , "Madre", "Madre");
            dd("tieneMadre");
        }
        if($tienepContacto==null){
            Helper::createPivot($this->personaRepository,$request->pContacto , $persona->alumno->id , $request->pContacto['parentesco'], "PrimerContacto");
            dd("tienepContacto");
        }
        if($tienesContacto==null){
             Helper::createPivot($this->personaRepository,$request->sContacto , $persona->alumno->id , $request->sContacto['parentesco'],  "SegundoContacto");
             dd("tienepContacto");

        }

        }else{

            Helper::createPivot($this->personaRepository,$request->padre , $persona->alumno->id , "Padre", "Padre");
            Helper::createPivot($this->personaRepository,$request->madre , $persona->alumno->id , "Madre", "Madre");
            Helper::createPivot($this->personaRepository,$request->pContacto , $persona->alumno->id , $request->pContacto['parentesco'], "PrimerContacto");
            Helper::createPivot($this->personaRepository,$request->sContacto , $persona->alumno->id , $request->sContacto['parentesco'], "SegundoContacto");
           dd("Creado");
        }
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
