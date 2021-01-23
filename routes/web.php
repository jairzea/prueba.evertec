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

// RUTAS QUE INCLUYEN TODOS LOS METODOS HTTP

// Respuesta por defecto
Route::get('/', 'OrdenesControlador@default');

// Obtener ordenes de la base de datos
Route::resource('/ordenes', 'OrdenesControlador');

// Creación de una orden en la base de datos
Route::resource('/registro_ordenes', 'OrdenesControlador');

// Obtener los productos
Route::resource('/productos', 'ProductosControlador');

// Creación de un producto en la base de datos
Route::resource('/registro_productos', 'ProductosControlador');

// Editar un producto en la base de datos
Route::resource('/editar_producto', 'ProductosControlador');

// Borrar un producto en la base de datos
Route::resource('/borrar_producto', 'ProductosControlador');

// Ver una orden activa - resumen
Route::get('/orden_activa', 'OrdenesControlador@show');
