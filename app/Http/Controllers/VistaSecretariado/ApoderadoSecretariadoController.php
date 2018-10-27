<?php

namespace App\Http\Controllers\VistaSecretariado;

use App\Repositories\ContratoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Persona;
use Flash;
use App\Repositories\PersonaRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Helpers\Helper;

class ApoderadoSecretariadoController extends AppBaseController
{
    private $personaRepository;
    private $apoderadoRepository;
    

     public function __construct(PersonaRepository $personaRepo)
    {
         $this->personaRepository = $personaRepo;
            
    }

     public function index(Request $request)
    { 

         $personas = Persona::whereHas('apoderados')->orderBy('id', 'DESC')->paginate(10);

        $var = new Collection();
         foreach ($personas as $persona){ 
            if($persona->hasTipo('ApoderadoPostulante')){
              $var->push($persona);  
              
             }
         }

        return view('secretariado.index')   
            ->with('personas', $var);
    }

    
    public function searchPersona(Request $request) {

        if(empty(trim($request->get('rut')))){

            return redirect()->route('apoSecretariadoContr.index');
        }
        // Sets the parameters from the get request to the variables.
        $rut = $request->get('rut');
        
        $personas = Persona::whereHas('apoderado', function($query) use($rut) {
            $query->where('rut', $rut);
        })->get();

        if ( empty($personas->all())) {
           Flash::error('El rut de la persona ingresada no encontró coincidencias, revise que esté correctamente escrito');

           return redirect(route('apoSecretariadoContr.index'));
       }

        return view('secretariado.index')->with('personas',$personas); //Redirigir al index después de buscar
        
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
         $persona =  $this->personaRepository->hasOneRelated('Persona', 'Apoderado', 'apoderado', $id);

        return view('MatriculaPostulante.apoderados.edit')->with('persona', $persona)->with('revisorMatriculando', true); //vamos a la vista edit de apoderados, pero este redirige al controller update 

    }



    

}
