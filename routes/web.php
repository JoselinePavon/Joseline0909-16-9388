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

//ruta para editar usuarios
Route::get('/edit/{id}', 'MonedaController@edit')->name('edit');

//ruta para eliminar criptomoneda
Route::delete('/delete/{id}','MonedaController@delete')->name('delete');
