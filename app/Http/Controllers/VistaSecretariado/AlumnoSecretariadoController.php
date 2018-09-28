<?php

namespace App\Http\Controllers\VistaSecretariado;

use App\Repositories\ContratoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Alumno;
use Flash;
use App\Repositories\PersonaRepository;
use App\Repositories\AlumnoRepository;
use Illuminate\Database\Eloquent\Collection;

use App\Models\Apoderado;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Barryvdh\DomPDF\Facade as PDF;


class AlumnoSecretariadoController extends AppBaseController
{
    private $personaRepository;
    private $apoderadoRepository;
    private $alumnoRepository;

    public function __construct(AlumnoRepository $alumnoRepo)
    {
         $this->alumnoRepository = $alumnoRepo;
            
    }

        public function update($id)
        {
    
       //$alumno = $this->alumnoRepository->findWithoutFail($id);
        //$alumno = $this->alumnoRepository->all()->Where('idApoderado', $id)->get();
        $alumno = Alumno::where('idApoderado', $id)->orderBy('id', 'DESC')->get();
       //dd($alumno);

        if (empty($alumno)) {
            Flash::error('Alumnos no encontrados');

            return redirect(route('apoSecretariadoContr.index')->get());
             }
        
            return view('secretariado.indexContrato')   
            ->with('alumnos', $alumno);
        }

        public function ficha($alumno)
        {
            $input = $alumno;
            dd($input);
            $apoderado = Apoderado::where('id', $input->idApoderado)->first();
            dd($apoderado);
            $vista = view('secretariado/fichaPDF')->with('datos',$apoderado)->with('req',$request);
            $pdf = \PDF::loadHTML($vista);
            $pdf->setPaper("legal","portrait");
            return $pdf->stream('pdfFicha');
        }

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
         $input = $id;
            //dd($input);
            $alumno = Alumno::where('id', $input)->first();
            $apoderado = Apoderado::where('id', $alumno->idApoderado)->first();
            //dd($apoderado);
            $vista = view('secretariado/fichaPDF')->with('datos',$apoderado)->with('alu',$alumno);
            $pdf = \PDF::loadHTML($vista);
            $pdf->setPaper("legal","portrait");
            return $pdf->stream('pdfFicha');
    }

    /**
     * Update the specified Contrato in storage.
     *
     * @param  int              $id
     * @param UpdateContratoRequest $request
     *
     * @return Response
     */


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
