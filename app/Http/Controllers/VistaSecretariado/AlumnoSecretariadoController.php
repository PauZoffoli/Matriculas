<?php

namespace App\Http\Controllers\VistaSecretariado;

use App\Repositories\ContratoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Alumno;
use App\Models\Contrato;
use App\Models\TipoPersona;
use App\Models\User;
use App\Models\UserRol;
use Flash;
use App\Repositories\PersonaRepository;
use App\Repositories\AlumnoRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Helpers\Helper;
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
            //dd($input);
            $apoderado = Apoderado::where('id', $input->idApoderado)->first();
            //dd($apoderado);
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
            $primerContrato = Contrato::where('idApoderado',$apoderado->id)->first();
            //dd($primerContrato);
            $vista = view('secretariado/fichaPDF')->with('datos',$apoderado)->with('alu',$alumno)->with('primerContrato',$primerContrato);
            $pdf = \PDF::loadHTML($vista);
            $pdf->setPaper("legal","portrait");

             //GUARDAMOS EL PDF EN NUESTROS ARCHIVOS
            if ($pdf!= null) {
                $output = $pdf->output();
                $nombreArchivo = $primerContrato->id . '-'. $apoderado->persona->rut . '-'. $alumno->persona->rut .'.pdf'; 
                try {
                   file_put_contents((storage_path('../storage/app/PDF2018a2019FichasAlumno/F' . $nombreArchivo)), $output );
                   
                   $alumno->fichaAlumno->urlFichaAlumno = '/PDF2018a2019FichasAlumno/F'.$nombreArchivo;
                   $alumno->fichaAlumno->save();
                   
               }catch (Exception $e) {
                Flash::success('ERROR DE RUTA O PERMISOS A STORAGE');
                return redirect(route('apoSecretariadoContr.index'));
                }
            }

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

    public function cambioApoderado(request $request)
        {
            $rutApoderado = $request->get('rutApoderado');
            $rutAlumno = $request->get('rutAlumno');

            //Si no existe la persona lanzará error

            $persona = Persona::where('rut', $rutApoderado)->get()->first();

            if(empty($persona)){
                dd($persona);
                Flash::error('El rut del apoderado ingresado no encontró coincidencias, revise que esté correctamente escrito');
               return redirect(route('cambioApoderado'))->withInput($request->all());
            }
            

            //BUSCAR APODERADO
            //Si esta persona no está asociada a ser apoderado, crear el apoderado relacionado
            $personaApoderado = Persona::whereHas('apoderado', function($query) use($rutApoderado) {
                $query->where('rut', $rutApoderado);})->get()->first();
          
            if ( $personaApoderado == null) {
                $rutParaUsuario = substr($rutApoderado, 0, -2);
                 //fin
  
                 $passwordFormateada = Helper::deleteSpacesUpperText($persona->ApPat); 
                 $passwordFormateada  = $this->normalizeChars($passwordFormateada);//Quitarle cualquier caracter especial
                 $passwordFormateada = bcrypt($passwordFormateada); // Poner en mayúsculas y hashear

                 $usuario = User::firstOrNew(array('name' =>$rutParaUsuario));
                 $usuario->email = "notengo@notengo.com";
                 $usuario->password = $passwordFormateada;
                 $usuario->save();
 
                 $nuevoApoderado = new Apoderado();
                 $nuevoApoderado->idPersona = $persona->id;
                 $nuevoApoderado->persona->idUser = $usuario->id;
                 $nuevoApoderado->persona->save();
                 $nuevoApoderado->save();
                 $personaApoderado = $nuevoApoderado->persona;

                 $rol = UserRol::firstOrNew(array('idRol' => '3', 'idUser' => $usuario->id ));
                 $rol->save();

                 $tipo = TipoPersona::firstOrNew(array('idTipo' => '1', 'idPersona' => $persona->id ));
                 $tipo->save();

              

           }
         //dd($personaApoderado->apoderado);
          $personaApoderado->apoderado->estado = "MatriculaRevisadaPorApoderado";
        
           //BUSCAR ALUMNO
            $personaAlumno = Persona::whereHas('alumno', function($query) use($rutAlumno) {
                $query->where('rut', $rutAlumno);})->get()->first();
            //dd($personaApoderado);
            if ( empty($personaAlumno)) {
               Flash::error('El rut del alumno ingresado no encontró coincidencias, revise que esté correctamente escrito');

               return redirect(route('cambioApoderado'))->withInput($request->all());
           }else{

             //OBTENCION DE ID'S
           $idApo = $personaApoderado->apoderado->id;
        
           $idAlu = $personaAlumno->alumno->id;
           
           //REALIZAR CAMBIO DE APODERADO
            $alumno = $this->alumnoRepository->update(['idApoderado' => $idApo], $idAlu);
                            
            $alumnos = Alumno::where('idApoderado', $idApo)->get();
            foreach($alumnos as $key => $alumno){
                if (isset($alumno->estado)) {
                    if ($alumno->estado == "MatriculaNoRevisadaPorApoderado" || $alumno->estado == "" || $alumno->estado == null) {
                        $personaApoderado->apoderado->estado = "MatriculaNoRevisadaPorApoderado";
                        
                    }
                }
            }
           
           }

           if (!isset($personaApoderado->direccion->calle)) {
               $personaApoderado->apoderado->estado = "MatriculaNoRevisadaPorApoderado";

           }
          
            $personaApoderado->apoderado->save();
           
            Flash::success('El Apoderado ha sido cambiado exitosamente.');

            return redirect(route('cambioApoderado'));
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
public static function normalizeChars($s) {
    $replace = array(
        'ъ'=>'-', 'Ь'=>'-', 'Ъ'=>'-', 'ь'=>'-',
        'Ă'=>'A', 'Ą'=>'A', 'À'=>'A', 'Ã'=>'A', 'Á'=>'A', 'Æ'=>'A', 'Â'=>'A', 'Å'=>'A', 'Ä'=>'Ae',
        'Þ'=>'B',
        'Ć'=>'C', 'ץ'=>'C', 'Ç'=>'C',
        'È'=>'E', 'Ę'=>'E', 'É'=>'E', 'Ë'=>'E', 'Ê'=>'E',
        'Ğ'=>'G',
        'İ'=>'I', 'Ï'=>'I', 'Î'=>'I', 'Í'=>'I', 'Ì'=>'I',
        'Ł'=>'L',
        'Ñ'=>'N', 'Ń'=>'N',
        'Ø'=>'O', 'Ó'=>'O', 'Ò'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'Oe',
        'Ş'=>'S', 'Ś'=>'S', 'Ș'=>'S', 'Š'=>'S',
        'Ț'=>'T',
        'Ù'=>'U', 'Û'=>'U', 'Ú'=>'U', 'Ü'=>'Ue',
        'Ý'=>'Y',
        'Ź'=>'Z', 'Ž'=>'Z', 'Ż'=>'Z',
        'â'=>'a', 'ǎ'=>'a', 'ą'=>'a', 'á'=>'a', 'ă'=>'a', 'ã'=>'a', 'Ǎ'=>'a', 'а'=>'a', 'А'=>'a', 'å'=>'a', 'à'=>'a', 'א'=>'a', 'Ǻ'=>'a', 'Ā'=>'a', 'ǻ'=>'a', 'ā'=>'a', 'ä'=>'ae', 'æ'=>'ae', 'Ǽ'=>'ae', 'ǽ'=>'ae',
        'б'=>'b', 'ב'=>'b', 'Б'=>'b', 'þ'=>'b',
        'ĉ'=>'c', 'Ĉ'=>'c', 'Ċ'=>'c', 'ć'=>'c', 'ç'=>'c', 'ц'=>'c', 'צ'=>'c', 'ċ'=>'c', 'Ц'=>'c', 'Č'=>'c', 'č'=>'c', 'Ч'=>'ch', 'ч'=>'ch',
        'ד'=>'d', 'ď'=>'d', 'Đ'=>'d', 'Ď'=>'d', 'đ'=>'d', 'д'=>'d', 'Д'=>'D', 'ð'=>'d',
        'є'=>'e', 'ע'=>'e', 'е'=>'e', 'Е'=>'e', 'Ə'=>'e', 'ę'=>'e', 'ĕ'=>'e', 'ē'=>'e', 'Ē'=>'e', 'Ė'=>'e', 'ė'=>'e', 'ě'=>'e', 'Ě'=>'e', 'Є'=>'e', 'Ĕ'=>'e', 'ê'=>'e', 'ə'=>'e', 'è'=>'e', 'ë'=>'e', 'é'=>'e',
        'ф'=>'f', 'ƒ'=>'f', 'Ф'=>'f',
        'ġ'=>'g', 'Ģ'=>'g', 'Ġ'=>'g', 'Ĝ'=>'g', 'Г'=>'g', 'г'=>'g', 'ĝ'=>'g', 'ğ'=>'g', 'ג'=>'g', 'Ґ'=>'g', 'ґ'=>'g', 'ģ'=>'g',
        'ח'=>'h', 'ħ'=>'h', 'Х'=>'h', 'Ħ'=>'h', 'Ĥ'=>'h', 'ĥ'=>'h', 'х'=>'h', 'ה'=>'h',
        'î'=>'i', 'ï'=>'i', 'í'=>'i', 'ì'=>'i', 'į'=>'i', 'ĭ'=>'i', 'ı'=>'i', 'Ĭ'=>'i', 'И'=>'i', 'ĩ'=>'i', 'ǐ'=>'i', 'Ĩ'=>'i', 'Ǐ'=>'i', 'и'=>'i', 'Į'=>'i', 'י'=>'i', 'Ї'=>'i', 'Ī'=>'i', 'І'=>'i', 'ї'=>'i', 'і'=>'i', 'ī'=>'i', 'ĳ'=>'ij', 'Ĳ'=>'ij',
        'й'=>'j', 'Й'=>'j', 'Ĵ'=>'j', 'ĵ'=>'j', 'я'=>'ja', 'Я'=>'ja', 'Э'=>'je', 'э'=>'je', 'ё'=>'jo', 'Ё'=>'jo', 'ю'=>'ju', 'Ю'=>'ju',
        'ĸ'=>'k', 'כ'=>'k', 'Ķ'=>'k', 'К'=>'k', 'к'=>'k', 'ķ'=>'k', 'ך'=>'k',
        'Ŀ'=>'l', 'ŀ'=>'l', 'Л'=>'l', 'ł'=>'l', 'ļ'=>'l', 'ĺ'=>'l', 'Ĺ'=>'l', 'Ļ'=>'l', 'л'=>'l', 'Ľ'=>'l', 'ľ'=>'l', 'ל'=>'l',
        'מ'=>'m', 'М'=>'m', 'ם'=>'m', 'м'=>'m',
        'ñ'=>'n', 'н'=>'n', 'Ņ'=>'n', 'ן'=>'n', 'ŋ'=>'n', 'נ'=>'n', 'Н'=>'n', 'ń'=>'n', 'Ŋ'=>'n', 'ņ'=>'n', 'ŉ'=>'n', 'Ň'=>'n', 'ň'=>'n',
        'о'=>'o', 'О'=>'o', 'ő'=>'o', 'õ'=>'o', 'ô'=>'o', 'Ő'=>'o', 'ŏ'=>'o', 'Ŏ'=>'o', 'Ō'=>'o', 'ō'=>'o', 'ø'=>'o', 'ǿ'=>'o', 'ǒ'=>'o', 'ò'=>'o', 'Ǿ'=>'o', 'Ǒ'=>'o', 'ơ'=>'o', 'ó'=>'o', 'Ơ'=>'o', 'œ'=>'oe', 'Œ'=>'oe', 'ö'=>'oe',
        'פ'=>'p', 'ף'=>'p', 'п'=>'p', 'П'=>'p',
        'ק'=>'q',
        'ŕ'=>'r', 'ř'=>'r', 'Ř'=>'r', 'ŗ'=>'r', 'Ŗ'=>'r', 'ר'=>'r', 'Ŕ'=>'r', 'Р'=>'r', 'р'=>'r',
        'ș'=>'s', 'с'=>'s', 'Ŝ'=>'s', 'š'=>'s', 'ś'=>'s', 'ס'=>'s', 'ş'=>'s', 'С'=>'s', 'ŝ'=>'s', 'Щ'=>'sch', 'щ'=>'sch', 'ш'=>'sh', 'Ш'=>'sh', 'ß'=>'ss',
        'т'=>'t', 'ט'=>'t', 'ŧ'=>'t', 'ת'=>'t', 'ť'=>'t', 'ţ'=>'t', 'Ţ'=>'t', 'Т'=>'t', 'ț'=>'t', 'Ŧ'=>'t', 'Ť'=>'t', '™'=>'tm',
        'ū'=>'u', 'у'=>'u', 'Ũ'=>'u', 'ũ'=>'u', 'Ư'=>'u', 'ư'=>'u', 'Ū'=>'u', 'Ǔ'=>'u', 'ų'=>'u', 'Ų'=>'u', 'ŭ'=>'u', 'Ŭ'=>'u', 'Ů'=>'u', 'ů'=>'u', 'ű'=>'u', 'Ű'=>'u', 'Ǖ'=>'u', 'ǔ'=>'u', 'Ǜ'=>'u', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'У'=>'u', 'ǚ'=>'u', 'ǜ'=>'u', 'Ǚ'=>'u', 'Ǘ'=>'u', 'ǖ'=>'u', 'ǘ'=>'u', 'ü'=>'ue',
        'в'=>'v', 'ו'=>'v', 'В'=>'v',
        'ש'=>'w', 'ŵ'=>'w', 'Ŵ'=>'w',
        'ы'=>'y', 'ŷ'=>'y', 'ý'=>'y', 'ÿ'=>'y', 'Ÿ'=>'y', 'Ŷ'=>'y',
        'Ы'=>'y', 'ž'=>'z', 'З'=>'z', 'з'=>'z', 'ź'=>'z', 'ז'=>'z', 'ż'=>'z', 'ſ'=>'z', 'Ж'=>'zh', 'ж'=>'zh'
    );
    return strtr($s, $replace);
}
    
}
