<?php

use App\Http\Controllers\AutenticacaoController;
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

// UsuarioController
/*
* travando as rotas
* fazendo com que, se o usuário não estiver logado, ele não tem acesso a essas rotas 
*/
Route::middleware(["auth"])->group(function () {
    Route::controller(UsuarioController::class)->group(function () {
        // Route::get('/minhaConta/{id}', [UsuarioController::class, "edit"])->name('usuario.minhaConta');
        // meio correto de se fazer é este, porém, ainda não estou passando id
        Route::get('/minhaConta', 'show')->name('usuario.minhaConta');
        Route::get('/minhasInformacoes', 'infoConta')->name('usuario.minhasInformacoes');
        Route::get('/gerenciarPagamentos', 'viewPagamentos')->name('usuario.gerenciarPagamentos');
        Route::get('/novaFormaPagamento', 'newPagamentos')->name('usuario.novaFormaPagamento');
        Route::get('/editarPagamentos', 'editPagamentos')->name('usuario.editarPagamentos');
    });
});
// se ficar no bloco acima, só podem ser feitas se o usuário estiver logado, e quero poder cadastrar/salvar informações apenas como vistante
Route::get('/admin/usuarios/cadastro', [UsuarioController::class, 'create'])->name('usuario.cadastro')->middleware('guest');
Route::post('/admin/usuarios/salvar', [UsuarioController::class, 'store'])->name('usuario.store');

/* pasta cadastroParceiros */

Route::controller(ParceirosController::class)->group(function () {
    Route::get('/sejaParceiro', 'create')->name('parceiros.sejaParceiro')->middleware('guest');
    Route::get('/cadastroRestaurante', 'createRestaurante')->name('parceiros.cadastroRestaurante');
    Route::get('/cadastroInformacoes/{id}', 'cadastroInformacoes')->name('parceiros.minhasInformacoes');
    Route::get('/cadastroCategorias', 'cadastroCategorias')->name('parceiros.categorias');
    Route::get('/selecaoCardapio', 'selecaoCardapio')->name('parceiros.selecaoCardapio');
    Route::get('/cadastroCardapio', 'cadastroCardapio')->name('parceiros.cadastroCardapio');
    Route::get('/cadastroBanner', 'cadastroBanner')->name('parceiros.banner');
    Route::get('/cadastroCupons', 'cadastroCupons')->name('parceiros.cupons');
    // pasta parceiros
    Route::get('/meuRestaurante', 'meuRestaurante')->name('parceiros.meuRestaurante');
});

route::get("/login", [AutenticacaoController::class, "formLogin"])->name("login.form")->middleware("guest");
route::post("/login", [AutenticacaoController::class, "login"])->name("login");
route::get("/logout", [AutenticacaoController::class, "logout"])->name("logout");


