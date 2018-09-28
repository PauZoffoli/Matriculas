<?php

namespace App\Http\Controllers\VistaSecretariado;

use App\Http\Requests\CreateContratoRequest;
use App\Http\Requests\UpdateContratoRequest;
use App\Repositories\ContratoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Alumno;
use App\Models\Apoderado;
use App\Models\Contrato;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Barryvdh\DomPDF\Facade as PDF;

class ContratoSecretariadoController extends AppBaseController
{
    /** @var  ContratoRepository */
    private $contratoRepository;

    public function __construct(ContratoRepository $contratoRepo)
    {
        $this->contratoRepository = $contratoRepo;
    }

    /**
     * Display a listing of the Contrato.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
            
    }


    /**
     * Store a newly created Contrato in storage.
     *
     * @param CreateContratoRequest $request
     *
     * @return Response
     */
    public function store(CreateContratoRequest $request)
    {   
        switch ($request->get('btnContratoPagare')) {
            case 'contrato': 
                //$request->request->add(['idApoderado'=>$idApo]);
                $input = $request->all();
                //dd($input);
                $contrato = Contrato::where('idApoderado',$input['idApoderado']);
                //dd($contrato);
                if(empty($contrato))
                {
                    $contrato = $this->contratoRepository->create($input);
                    Flash::success('Contrato creado correctamente.');
                }

                $contrato = $this->contratoRepository->create($input);
                    Flash::success('Contrato creado correctamente.');
                
                $apoderado = Apoderado::where('id', $request->idApoderado)->first();
                //dd($apoderado);
                $vista = view('secretariado/contratoPDF')->with('datos',$apoderado);
                //dd($request->all());
                //dd($apoderado->alumnos);

                $pdf = \PDF::loadHTML($vista);
                //dd($pdf);
                $pdf->setPaper("legal","portrait");

                  //GUARDAMOS EL PDF EN NUESTROS ARCHIVOS
               /** if ($pdf!= null) {
                    $output = $pdf->output();
                    $nombreArchivo = $contrato->id . '-'. $estado. '-'. $apoderado['rut'] . '.pdf'; 
                try {

                     file_put_contents('../storage/app/PDF2019Matriculas/'.$nombreArchivo, $output);
                }catch (Exception $e) {
                    Flash::success('ERROR DE RUTA O PERMISOS A STORAGE');
                return redirect(route('secretariado.indexContrato'));
                }
            }**/
        
    
            
                return $pdf->stream('pdfContrato');
                //return redirect(route('contratos.index'))   
            break;

            case 'pagare': 
                $input = $request->all();
                //dd($input);
                //$contrato = $this->contratoRepository->create($input);
                //Flash::success('Contrato saved successfully.');
                $apoderado = Apoderado::where('id', $request->idApoderado)->first();
                //dd($apoderado);
                $vista = view('secretariado/pagarePDF')->with('datos',$apoderado)->with('req',$request);
                //dd($request->all());
                $pdf = \PDF::loadHTML($vista);
                $pdf->setPaper("legal","portrait");
                return $pdf->stream('pdfPagare');
                //return redirect(route('contratos.index'));  
            break;

            case 'ficha': 
                $input = $request->all();
                //dd($input);
                //$contrato = $this->contratoRepository->create($input);
                //Flash::success('Contrato saved successfully.');
                $apoderado = Apoderado::where('id', $request->idApoderado)->first();
                //dd($apoderado);
                $vista = view('secretariado/fichaPDF')->with('datos',$apoderado)->with('req',$request);
                //dd($request->all());
                $pdf = \PDF::loadHTML($vista);
                $pdf->setPaper("legal","portrait");
                return $pdf->stream('pdfFicha');
                //return redirect(route('contratos.index'));  
            break;
        }
        
    }

    public function do_function_1(){
    // put the code here
}



    /**
     * Display the specified Contrato.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified Contrato.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified Contrato in storage.
     *
     * @param  int              $id
     * @param UpdateContratoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContratoRequest $request)
    {

    }

    /**
     * Remove the specified Contrato from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
      
    }
}
