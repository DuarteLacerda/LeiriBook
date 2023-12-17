<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PedidoController;

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

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/sobre', [PageController::class, 'sobrenos'])->name('sobre');
Route::get('/contactos', [PageController::class, 'contactos'])->name('contactos');
Route::get('/politica_privacidade', [PageController::class, 'politica_privacidade'])->name('politica_privacidade');
Route::get('/termos_e_condicoes', [PageController::class, 'termos_e_condicoes'])->name('termos_e_condicoes');
Route::get('/pedido_livro', [PageController::class, 'pedido_livro'])->name('pedido_livro');
Route::get('/pedidos', [PageController::class, 'pedidos'])->name('pedidos');
Route::get('/evento/{nome}', [PageController::class, 'evento'])->name('evento')->where('nome', '[\w\d\-\_]+');
Route::get('/eventos/{listar?}', [PageController::class, 'eventos'])->name('eventos');
Route::get('/faqs', [PageController::class, 'faqs'])->name('faqs');
Route::get('/biblioteca', [LivroController::class, 'biblioteca'])->name('biblioteca');
Route::get('/pedidos', [PedidoController::class, 'showPedidos'])->name('pedidos');
Route::post('/enviar-pedido', [PedidoController::class, 'pedido'])->name('enviar-pedido');

Route::get('/books/filter', [LivroController::class, 'filterByGenre'])->name('filter.books');

Auth::routes(['register' => true, 'verify' => true]);
Route::group(['middleware' => ['auth', 'verified'], 'as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::get('/', [PageController::class, 'admin'])->name('dashboard');
    Route::get('/users/{user}/send_reactivate_mail', [UserController::class, 'send_reactivate_email'])->name('users.sendActivationEmail');
    /* Route::delete('/users/{user}/destroy_photo', [UserController::class, 'destroy_photo'])->name('users.destroyPhoto'); */
    Route::resource('evento', EventoController::class);
    Route::resource('faqs', FaqController::class);
});
