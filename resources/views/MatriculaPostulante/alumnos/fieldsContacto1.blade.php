@extends('MatriculaPostulante.personas.fieldsPersonaContacto', 


    [
'PNombreLBL' => 'pContacto[PNombre]',
'SNombreLBL' => 'pContacto[SNombre]',
'TNombreLBL' => 'pContacto[TNombre]',
'ApPatLBL' => 'pContacto[ApPat]',
'ApMatLBL' => 'pContacto[ApMat]',
'fonoFijoLBL' => 'pContacto[fonoFijo]',
'fonoCeluLBL' => 'pContacto[fonoCelu]',
'rutLBL' => 'pContacto[rut]',
'generoLBL' => 'pContacto[genero]',
'emailLBL' => 'pContacto[email]',
'fechaNacimientoLBL' => 'pContacto[fechaNacimiento]',
'estadoCivilLBL' => 'pContacto[estadoCivil]',
'idDireccionLBL' => 'pContacto[idDireccion]',
'parentescoLBL' => 'pContacto[parentesco]',
'otroParentescoLBL' => 'pContacto[otroParentesco]',




'PNombreTXT' =>( isset($pContacto->PNombre) ? $pContacto->PNombre : null ), 
'SNombreTXT' => ( isset($pContacto->SNombre) ? $pContacto->SNombre : null ),
'TNombreTXT' =>( isset($pContacto->TNombre) ? $pContacto->TNombre : null ),
'ApPatTXT' => ( isset($pContacto->ApPat) ? $pContacto->ApPat : null ),
'ApMatTXT' => ( isset($pContacto->ApMat) ? $pContacto->ApMat : null ),
'fonoFijoTXT' => ( isset($pContacto->fonoFijo) ? $pContacto->fonoFijo : null ),
'fonoCeluTXT' =>( isset($pContacto->fonoCelu) ? $pContacto->fonoCelu : null ),
'rutTXT' => ( isset($pContacto->rut) ? $pContacto->rut : null ),
'generoTXT' => ( isset($pContacto->genero) ? $pContacto->genero : null ),
'emailTXT' => ( isset($pContacto->email) ? $pContacto->email : null ),
'fechaNacimientoTXT' => ( isset($pContacto->fechaNacimiento) ? $pContacto->fechaNacimiento: null ),
'estadoCivilTXT' => ( isset($pContacto->estadoCivil) ? $pContacto->estadoCivil : null ),
'idDireccionTXT' => ( isset($pContacto->idDireccion) ? $pContacto->idDireccion : null ),
'parentescoTXT' => ( isset($pContacto->parentesco) ? $pContacto->parentesco : null ),
'otroParentescoTXT' => ( isset($pContacto->otroParentesco) ? $pContacto->otroParentesco : null ),


    ])
