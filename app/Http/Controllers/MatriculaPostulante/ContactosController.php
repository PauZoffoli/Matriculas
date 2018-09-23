<?php

namespace App\Http\Controllers\MatriculaPostulante;

use App\Http\Requests\CreateAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Repositories\AlumnoRepository;
use App\Http\Requests\CreatePersonaRequest;
use App\Http\Requests\UpdatePersonaRequest;
use App\Repositories\PersonaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Persona;

class ContactosController extends AppBaseController
{
    /** @var  PersonaRepository */
    private $personaRepository;

    public function __construct(PersonaRepository $personaRepo)
    {
        $this->personaRepository = $personaRepo;
    }


    /**
     * Display a listing of the Alumno.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new Alumno.
     *
     * @return Response
     */
    public function create()
    {
        return view('MatriculaPostulante.contactos.create');
    }

   public function store(CreatePersonaRequest $request)
    {
        //$input = $request->all();

      
       if (isset($request->pContacto)) {
       	foreach ($request->pContacto as $key => $value) {
          
       		
          $existeRut = Persona::where('rut', '=', $value['rut'])->first();
          if ($existeRut==null) {
            $persona = $this->personaRepository->create($value);
            
          }

          $request->session()->put('contactos', $request->all());
       		
       	}

       }

        Flash::success('Persona saved successfully.');

        return redirect(route('padres.create'));
    }



}
