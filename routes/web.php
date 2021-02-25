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
    return view('bienvenido');
});
Route::get('/login', function () {
    return view('login');
});

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/auth/login', function () {
    return view('auth/login');
});



Route::get('/bienvenido', function () {
    return view('bienvenido');
});

Route::resource('categoria','CategoriaController');
Route::resource('cliente','ClienteController');
Route::resource('venta','VentaController');

Route::get('cancelar', function(){
    return redirect()->route('categoria.index')->with('datos','Accion Cancelada');
})->name('cancelar');
Route::get('categoria/{codcategoria}/confirmar','CategoriaController@confirmar')->name('categoria.confirmar');


Route::resource('producto','ProductoController');
Route::get('/cancelar1', function(){
    return redirect()->route('producto.index')->with('datos','Accion Cancelada');
})->name('cancelar1');
Route::get('producto/{codproducto}/confirmar','ProductoController@confirmar')->name('producto.confirmar');

Route::get('/cancelar2', function(){
    return redirect()->route('cliente.index')->with('datos','Accion Cancelada');
})->name('cancelar2');
Route::get('cliente/{codcliente}/confirmar','ClienteController@confirmar')->name('cliente.confirmar');


Route::post('/login', 'UserController@login')->name('user.login');

Route::get('carro/show',['as' => 'carro-show','uses'=>'CarroController@show']);  
Route::get('carro/add/{producto}',['as' => 'carro-add','uses'=>'CarroController@add']); 
Route::get('carro/delete/{producto}',['as' => 'carro-delete','uses'=>'CarroController@delete']); 
Route::get('carro/trash',['as' => 'carro-trash','uses'=>'CarroController@trash']); 
Route::get('carro/update/{producto}/{cantidad?}',['as' => 'carro-update','uses'=>'CarroController@update']); 
Route::get('carro/listarProducto',['as' => 'carro-listar','uses'=>'CarroController@listarProducto']); 
Route::get('carro/createCliente',['as' => 'carro-registrar','uses'=>'CarroController@createCliente']); 
Route::post('carro/storeCliente',['as' => 'storeCliente','uses'=>'CarroController@storeCliente']); 
Route::get('carro/validar',['as' => 'carro-validar','uses'=>'CarroController@validar']); 
Route::get('carro/guardar/{cod}',['as' => 'guardar','uses'=>'CarroController@guardar']); 
Route::get('carro/login',['as' => 'carro-login','uses'=>'CarroController@verlogin']); 
Route::post('/', 'CarroController@login')->name('carro.login');
Route::get('regresar1',function(){
    return redirect()->route('carro-show');
})->name('regresar1');

Route::get('venta/{codventa}/detalle','VentaController@detalle')->name('venta.detalle');


/*Route::bind('producto',function($codproducto){
    return App\Producto::where('codproducto', $codproducto)->first();
});*/   
