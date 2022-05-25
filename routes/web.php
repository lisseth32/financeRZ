<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinanzasController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\FinanzasController::class, 'index'])->name('home'); // dashboard
Route::get('/lista-finanzas', [App\Http\Controllers\FinanzasController::class, 'listarFinanzas'])->name('listarFinanzas'); 
Route::get('/ingresar-finanzas', [App\Http\Controllers\FinanzasController::class, 'ingresarFinanzas'])->name('ingresarFinanzas'); 
Route::post('/guardar', [App\Http\Controllers\FinanzasController::class, 'guardar'])->name('guardar'); 
Route::get('/editar/{id}', [App\Http\Controllers\FinanzasController::class, 'editar'])->name('editar'); 
Route::get('/eliminar/{id}', [App\Http\Controllers\FinanzasController::class, 'eliminar'])->name('eliminar'); 





