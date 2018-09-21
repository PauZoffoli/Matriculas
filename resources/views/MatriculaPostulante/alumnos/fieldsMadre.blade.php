@extends('MatriculaPostulante.personas.fieldsPersonaContacto', 


    [
'PNombreLBL' => 'madre[PNombre]',
'SNombreLBL' => 'madre[SNombre]',
'TNombreLBL' => 'madre[TNombre]',
'ApPatLBL' => 'madre[ApPat]',
'ApMatLBL' => 'madre[ApMat]',
'fonoFijoLBL' => 'madre[fonoFijo]',
'fonoCeluLBL' => 'madre[fonoCelu]',
'rutLBL' => 'madre[rut]',
'generoLBL' => 'madre[genero]',
'emailLBL' => 'madre[email]',
'estadoCivilLBL' => 'madre[estadoCivil]',



'PNombreTXT' =>( isset($madre->PNombre) ? $madre->PNombre : null ), 
'SNombreTXT' => ( isset($madre->SNombre) ? $madre->SNombre : null ),
'TNombreTXT' =>( isset($madre->TNombre) ? $madre->TNombre : null ),
'ApPatTXT' => ( isset($madre->ApPat) ? $madre->ApPat : null ),
'ApMatTXT' => ( isset($madre->ApMat) ? $madre->ApMat : null ),
'fonoFijoTXT' => ( isset($madre->fonoFijo) ? $madre->fonoFijo : null ),
'fonoCeluTXT' =>( isset($madre->fonoCelu) ? $madre->fonoCelu : null ),
'rutTXT' => ( isset($madre->rut) ? $madre->rut : null ),
'generoTXT' => ( isset($madre->genero) ? $madre->genero : null ),
'emailTXT' => ( isset($madre->email) ? $madre->email : null ),
'estadoCivilTXT' => ( isset($madre->estadoCivil) ? $madre->estadoCivil : null ),


    ])