<?php

namespace App\Http\Controllers\Personas;

use App\Repositories\ContratoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Persona;
use Flash;
use App\Repositories\PersonaRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Helpers\Helper;
use Illuminate\Pagination\AbstractPaginator;
use App\Criteria\Apoderados;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;


//http://localhost:8000/apoSecretariadoContr
class PersonaController extends AppBaseController
{
    private $personaRepository;
    
     public function __construct(PersonaRepository $personaRepo)
    {
         $this->personaRepository = $personaRepo;
            
    }

    public function searchPersona($rut) {
 //         $rutWithFormat =  trim(strtolower($rut));
 // return $persona = Persona::where('rut', 'LIKE', '%' .$rutWithFormat .'%')->get()->first();

            $rutWithFormat =  trim($rut);
            if(!empty($rutWithFormat)){
                $persona = Persona::where('rut', 'LIKE', $rutWithFormat)->get()->first();
                    return response()->json($persona);
            }   
           
    }

}
