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
Route::post('/editar_producto', 'ProductosControlador@update');

// Borrar un producto en la base de datos
Route::resource('/borrar_producto', 'ProductosControlador');

// Ver resumen de la orden
Route::get('/orden_activa', 'OrdenesControlador@show');

// Obtener url de pago de PlaceToPay
Route::post('/pagar', 'ProcesarPago@pagoPlaceToPay');

// Recepción de respuesta de pasarela de pago
Route::get('/respuestaPago', 'ProcesarPago@respuestaPlaceToPay');

// Ruta para consultar la vista de ordenes y productos
Route::get('/ver_ordenes_productos', 'OrdenesControlador@vistaOrdenesProductos');

// Ruta para consultar la ordenes de un usuario
Route::post('/ver_ordenes_usuario', 'OrdenesControlador@ordenesDeUsuario');
