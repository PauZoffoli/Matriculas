@extends('MatriculaPostulante.personas.fieldsPersonaPadres', 


    [
'PNombreLBL' => 'padre[PNombre]',
'SNombreLBL' => 'padre[SNombre]',
'TNombreLBL' => 'padre[TNombre]',
'ApPatLBL' => 'padre[ApPat]',
'ApMatLBL' => 'padre[ApMat]',
'fonoFijoLBL' => 'padre[fonoFijo]',
'fonoCeluLBL' => 'padre[fonoCelu]',
'rutLBL' => 'padre[rut]',
'generoLBL' => 'padre[genero]',
'emailLBL' => 'padre[email]',
'estadoCivilLBL' => 'padre[estadoCivil]',
'idAlumnoLBL' => 'padre[idAlumno]',
'idPersonaLBL' => 'padre[idPersona]',
'parentescoLBL' => 'padre[parentesco]',
'fechaDefuncionLBL' => 'padre[fechaDefuncion]',
'fechaNacimientoLBL' => 'padre[fechaNacimiento]',
'nivelEducacionalLBL' => 'padre[nivelEducacional]',
'profesionLBL' => 'padre[profesion]',
'paisDeOrigenLBL' => 'padre[paisDeOrigen]',

'idComunaLBL' => "padre[direccion][idComuna]",
'calleLBL' => 'padre[direccion][calle]',
'nroCalleLBL' => 'padre[direccion][nroCalle]',
'dptoLBL' => 'padre[direccion][dpto]',
'bloqueTorreLBL' => 'padre[direccion][bloqueTorre]',


'PNombreTXT' =>( isset($padre->PNombre) ? $padre->PNombre : null ), 
'SNombreTXT' => ( isset($padre->SNombre) ? $padre->SNombre : null ),
'TNombreTXT' =>( isset($padre->TNombre) ? $padre->TNombre : null ),
'ApPatTXT' => ( isset($padre->ApPat) ? $padre->ApPat : null ),
'ApMatTXT' => ( isset($padre->ApMat) ? $padre->ApMat : null ),
'fonoFijoTXT' => ( isset($padre->fonoFijo) ? $padre->fonoFijo : null ),
'fonoCeluTXT' =>( isset($padre->fonoCelu) ? $padre->fonoCelu : null ),
'rutTXT' => ( isset($padre->rut) ? $padre->rut : null ),
'generoTXT' => ( isset($padre->genero) ? $padre->genero : null ),
'emailTXT' => ( isset($padre->email) ? $padre->email : null ),
'estadoCivilTXT' => ( isset($padre->estadoCivil) ? $padre->estadoCivil : null ),
'idAlumnoTXT' => ( isset($persona->alumno->id) ? $persona->alumno->id : null ),
'idPersonaTXT' => ( isset($persona->id) ? $persona->id : null ),
'parentescoTXT' => ( isset($padre->parentesco) ? $padre->parentesco : null ),
'fechaDefuncionTXT' => ( isset($padre->fechaDefuncion) ? $padre->fechaDefuncion : null ),

'fechaNacimientoTXT' => ( isset($padre->fechaNacimiento) ? $padre->fechaNacimiento : null ),
'nivelEducacionalTXT' => ( isset($padre->nivelEducacional) ? $padre->nivelEducacional : null ),
'profesionTXT' => ( isset($padre->profesion) ? $padre->profesion : null ),
'paisDeOrigenTXT' => ( isset($padre->paisDeOrigen) ? $padre->paisDeOrigen : null ),


'idComunaTXT' => ( isset($padre->direccion->idComuna) ? $padre->direccion->idComuna : null ),
'calleTXT' => ( isset($padre->direccion->calle) ? $padre->direccion->calle : null ),
'nroCalleTXT' => ( isset($padre->direccion->nroCalle) ? $padre->direccion->nroCalle : null ),
'dptoTXT' => ( isset($padre->direccion->dpto) ? $padre->direccion->dpto : null ),
'bloqueTorreTXT' => ( isset($padre->direccion->bloqueTorre) ? $padre->direccion->bloqueTorre : null ),



    ])