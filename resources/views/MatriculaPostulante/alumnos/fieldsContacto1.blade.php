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
'fechaDefuncionLBL' => 'pContacto[fechaDefuncion]',
'estadoCivilLBL' => 'pContacto[estadoCivil]',
'idDireccionLBL' => 'pContacto[idDireccion]',
'idUserLBL' => 'pContacto[idUser]',


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
'fechaDefuncionTXT' => ( isset($pContacto->fechaDefuncion) ? $pContacto->fechaDefuncion : null ),
'estadoCivilTXT' => ( isset($pContacto->estadoCivil) ? $pContacto->estadoCivil : null ),
'idDireccionTXT' => ( isset($pContacto->idDireccion) ? $pContacto->idDireccion : null ),
'idUserTXT' => ( isset($pContacto->idUser) ? $pContacto->idUser : null ),


    ])

    <!-- Parentesco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parentesco', 'Parentesco:') !!}
    {!! Form::text('pContacto[parentesco]', null, ['class' => 'form-control']) !!}
</div>

<!-- Otroparentesco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('otroParentesco', 'Otroparentesco:') !!}
    {!! Form::text('pContacto[otroParentesco]', null, ['class' => 'form-control']) !!}
</div>