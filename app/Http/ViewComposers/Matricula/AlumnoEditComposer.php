<?php 

namespace App\Http\ViewComposers\Matricula;
use Illuminate\Contracts\View\View;
use App\Models\Alumno;
use App\Models\Persona;
use App\Http\Controllers\Helpers\Helper;
use App\Repositories\PersonaRepository;
use App\Repositories\AlumnoRepository;

class AlumnoEditComposer{

    private $personaRepository;
 
    public function __construct(PersonaRepository $personaRepo)
    {
        $this->personaRepository = $personaRepo;
        
        
    }


	public function compose(View $view){

        $id = $view->getData()['id']; //Por dos controlladores de AlumnoPcONTROLLER Y lOOPAlumnosController nos llega el id que buscamos
     
        ///------>1)Validamos que existan persona y alumno o se caen
        $persona =  $this->personaRepository->hasOneRelated('Persona', 'Alumno', 'alumno', $id);

        //Metodo para que no cambien id en el link
        //  $var = $persona->alumno->apoderadoValidation->persona;
        //$this->authorize('pass', $var);

        $responsables = null;
        $padre = null;
        $madre = null;
           
        //------>2)En caso de que el alumno tenga responsables, traer su padre y su madre
        if (!$persona->alumno->alumnoResponsables->isEmpty()) { 

            $responsables = $persona->alumno->alumnoResponsables; 

            $padre = $this->personaRepository->findByFieldPivot($responsables, 'pivot.parentesco', "Padre" );

            $madre = $this->personaRepository->findByFieldPivot($responsables, 'pivot.parentesco', "Madre" );
        }

        $view->with('persona', $persona)->with('padre',$padre)->with('madre',$madre);
	}

}
 
