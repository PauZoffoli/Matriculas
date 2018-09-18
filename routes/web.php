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


Route::resource('alumnos', 'AlumnoController');

Route::resource('alumnoResponsables', 'AlumnoResponsableController');

Route::resource('apoderados', 'ApoderadoController');

Route::resource('personas', 'PersonaController');

Route::resource('alumnos', 'AlumnoController');

Route::resource('alumnoResponsables', 'AlumnoResponsableController');

Route::resource('apoderados', 'ApoderadoController');

Route::resource('comunas', 'ComunaController');

Route::resource('provincias', 'ProvinciaController');

Route::resource('regions', 'RegionController');

Route::resource('direccions', 'DireccionController');

Route::resource('contratos', 'ContratoController');

Route::resource('fichaAlumnos', 'FichaAlumnoController');

Route::resource('personas', 'PersonaController');

Route::resource('roles', 'RolesController');

Route::resource('users', 'UserController');

Route::resource('userRols', 'UserRolController');

Route::resource('cursos', 'CursoController');

Route::resource('becas', 'BecaController');

Route::resource('becaAlumnos', 'BecaAlumnoController');

Route::resource('repitencias', 'RepitenciasController');

Route::resource('tipos', 'TipoController');

Route::resource('tipoPersonas', 'TipoPersonaController');
/*CUSTOM*/


Route::resource('apoderadosPostulantes', 'MatriculaPostulante\ApoderadoPController');

Route::resource('alumnosPostulantes', 'MatriculaPostulante\AlumnoPController');

