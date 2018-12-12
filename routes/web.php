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
Route::resource('alumnosPostulantesRevisor', 'VistaSecretariado\LoopAlumnosController')->middleware('auth'); //Agregado para ir al controller especial para que la secretaria edite al alumno
Route::resource('alumnoSecretariadoContr', 'VistaSecretariado\AlumnoSecretariadoController')->middleware('auth');
Route::resource('apoSecretariadoContr', 'VistaSecretariado\ApoderadoSecretariadoController')->middleware('auth');
Route::resource('PersonaSecretariadoContr', 'VistaSecretariado\PersonaSecretariadoController')->middleware('auth');
Route::resource('ContratoSecretariadoContr', 'VistaSecretariado\ContratoSecretariadoController')->middleware('auth');

Route::get('searchPersona', 'VistaSecretariado\ApoderadoSecretariadoController@searchPersona')->name('apoSecretariadoContr.searchPersona')->middleware('auth');



Route::resource('alumnoContratos', 'AlumnoContratoController')->middleware('auth');

Route::group(['namespace' => 'VistaSecretariado\DescargaPDFContrato', 'prefix' => 'PDF'], function () { 

    Route::get('contratos/{id}', [
         'uses' => 'PdfContratoController@pdfContratoStream'
    ])->name('pdfContratoStream')->middleware('auth'); 

     Route::get('pagares/{id}', [
         'uses' => 'PdfContratoController@pdfPagareStream'
    ])->name('pdfPagareStream')->middleware('auth'); 

});


 Route::get('/cambioestados/{id}/{estados}', [
         'uses' => 'Administrador\CambioEstados\CambioEstadosController@edit'
    ])->name('cambioestadosgetedit')->middleware('auth'); 

//Métodos para el index secretariado junto a buscador por rut(apoSecretariadoContr)
//Route::post('ficha', 'VistaSecretariado\AlumnoSecretariadoController@ficha')->name('alumnoSecretariadoContr.ficha');
Route::post('cambioApoderado', 'VistaSecretariado\AlumnoSecretariadoController@cambioApoderado')->name('cambioApoderado');

Route::get('cambioApoderado', 'VistaSecretariado\AlumnoSecretariadoController@cambioApoderado');

//este es el controller de agregar persona apoderado usuario
Route::post('agregarApoPersona', 'VistaSecretariado\PersonaApoderadoUserController@agregarPersonaApoderado')->name('agregarApoPersona');

Route::get('/cambioApoderado', function () {
    
    return view('secretariado.cambioApoderados');
})->name('cambioApoderado');

Route::get('/crearApoderado', function () {
    
    return view('secretariado.apoderados.createPersonaApoderado');
})->name('crearApoderado');

Route::get('/buscarApoderado', function () {
    
    return view('secretariado.apoderados.buscarApoderado');
})->name('buscarApoderado');

//AJAX PARA EL BUSCADOR DE RUT
 Route::get('/persona/{rut}', [
         'uses' => 'Personas\PersonaController@searchPersona'
    ])->middleware('auth'); 