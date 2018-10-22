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


Route::resource('alumnos', 'AlumnoController')->middleware('auth');

Route::resource('alumnoResponsables', 'AlumnoResponsableController')->middleware('auth');

Route::resource('apoderados', 'ApoderadoController')->middleware('auth');

Route::resource('personas', 'PersonaController')->middleware('auth');

Route::resource('alumnos', 'AlumnoController')->middleware('auth');

Route::resource('alumnoResponsables', 'AlumnoResponsableController')->middleware('auth');

Route::resource('apoderados', 'ApoderadoController')->middleware('auth');

Route::resource('comunas', 'ComunaController')->middleware('auth');

Route::resource('provincias', 'ProvinciaController')->middleware('auth');

Route::resource('regions', 'RegionController')->middleware('auth');

Route::resource('direccions', 'DireccionController')->middleware('auth');

Route::resource('contratos', 'ContratoController')->middleware('auth');

Route::resource('fichaAlumnos', 'FichaAlumnoController')->middleware('auth');

Route::resource('personas', 'PersonaController')->middleware('auth');

Route::resource('roles', 'RolesController')->middleware('auth');

Route::resource('users', 'UserController')->middleware('auth');

Route::resource('userRols', 'UserRolController')->middleware('auth');

Route::resource('cursos', 'CursoController')->middleware('auth');

Route::resource('becas', 'BecaController')->middleware('auth');

Route::resource('becaAlumnos', 'BecaAlumnoController')->middleware('auth');

Route::resource('repitencias', 'RepitenciasController')->middleware('auth');

Route::resource('tipos', 'TipoController')->middleware('auth');

Route::resource('tipoPersonas', 'TipoPersonaController')->middleware('auth');
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

