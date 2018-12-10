<?php

namespace App\Http\Controllers\VistaSecretariado;

use App\Http\Requests\CreateContratoRequest;
use App\Http\Requests\UpdateContratoRequest;
use App\Repositories\ContratoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Alumno;
use App\Models\AlumnoContrato;
use App\Models\Apoderado;
use App\Models\Contrato;
use App\Models\DetalleBecaAlumno;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Barryvdh\DomPDF\Facade as PDF;

use App\Http\Controllers\Tools\ToolsForPagare;

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
     * Show the form for editing the specified Contrato.
     * BOTÓN DE VER CONTRATO
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contrato = $this->contratoRepository->hasOneRelated('Contrato', 'Realice el contrato nuevamente. El Alumno relacionado al contrato', 'alumnos', $id);
        return view('secretariado.indexContrato')->with('alumnos', $contrato->alumnos);
    }


    /**
     * Store a newly created Contrato in storage.
     *
     * @param CreateContratoRequest $request
     *
     * @return Response
     */
    public function store(CreateContratoRequest $request )
    {
        $idAlumnosSeleccionados = json_decode($request->idAlumnos); //Los id de los alumnos que usaremos para atachear alumno_contrato
                //Creamos o updateamos el contrato
                

////////////1)----------->>VALIDACIONES
////////////1)----------->>VALIDACIONES
////////////1)----------->>VALIDACIONES

                //validar que el año a contratar no pueda ser mayor a la fecha de contratación
                if($request['anioAContratar'] < date("Y", strtotime($request['fechaContrato']))){
                    Flash::error("La fecha de contrato no puede ser superior al actual");
                    return redirect(route('apoSecretariadoContr.index'));
                }

                //Yo solo tengo dos opciones, contratar para este año o para el próximo
                //Si el año a la fechaAContratar no es para el proximo año, entonces quiere decir que es para este año 
                //Entonces da lo mismo si ponen que contratan para el 1990 para el año 2019, el 1990 lo va a tomar como 2018
                if( (date('Y')+1) != date("Y", strtotime($request['fechaContrato']))){
                    $request['fechaContrato'] =  date('Y') . '-'. date("m-d", strtotime($request['fechaContrato'])) ;
                }

                //Validación de no poder contratar estudiantes para este mismo año en diciembre
                $maximoDeCuotas = 11;
                $mesAContratar = date("m", strtotime($request['fechaContrato'])); //QUITAR COMENTARIO
                $anioAContratar = date("Y", strtotime($request['fechaContrato']));

                if($request['anioAContratar'] == $anioAContratar ){

                    if($mesAContratar == 12){
                        Flash::error("Usted no puede matricular a ningún estudiante para el año: ". $request['anioAContratar']. " en el mes " . $mesAContratar);
                        
                         return redirect(route('apoSecretariadoContr.index'));
                    }
                    $maximoDeCuotas = $maximoDeCuotas - $mesAContratar + 1;
                }

////////////2)----------->>Definir el máximos de cuotas
////////////2)----------->>Definir el máximos de cuotas             
////////////2)----------->>Definir el máximos de cuotas 

                //Existe un máximo de cuotas que permite el sistema, 11, que 
                //se ven afectadas por el mes a contratar 7 máximo pero le quieren poner 8
                
                if($maximoDeCuotas < $request['nroCuotas']){
                    $request['nroCuotas'] = $maximoDeCuotas;
                }

////////////3)----------->>Redefinir el total a pagar
////////////3)----------->>Redefinir el total a pagar           
////////////3)----------->>Redefinir el total a pagar

                //Tenemos que reajustar el valor del total a pagar puesto 
                //que depende de la fecha en que vengo a matricular
                $tools = new ToolsForPagare(
                                $mesAContratar, 
                                $request['anioAContratar'],
                                $request['arancelAnualAlumnos'],
                                $maximoDeCuotas
                            );

               
                $request['totalAPagar'] = $tools->totalAPagar();

                $input = $request->all();

                //dd($input);
                $primerContrato = Contrato::where('idApoderado',$input['idApoderado'])
                                ->where('anioAContratar', $input['anioAContratar'])
                                ->first();
                
                //En caso que no exista el contrato del año a contratar, crearlo
                if(is_null($primerContrato))
                {
                    $primerContrato = $this->contratoRepository->create($input);

                    Flash::success('Contrato creado correctamente.');
                }else{
                    $primerContrato = $this->contratoRepository->update( $input, $primerContrato->id );
                }

                //pasamos la collecion que viene desde la vista, a un simple array
                $arraysIdsAlumnosAMatricular = [];
                foreach($idAlumnosSeleccionados as $key => $alumnno){
                    array_push ($arraysIdsAlumnosAMatricular, $alumnno->id );
                }

                /*ATACHEAMOS el arreglo de ids ALUMNO_CONTRATO*/
                $this->contratoRepository->sync(
                        $primerContrato->id,
                        "alumnos",
                        $arraysIdsAlumnosAMatricular,
                        true);
    
                //Guardamos o actualizamos las becas acorde al año
                 foreach ($arraysIdsAlumnosAMatricular as $key => $value) {
                     DetalleBecaAlumno::updateOrCreate(
                        ['idAlumno'=> $value,'anioBeca'=>$input['anioAContratar']],
                        ['porcentaje'=>$input['beca'][$key]]);
                 }
                 //dd("end");


                $apoderado = Apoderado::where('id', $request->idApoderado)->first();
           
       switch ($request->get('btnContratoPagare')) {
           case 'contrato':


                $vista = view('secretariado/contratoPDF')->with('datos',$apoderado)->with('primerContrato',$primerContrato)->with('alumnosEnContrato', $primerContrato->alumnos);
                $pdf = \PDF::loadHTML($vista);
                //dd($pdf);
                $pdf->setPaper("legal","portrait");

                //GUARDAMOS EL PDF EN NUESTROS ARCHIVOS
                if ($pdf!= null) {
                    $output = $pdf->output();
                    $nombreArchivo = $primerContrato->id . '-'. $apoderado->persona->rut . '-'. $input['fechaContrato'] . '.pdf'; 
                try {
                     
                     file_put_contents( (storage_path('../storage/app/PDF2018a2019Contratos/C' . $nombreArchivo)), $output );
                     $primerContrato->urlContrato = '/PDF2018a2019Contratos/C'.$nombreArchivo;
                     $primerContrato->save();
                }catch (Exception $e) {
                    Flash::success('ERROR DE RUTA O PERMISOS A STORAGE');
                return redirect(route('apoSecretariadoContr.index'));
                }
            }
        
            return $pdf->stream('pdfContrato');
                //return redirect(route('contratos.index'))   
            break;

            case 'pagare': 

                $vista = view('secretariado/pagarePDF')->with('datos',$apoderado)->with('maximoDeCuotas', $maximoDeCuotas)
                ->with('contrato',$request)->with('primerContrato',$primerContrato)->with('alumnosEnContrato', $primerContrato->alumnos)->with('tools' , $tools);
                //dd($request->all());
                $pdf = \PDF::loadHTML($vista);
                $pdf->setPaper("legal","portrait");

                //GUARDAMOS EL PDF EN NUESTROS ARCHIVOS
                if ($pdf!= null) {
                    $output = $pdf->output();
                    $nombreArchivo = $primerContrato->id . '-'. $apoderado->persona->rut . '-'. $input['fechaContrato'] . '.pdf'; 
                try {

                     file_put_contents( (storage_path('../storage/app/PDF2018a2019Pagares/P' . $nombreArchivo)), $output );
                     $primerContrato->urlPagare = '/PDF2018a2019Pagares/P'.$nombreArchivo;
                     $primerContrato->save();
                }catch (Exception $e) {
                    Flash::success('ERROR DE RUTA O PERMISOS A STORAGE');
                    return redirect(route('apoSecretariadoContr.index'));
                }


                return $pdf->stream('pdfPagare');
                //return redirect(route('contratos.index'));  
                 }
            break;

}      
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
