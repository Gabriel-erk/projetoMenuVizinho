<?php

use App\Http\Controllers\ParceirosController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/site', function () {
    return view('site');
});

// SiteController
Route::get('/', [SiteController::class, "index"])->name('site.index');
Route::get('/cardapio', [SiteController::class, "cardapio"])->name('site.cardapio');

// /produto/{id}
Route::get('/produto', [SiteController::class, "produto"])->name('site.produto');
Route::get('/ofertas', [SiteController::class, "ofertas"])->name('site.ofertas');
Route::get('/carrinho', [SiteController::class, "carrinho"])->name('site.carrinho');
Route::get('/cupons', [SiteController::class, "cupons"])->name('site.cupons');
Route::get('/sobre', [SiteController::class, "sobre"])->name('site.sobre');
Route::get('/politica', [SiteController::class, "politica"])->name('site.politica');
Route::get('/login', [SiteController::class, "login"])->name('site.login');

// UsuarioController

Route::get('/cadastro', [UsuarioController::class, "create"])->name('usuario.cadastro');

// meio correto de se fazer é este, porém, ainda não estou passando id
// Route::get('/minhaConta/{id}', [UsuarioController::class, "edit"])->name('usuario.minhaConta');
Route::get('/minhaConta', [UsuarioController::class, "show"])->name('usuario.minhaConta');
Route::get('/minhasInformacoes', [UsuarioController::class, "infoConta"])->name('usuario.minhasInformacoes');

Route::get('/gerenciarPagamentos', [UsuarioController::class, "viewPagamentos"])->name('usuario.gerenciarPagamentos');
Route::get('/novaFormaPagamento', [UsuarioController::class, "newPagamentos"])->name('usuario.novaFormaPagamento');
Route::get('/editarPagamentos', [UsuarioController::class, "editPagamentos"])->name('usuario.editarPagamentos');

// ParceirosController

/* pasta cadastroParceiros */
Route::get('/sejaParceiro', [ParceirosController::class, "create"])->name('parceiros.sejaParceiro');
Route::get('/selecaoCardapio', [ParceirosController::class, "selecaoCardapio"])->name('parceiros.selecaoCardapio');
Route::get('/cadastroCardapio', [ParceirosController::class, "cadastroCardapio"])->name('parceiros.cadastroCardapio');

/* pasta parceiros */
Route::get('/meuRestaurante', [ParceirosController::class, "meuRestaurante"])->name('parceiros.meuRestaurante');

// views parceiros e cadastro restaurante

Route::get('/cadastroRestaurante', function () {
    return view('admin.cadastroParceiros.cadastroRestaurante');
});
Route::get('/cadastroInformacoes', function () {
    return view('admin.cadastroParceiros.cadastroInformacoes');
});
Route::get('/cadastroBanner', function () {
    return view('admin.cadastroParceiros.cadastroBanner');
});
Route::get('/cadastroCategorias', function () {
    return view('admin.cadastroParceiros.cadastroCategorias');
});
Route::get('/cadastroSubCategorias', function () {
    return view('admin.cadastroParceiros.cadastroSubCategorias');
});
Route::get('/cadastroCupons', function () {
    return view('admin.cadastroParceiros.cadastroCupons');
});

Route::get('/selecao', function () {
    return view('admin.parceiros.selecaoCardapio2');
});

// Route::get('/cadastroCardapio', function () {
//     return view('cadastroParceiro.cadastroCardapio');
// });




