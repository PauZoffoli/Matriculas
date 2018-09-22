@extends('MatriculaPostulante.personas.fieldsPersonaContacto', 


    [
'PNombreLBL' => 'sContacto[PNombre]',
'SNombreLBL' => 'sContacto[SNombre]',
'TNombreLBL' => 'sContacto[TNombre]',
'ApPatLBL' => 'sContacto[ApPat]',
'ApMatLBL' => 'sContacto[ApMat]',
'fonoFijoLBL' => 'sContacto[fonoFijo]',
'fonoCeluLBL' => 'sContacto[fonoCelu]',
'generoLBL' => 'sContacto[genero]',
'emailLBL' => 'sContacto[email]',
'idUserLBL' => 'sContacto[idUser]',
'parentescoLBL' => 'sContacto[parentesco]',

'idAlumnoLBL' => 'sContacto[idAlumno]',



'PNombreTXT' =>( isset($sContacto->PNombre) ? $sContacto->PNombre : null ), 
'SNombreTXT' => ( isset($sContacto->SNombre) ? $sContacto->SNombre : null ),
'TNombreTXT' =>( isset($sContacto->TNombre) ? $sContacto->TNombre : null ),
'ApPatTXT' => ( isset($sContacto->ApPat) ? $sContacto->ApPat : null ),
'ApMatTXT' => ( isset($sContacto->ApMat) ? $sContacto->ApMat : null ),
'fonoFijoTXT' => ( isset($sContacto->fonoFijo) ? $sContacto->fonoFijo : null ),
'fonoCeluTXT' =>( isset($sContacto->fonoCelu) ? $sContacto->fonoCelu : null ),
'generoTXT' => ( isset($sContacto->genero) ? $sContacto->genero : null ),
'emailTXT' => ( isset($sContacto->email) ? $sContacto->email : null ),
'parentescoTXT' => ( isset($sContacto->parentesco) ? $sContacto->parentesco : null ),

'idAlumnoTXT' => ( isset($persona->alumno->id) ? $persona->alumno->id : null ),


    ])