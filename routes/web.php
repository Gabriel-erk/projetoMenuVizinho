<?php

use App\Http\Controllers\ParceirosController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/site', function () {
    return view('site');
});

// SiteController
Route::controller(SiteController::class)->group(function () {
    Route::get('/', 'index')->name('site.index');
    Route::get('/cardapio', 'cardapio')->name('site.cardapio');
    // /produto/{id}
    Route::get('/produto', 'produto')->name('site.produto');
    Route::get('/ofertas', 'ofertas')->name('site.ofertas');
    Route::get('/carrinho', 'carrinho')->name('site.carrinho');
    Route::get('/cupons', 'cupons')->name('site.cupons');
    Route::get('/sobre', 'sobre')->name('site.sobre');
    Route::get('/politica', 'politica')->name('site.politica');
    Route::get('/login', 'login')->name('site.login');
    Route::get('/regraCupon', 'regraCupon')->name('site.regraCupon');
});

// Route::get('/', [SiteController::class, "index"])->name('site.index');
// Route::get('/cardapio', [SiteController::class, "cardapio"])->name('site.cardapio');
// Route::get('/produto', [SiteController::class, "produto"])->name('site.produto');
// Route::get('/ofertas', [SiteController::class, "ofertas"])->name('site.ofertas');
// Route::get('/carrinho', [SiteController::class, "carrinho"])->name('site.carrinho');
// Route::get('/cupons', [SiteController::class, "cupons"])->name('site.cupons');
// Route::get('/sobre', [SiteController::class, "sobre"])->name('site.sobre');
// Route::get('/politica', [SiteController::class, "politica"])->name('site.politica');
// Route::get('/login', [SiteController::class, "login"])->name('site.login');
// Route::get('/regraCupon', [SiteController::class, "regraCupon"])->name('site.regraCupon');

// UsuarioController


Route::controller(UsuarioController::class)->group(function () {
    Route::get('/admin/usuarios/cadastro', 'create')->name('usuario.cadastro');
    // Route::get('/minhaConta/{id}', [UsuarioController::class, "edit"])->name('usuario.minhaConta');
    // meio correto de se fazer é este, porém, ainda não estou passando id
    Route::get('/minhaConta', 'show')->name('usuario.minhaConta');
    Route::get('/minhasInformacoes', 'infoConta')->name('usuario.minhasInformacoes');
    Route::get('/gerenciarPagamentos', 'viewPagamentos')->name('usuario.gerenciarPagamentos');
    Route::get('/novaFormaPagamento', 'newPagamentos')->name('usuario.novaFormaPagamento');
    Route::get('/editarPagamentos', 'editPagamentos')->name('usuario.editarPagamentos');
    Route::get('/admin/usuarios/salvar', 'store')->name('usuario.store');
});

// Route::get('/minhaConta', [UsuarioController::class, "show"])->name('usuario.minhaConta');

// Route::get('/minhasInformacoes', [UsuarioController::class, "infoConta"])->name('usuario.minhasInformacoes');
// Route::get('/gerenciarPagamentos', [UsuarioController::class, "viewPagamentos"])->name('usuario.gerenciarPagamentos');
// Route::get('/novaFormaPagamento', [UsuarioController::class, "newPagamentos"])->name('usuario.novaFormaPagamento');
// Route::get('/editarPagamentos', [UsuarioController::class, "editPagamentos"])->name('usuario.editarPagamentos');
// Route::get('/admin/usuarios/cadastro', [UsuarioController::class, "create"])->name('usuario.cadastro');
// Route::post('/admin/usuarios/salvar', [UsuarioController::class, "store"])->name('usuario.store');

// ParceirosController

/* pasta cadastroParceiros */

Route::controller(ParceirosController::class)->group(function (){
    Route::get('/sejaParceiro', 'create')->name('parceiros.sejaParceiro');
    Route::get('/cadastroRestaurante', 'createRestaurante')->name('parceiros.cadastroRestaurante');
    Route::get('/cadastroInformacoes', 'cadastroInformacoes')->name('parceiros.minhasInformacoes');
    Route::get('/cadastroCategorias', 'cadastroCategorias')->name('parceiros.categorias');
    Route::get('/selecaoCardapio', 'selecaoCardapio')->name('parceiros.selecaoCardapio');
    Route::get('/cadastroCardapio', 'cadastroCardapio')->name('parceiros.cadastroCardapio');
    Route::get('/cadastroBanner', 'cadastroBanner')->name('parceiros.banner');
    Route::get('/cadastroCupons', 'cadastroCupons')->name('parceiros.cupons');
    // pasta parceiros
    Route::get('/meuRestaurante', 'meuRestaurante')->name('parceiros.meuRestaurante');
});

// Route::get('/sejaParceiro', [ParceirosController::class, "create"])->name('parceiros.sejaParceiro');

// Route::get('/cadastroRestaurante', [ParceirosController::class, "createRestarurante"])->name('parceiros.cadastroRestaurante');
// Route::get('/cadastroInformacoes', [ParceirosController::class, "cadastroInformacoes"])->name('parceiros.minhasInformacoes');
// Route::get('/cadastroCategorias', [ParceirosController::class, "cadastroCategorias"])->name('parceiros.categorias');

// Route::get('/selecaoCardapio', [ParceirosController::class, "selecaoCardapio"])->name('parceiros.selecaoCardapio');
// Route::get('/cadastroCardapio', [ParceirosController::class, "cadastroCardapio"])->name('parceiros.cadastroCardapio');
// Route::get('/cadastroBanner', [ParceirosController::class, "cadastroBanner"])->name('parceiros.banner');
// Route::get('/cadastroCupons', [ParceirosController::class, "cadastroBanner"])->name('parceiros.cupons');
// Route::get('/meuRestaurante', [ParceirosController::class, "meuRestaurante"])->name('parceiros.meuRestaurante');
