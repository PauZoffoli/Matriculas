@extends('MatriculaPostulante.personas.fieldsPersonaContacto', 


    [
'PNombreLBL' => 'pContacto[PNombre]',
'SNombreLBL' => 'pContacto[SNombre]',
'TNombreLBL' => 'pContacto[TNombre]',
'ApPatLBL' => 'pContacto[ApPat]',
'ApMatLBL' => 'pContacto[ApMat]',
'fonoFijoLBL' => 'pContacto[fonoFijo]',
'fonoCeluLBL' => 'pContacto[fonoCelu]',
'generoLBL' => 'pContacto[genero]',
'emailLBL' => 'pContacto[email]',
'parentescoLBL' => 'pContacto[parentesco]',
'idAlumnoLBL' => 'pContacto[idAlumno]',
'rutLBL' => 'pContacto[rut]',




'PNombreTXT' =>( isset($pContacto->PNombre) ? $pContacto->PNombre : null ), 
'SNombreTXT' => ( isset($pContacto->SNombre) ? $pContacto->SNombre : null ),
'TNombreTXT' =>( isset($pContacto->TNombre) ? $pContacto->TNombre : null ),
'ApPatTXT' => ( isset($pContacto->ApPat) ? $pContacto->ApPat : null ),
'ApMatTXT' => ( isset($pContacto->ApMat) ? $pContacto->ApMat : null ),
'fonoFijoTXT' => ( isset($pContacto->fonoFijo) ? $pContacto->fonoFijo : null ),
'fonoCeluTXT' =>( isset($pContacto->fonoCelu) ? $pContacto->fonoCelu : null ),
'generoTXT' => ( isset($pContacto->genero) ? $pContacto->genero : null ),
'emailTXT' => ( isset($pContacto->email) ? $pContacto->email : null ),
'parentescoTXT' => ( isset($pContacto->parentesco) ? $pContacto->parentesco : null ),
'rutTXT' => ( isset($pContacto->rut) ? $pContacto->rut : null ),
'idAlumnoTXT' => ( isset($persona->alumno->id) ? $persona->alumno->id : null ),



    ])
