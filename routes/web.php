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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Ruta Actividades
Route::get('/actividades', [App\Http\Controllers\ActividadesController::class, 'index']);
//Ruta para crear una actividad
Route::get('/actividades/create', [App\Http\Controllers\ActividadesController::class, 'create']);
//Ruta para editar una actividad
Route::get('/actividades/{actividades}/edit', [App\Http\Controllers\ActividadesController::class, 'edit']);
//Ruta para el envio de informacio a la base de datos
Route::post('/actividades', [App\Http\Controllers\ActividadesController::class, 'sendData']);
//Ruta para actualizar las actividades
Route::put('/actividades/{actividades}', [App\Http\Controllers\ActividadesController::class, 'update']);
//Ruta para eleiminar una actividad
Route::delete('/actividades/{actividades}', [App\Http\Controllers\ActividadesController::class, 'eliminar']);


//Ruta Entrenadores
Route::resource('entrenadores', 'App\Http\Controllers\EntrenadorController');

//Ruta Clientes
Route::resource('clientes', 'App\Http\Controllers\ClientesController');
