<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contactos',[PageController::class,'contactos'])->name('contactos');
Route::get('/politica_privacidade',[PageController::class,'politica_privacidade'])->name('politica_privacidade');
Route::get('/termos_e_condicoes', [PageController::class, 'termos_e_condicoes'])->name('termos_e_condicoes');
Route::get('/evento', [PageController::class, 'evento'])->name('evento');
Route::get('/eventos', [PageController::class, 'eventos'])->name('eventos');
