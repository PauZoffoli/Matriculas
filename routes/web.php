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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');


Route::resource('alumnos', 'AlumnoController');

Route::resource('alumnoResponsables', 'AlumnoResponsableController');

Route::resource('apoderados', 'ApoderadoController');

Route::resource('personas', 'PersonaController');