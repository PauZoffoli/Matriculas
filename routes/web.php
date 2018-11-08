<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//Definimos la ruta a la ventana principal de la vista del Apoderado al hacer la matrícula.

Route::get('/', function () {
	
    return view('MatriculaPostulante.index');
})->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index');

/*CUSTOM*/


Route::resource('apoderadosPostulantes', 'MatriculaPostulante\ApoderadoPController')->middleware('auth');
Route::resource('alumnosPostulantes', 'MatriculaPostulante\AlumnoPController')->middleware('auth');


//Rutas Definidas para el proceso de matrícula revisado por el secretariado
Route::resource('alumnosPostulantesRevisor', 'VistaSecretariado\LoopAlumnosController'); //Agregado para ir al controller especial para que la secretaria edite al alumno
Route::resource('alumnoSecretariadoContr', 'VistaSecretariado\AlumnoSecretariadoController');
Route::resource('apoSecretariadoContr', 'VistaSecretariado\ApoderadoSecretariadoController');
Route::resource('PersonaSecretariadoContr', 'VistaSecretariado\PersonaSecretariadoController');
Route::resource('ContratoSecretariadoContr', 'VistaSecretariado\ContratoSecretariadoController');

Route::get('searchPersona', 'VistaSecretariado\ApoderadoSecretariadoController@searchPersona')->name('apoSecretariadoContr.searchPersona');



Route::resource('alumnoContratos', 'AlumnoContratoController');