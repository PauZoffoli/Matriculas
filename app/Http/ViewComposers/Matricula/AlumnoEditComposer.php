<?php 

namespace App\Http\ViewComposers\Matricula;
use Illuminate\Contracts\View\View;
use App\Models\Alumno;
use App\Models\Persona;
use App\Http\Controllers\Helpers\Helper;
use App\Repositories\PersonaRepository;


class AlumnoEditComposer{

    private $personaRepository;
    private $alumnoRepository;
 
    public function __construct(PersonaRepository $personaRepo)
    {
        $this->personaRepository = $personaRepo;
        
    }


	public function compose(View $view){

        $id = $view->getData()['id']; //Por dos controlladores de AlumnoPcONTROLLER Y lOOPAlumnosController nos llega el id que buscamos
        dd($this->personaRepository->find($id));
       // $persona = $this->personaRepository->find($id);
        $alumno = $persona->has('alumno')->find($id);

        dd($persona,  $alumno);
   

     
dd("asd");
//falta validar si es alumno. 

        //$view->getData();
        //Metodo para que no cambien id en el link
        //  $var = $persona->alumno->apoderadoValidation->persona;
        //$this->authorize('pass', $var);

        $responsables = null;
        $padre = null;
        $madre = null;
           
        //Los responsables de ese alumno es: $persona->alumno->alumnoResponsables
        //Acceder a los datos de AlumnoResponsable $persona->alumno->alumnoResponsables[0]->pivot->parentesco
        //acceder al padre $value->pivot->pivotParent;
        if (!$persona->alumno->alumnoResponsables->isEmpty()) { //Si no está vacío es por que tiene responsables

 
            foreach ($persona->alumno->alumnoResponsables as $key => $value) {

                if( $value->pivot->parentesco == "Padre"){ //si es padre el $request padre será esa persona (pivotParent)
                
                    $padre = $value->pivot->idPersona;
                    $padre = $this->personaRepository->findWithoutFail($padre); //Buscamos a la persona padre relacionada
                }
                if( $value->pivot->parentesco == "Madre"){
                    $madre = $value->pivot->idPersona;
                    $madre = $this->personaRepository->findWithoutFail($madre);
                    
                }
                
            }
        }

        //TRA
        $view->with('persona', $persona)->with('padre',$padre)->with('madre',$madre);
	}

}
 
