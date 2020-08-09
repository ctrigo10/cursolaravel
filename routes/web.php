<?php

use Illuminate\Support\Facades\Route;

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

// RUTA RAIZ
Route::get('/', function () {
    return view('welcome');
})->name('main');

// RUTA SALUDO
Route::get('/hola/ruta', function () {
    return 'Hola desde web.php';
})->name('practica1');

// AGRUPANDO RUTAS
Route::group(['prefix'=>'saludo'], function() { 
	Route::get('/dia', function () {
	    return 'Buenos dias';
	})->name('practica2');

	Route::get('/tardes', function () {
	    return 'Buenas tardes';
	})->name('practica3');

	Route::get('/noches', function () {
	    return 'Buenas noches';
	})->name('practica4');
});

// RUTA Y CONTROLADOR
Route::get('/prueba', 'PruebaController@index')->name('practica5');

// PASO DE PARAMETROS
Route::get('/prueba/parametros/{nombre}/{edad}', 'PruebaController@parametrosAction')->name('practica6');

// RENDERIZAR VISTA DESDE UN CONTROLADOR
Route::get('/prueba/vista', 'PruebaController@vistaAction')->name('practica7');

// ENVIAR DATOS DEL CONTROLADOR HACIA LA VISTA
Route::get('/prueba/datos/{nombre}/{edad}', 'PruebaController@datosAction')->name('practica8');

// COMPONENTES BLADE
Route::get('/prueba/blade', 'PruebaController@bladeAction')->name('practica9');

// RUTAS SISTEMA ADMINISTRATIVO
Route::group(['prefix'=>'admin'], function(){
	// PAGINA INICIAL
	Route::get('/home', 'admin\HomeController@index')->name('admin_home');
	// MODULO DE USUARIOS (adicionar, editar, listar, eliminar,..)
	Route::resource('user', 'admin\UserController');
	Route::get('user/{id}/destroy', 'admin\UserController@destroy')->name('user.destroy');
	// MODULO DE GENEROS (adicionar, editar, listar, eliminar,..)
	Route::resource('genero', 'admin\GeneroController');
	Route::get('genero/{id}/destroy', 'admin\GeneroController@destroy')->name('genero.destroy');
	// MODULO DE PELICULAS (adicionar, editar, listar, eliminar,..)
	Route::resource('pelicula', 'admin\PeliculaController');
	Route::get('pelicula/{id}/destroy', 'admin\PeliculaController@destroy')->name('pelicula.destroy');
	// MODULO DE IMAGENES (adicionar, editar, listar, eliminar,..)
	//Route::resource('imagen', 'admin\ImagenController');
	Route::get('imagen/{pelicula}', 'admin\ImagenController@index')->name('imagen.index');
	Route::get('imagen/{pelicula}/imagen', 'admin\ImagenController@create')->name('imagen.create');
	Route::post('imagen/imagenes/imgaen', 'admin\ImagenController@store')->name('imagen.store');
	Route::get('imagen/{id}/destroy', 'admin\ImagenController@destroy')->name('imagen.destroy');
	// MODULO DE DIRECTORES (adicionar, editar, listar, eliminar,..)
	Route::resource('director', 'admin\DirectorController');
	Route::get('director/{id}/destroy', 'admin\DirectorController@destroy')->name('director.destroy');
});



