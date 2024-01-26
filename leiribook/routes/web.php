<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EventoPhotoController;
use App\Http\Controllers\LivroCategoriaController;

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
Route::get('/livro_detalhe/{id}', [LivroController::class, 'livro_detalhe'])->name('livro_detalhe');
Route::get('/biblioteca', [LivroController::class, 'biblioteca'])->name('biblioteca');
Route::get('/pedidos', [PedidoController::class, 'showPedidos'])->name('pedidos');
Route::post('/enviar-pedido', [PedidoController::class, 'pedido'])->name('enviar-pedido');

Route::get('/avaliacao', [PageController::class, 'avaliacao'])->name('avaliacao');
Route::post('/avaliacao/criar', [PageController::class, 'avaliacao_criar'])->name('avaliacao.criar');

Route::get('/books/filter', [LivroController::class, 'filterByGenre'])->name('filter.books');

Auth::routes(['register' => true, 'verify' => true]);
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/avaliacao', [PageController::class, 'avaliacao'])->name('avaliacao');
    Route::post('/avaliacao/criar', [PageController::class, 'avaliacao_criar'])->name('avaliacao.criar');
    Route::get('/profile/{user}', [PageController::class, 'profile'])->name('profile');
    route::get('editpassword', [UserController::class, 'editpassword'])->name('editpassword');
    route::patch('updatepassword', [UserController::class, 'updatepassword'])->name('updatepassword');
    Route::get('/users/{user}/send_reactivate_mail', [UserController::class, 'send_reactivate_email'])->name('users.sendActivationEmail');
    Route::delete('/profile/{user}/destroy_photo', [PageController::class, 'destroy_photo_profile'])->name('profile.destroyPhotoProfile');
    route::group(['middleware' => ['role'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/', [PageController::class, 'admin'])->name('dashboard');
        Route::delete('/users/{user}/destroy_photo', [UserController::class, 'destroy_photo'])->name('users.destroyPhoto');
        Route::resource('eventos', EventoController::class);
        Route::resource('faqs', FaqController::class);
        Route::resource('users', UserController::class);
        Route::resource('livros', LivroController::class);
        Route::resource('livros_categorias', LivroCategoriaController::class)->except(['show']);
        Route::get('/livros_categorias/{id}', [LivroCategoriaController::class, 'index'])
        ->name('livros_categorias.index');
        Route::get('/livros_categorias/create/{livroId}', [LivroCategoriaController::class, 'create'])
    ->name('livros_categorias.create');
    Route::post('/livros_categorias/{livroId}', [LivroCategoriaController::class, 'store'])
    ->name('livros_categorias.store');
        Route::delete('/livros_categorias/{livro}/{categoria}', [LivroCategoriaController::class, 'destroy'])
        ->name('livros_categorias.destroy');

        Route::resource('categorias', CategoriaController::class);
        Route::resource('pedidos', PedidoController::class);
        Route::resource('eventos/{evento}/evento_fotos', EventoPhotoController::class)->parameters(['evento_fotos' => 'foto']);
        Route::resource('avaliacoes', AvaliacaoController::class)->parameters(['avaliacoes' => 'avaliacao']);
    });
});
