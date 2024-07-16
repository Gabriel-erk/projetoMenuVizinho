<?php

use App\Http\Controllers\ParceirosController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/site', function () {
    return view('site');
});

// SiteController
Route::get('/index', [SiteController::class, "index"])->name('site.index');
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
Route::get('/gerenciarPagamentos', [UsuarioController::class, "editPagamentos"])->name('usuario.gerenciarPagamentos');
Route::get('/novaFormaPagamento', [UsuarioController::class, "newPagamentos"])->name('usuario.novaFormaPagamento');

Route::get('/templateTeste', function() {
    return view('admin.usuarios.templateUsuario');
});

// ParceirosController
Route::get('/sejaParceiro', [ParceirosController::class, "create"])->name('parceiros.sejaParceiro');
Route::get('/selecaoCardapio', [ParceirosController::class, "selecaoCardapio"])->name('parceiros.selecaoCardapio');
Route::get('/cadastroCardapio', [ParceirosController::class, "cadastroCardapio"])->name('parceiros.cadastroCardapio');

// views parceiros e cadastro restaurante

Route::get('/cadastroRestaurante', function () {
    return view('cadastroParceiro.cadastroRestaurante');
});

Route::get('/selecao', function () {
    return view('admin.parceiros.selecaoCardapio2');
});

Route::get('/cadastroSubCategorias', function () {
    return view('cadastroParceiro.cadastroSubCategorias');
});

Route::get('/cadastroCategorias', function () {
    return view('cadastroParceiro.cadastroCategorias');
});

Route::get('/cadastroInformacoes', function () {
    return view('cadastroParceiro.cadastroInformacoes');
});

// Route::get('/cadastroCardapio', function () {
//     return view('cadastroParceiro.cadastroCardapio');
// });

Route::get('/cadastroBanner', function () {
    return view('cadastroParceiro.cadastroBanner');
});

Route::get('/cadastroCupons', function () {
    return view('cadastroParceiro.cadastroCupons');
});
