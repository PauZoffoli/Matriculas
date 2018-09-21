@extends('MatriculaPostulante.personas.fieldsPersonaContacto', 


    [
'PNombreLBL' => 'sContacto[PNombre]',
'SNombreLBL' => 'sContacto[SNombre]',
'TNombreLBL' => 'sContacto[TNombre]',
'ApPatLBL' => 'sContacto[ApPat]',
'ApMatLBL' => 'sContacto[ApMat]',
'fonoFijoLBL' => 'sContacto[fonoFijo]',
'fonoCeluLBL' => 'sContacto[fonoCelu]',
'rutLBL' => 'sContacto[rut]',
'generoLBL' => 'sContacto[genero]',
'emailLBL' => 'sContacto[email]',
'fechaNacimientoLBL' => 'sContacto[fechaNacimiento]',
'estadoCivilLBL' => 'sContacto[estadoCivil]',
'idDireccionLBL' => 'sContacto[idDireccion]',
'idUserLBL' => 'sContacto[idUser]',
'parentescoLBL' => 'sContacto[parentesco]',
'otroParentescoLBL' => 'sContacto[otroParentesco]',



'PNombreTXT' =>( isset($sContacto->PNombre) ? $sContacto->PNombre : null ), 
'SNombreTXT' => ( isset($sContacto->SNombre) ? $sContacto->SNombre : null ),
'TNombreTXT' =>( isset($sContacto->TNombre) ? $sContacto->TNombre : null ),
'ApPatTXT' => ( isset($sContacto->ApPat) ? $sContacto->ApPat : null ),
'ApMatTXT' => ( isset($sContacto->ApMat) ? $sContacto->ApMat : null ),
'fonoFijoTXT' => ( isset($sContacto->fonoFijo) ? $sContacto->fonoFijo : null ),
'fonoCeluTXT' =>( isset($sContacto->fonoCelu) ? $sContacto->fonoCelu : null ),
'rutTXT' => ( isset($sContacto->rut) ? $sContacto->rut : null ),
'generoTXT' => ( isset($sContacto->genero) ? $sContacto->genero : null ),
'emailTXT' => ( isset($sContacto->email) ? $sContacto->email : null ),
'fechaNacimientoTXT' => ( isset($sContacto->fechaNacimiento) ? $sContacto->fechaNacimiento: null ),
'estadoCivilTXT' => ( isset($sContacto->estadoCivil) ? $sContacto->estadoCivil : null ),
'idDireccionTXT' => ( isset($sContacto->idDireccion) ? $sContacto->idDireccion : null ),
'parentescoTXT' => ( isset($sContacto->parentesco) ? $sContacto->parentesco : null ),
'otroParentescoTXT' => ( isset($sContacto->otroParentesco) ? $sContacto->otroParentesco : null ),



    ])