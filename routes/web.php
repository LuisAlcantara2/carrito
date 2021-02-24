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

Route::get('/', function () {
    return view('index');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/bienvenido', function () {
    return view('bienvenido');
});

Route::resource('categoria','CategoriaController');
Route::resource('cliente','ClienteController');

Route::get('cancelar', function(){
    return redirect()->route('categoria.index')->with('datos','Accion Cancelada');
})->name('cancelar');
Route::get('categoria/{codcategoria}/confirmar','CategoriaController@confirmar')->name('categoria.confirmar');


Route::resource('producto','ProductoController');
Route::get('/cancelar1', function(){
    return redirect()->route('producto.index')->with('datos','Accion Cancelada');
})->name('cancelar1');
Route::get('producto/{codproducto}/confirmar','ProductoController@confirmar')->name('producto.confirmar');


