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
//ruta listar
Route::get('/', 'MonedaController@listar');




// registrar una criptomoneda
Route::get("/contenido", "MonedaController@registro");

//Guardar los datos registrados
Route::post("/save", "MonedaController@save")->name("save");

//ruta para la edicion de criptomonedas
Route::get('/editar/{id}', 'MonedaController@editlenguaje')->name('editlenguaje');

//ruta para editar lenguaje
Route::patch('/edit/{id}', 'MonedaController@edit')->name('edit');

//ruta para eliminar criptomoneda
Route::delete('/delete/{id}','MonedaController@delete')->name('delete');



//ruta de registrar un leguaje
Route::get("/lenguaje/crear", "LenguajeController@crear");

//ruta para la opcion de lenguaje
route::get('lenguaje/listado', 'lenguajeController@listado')->name('listado');

//ruta para guardar lenguaje
Route::post("/lenguaje/save", "lenguajeController@save")->name("save");
