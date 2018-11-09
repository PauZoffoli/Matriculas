<?php

namespace App\Http\Controllers\VistaSecretariado\DescargaPDFContrato;

use App\Repositories\ContratoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Alumno;
use App\Models\Contrato;
use Flash;
use App\Repositories\PersonaRepository;
use App\Repositories\AlumnoRepository;
use Illuminate\Database\Eloquent\Collection;

use App\Models\Apoderado;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Barryvdh\DomPDF\Facade as PDF;
use Exception;
use Illuminate\Validation\ValidationException;

class PdfContratoController extends AppBaseController
{
	/** @var  ContratoRepository */
    private $contratoRepository;

    public function __construct(ContratoRepository $contratoRepo)
    {
        $this->contratoRepository = $contratoRepo;
    }


	public function pdfContratoStream(Request $request, $id){
		
		$contrato = $this->contratoRepository->requireOne('Contrato', $id);

		//Si el contrato no tiene URL, lanzar error
		if(!$contrato->urlContrato){
			Flash::error("El contrato no ha sido asociado con un PDF. Para asociarlo: genere nuevamente el contrato, yendo a el botón 'GENERAR O EDITAR' para volver a crearlo.");
    		return redirect('/apoSecretariadoContr');
		}
		
		return response()->file(storage_path('/app' . $contrato->urlContrato));
	}

	public function pdfPagareStream(Request $request, $id){
		
		$contrato = $this->contratoRepository->requireOne('Contrato', $id);

		//Si el contrato no tiene URL, lanzar error
		if(!$contrato->urlPagare){
			Flash::error("El pagaré no ha sido asociado con un PDF. Para asociarlo: genere nuevamente el pagaré, yendo a el botón 'GENERAR O EDITAR' para volver a crearlo.");
    		return redirect('/apoSecretariadoContr');
		}
		
		return response()->file(storage_path('/app' . $contrato->urlPagare));
	}

}