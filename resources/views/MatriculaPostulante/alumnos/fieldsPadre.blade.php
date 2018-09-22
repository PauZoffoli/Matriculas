@extends('MatriculaPostulante.personas.fieldsPersonaContacto', 


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

    ])