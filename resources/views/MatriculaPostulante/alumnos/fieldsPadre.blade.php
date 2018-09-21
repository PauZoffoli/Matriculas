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
'fechaNacimientoLBL' => 'padre[fechaNacimiento]',
'estadoCivilLBL' => 'padre[estadoCivil]',
'idDireccionLBL' => 'padre[idDireccion]',
'idUserLBL' => 'padre[idUser]',
'parentescoLBL' => 'padre[parentesco]',
'otroParentescoLBL' => 'padre[otroParentesco]',



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
'fechaNacimientoTXT' => ( isset($padre->fechaNacimiento) ? $padre->fechaNacimiento: null ),
'estadoCivilTXT' => ( isset($padre->estadoCivil) ? $padre->estadoCivil : null ),
'idDireccionTXT' => ( isset($padre->idDireccion) ? $padre->idDireccion : null ),
'parentescoTXT' => ( isset($padre->parentesco) ? $padre->parentesco : null ),
'otroParentescoTXT' => ( isset($padre->otroParentesco) ? $padre->otroParentesco : null ),



    ])