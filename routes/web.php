<?php

use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MetodoPagamentoController;
use App\Http\Controllers\CategoriasProdutoController;
use App\Http\Controllers\ParceirosController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/site', function () {
    return view('site');
});

Route::get('/site2', function () {
    return view('layouts.siteBootstrap');
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
        // meio correto de se fazer é este, porém, ainda não estou passando id
        Route::get('/admin/usuarios/minhaConta', 'minhaConta')->name('usuario.minhaConta');
        Route::get('/admin/usuarios/minhasInformacoes/{id}', 'infoConta')->name('usuario.minhasInformacoes');
        Route::get('/admin/usuarios/meusPedidos', 'meusPedidos')->name('usuario.meusPedidos');
    });

    Route::controller(MetodoPagamentoController::class)->group(function () {
        Route::get('/admin/usuarios/gerenciarPagamentos/{id}', 'index')->name('usuario.gerenciarPagamentos');
        Route::get('/admin/usuarios/novaFormaPagamento', 'create')->name('usuario.novaFormaPagamento');
        Route::get('/admin/usuarios/editarPagamentos/{id}', 'edit')->name('usuario.editarPagamentos');


        Route::post('/admin/usuarios/salvarPagamento', 'store')->name('pagamentos.store');
        Route::put('/admin/usuarios/atualizarPagamento/{id}', 'update')->name('pagamentos.atualizarPagamento');
        Route::delete('/admin/usuarios/deletarPagamento/{id}', 'destroy')->name('pagamentos.deletarPagamento');
    });
});

Route::get('/admin/adm/admUsuarios/index', [UsuarioController::class, 'index'])->name('usuarioAdm.index');
Route::get('/admin/adm/admUsuarios/visualizar/{id}', [UsuarioController::class, 'show'])->name('usuarioAdm.show');
Route::get('/admin/adm/admUsuarios/cadastro', [UsuarioController::class, 'createUserAdmView'])->name('usuarioAdm.create');
Route::get('/admin/adm/admUsuarios/editar/{id}', [UsuarioController::class, 'edit'])->name('usuarioAdm.edit');
Route::put('/admin/adm/admUsuarios/atualizar/{id}', [UsuarioController::class, 'update'])->name('usuarioAdm.update');
Route::delete('/admin/adm/admUsuarios/deletar/{id}', [UsuarioController::class, 'destroy'])->name('usuarioAdm.destroy');

Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// se ficar no bloco acima, só podem ser feitas se o usuário estiver logado, e quero poder cadastrar/salvar informações apenas como vistante
Route::get('/admin/usuarios/cadastro', [UsuarioController::class, 'create'])->name('usuario.cadastro')->middleware('guest');
Route::post('/admin/usuarios/salvar', [UsuarioController::class, 'store'])->name('usuario.store');


/* pasta de categoriaProdutos */

Route::controller(CategoriasProdutoController::class)->group(function () {
    Route::get('/admin/adm/admCategorias/index', 'index')->name('categorias.index');
    Route::get('/admin/adm/admCategorias/visualizar/{id}', 'show')->name('categorias.show');
    Route::get('/admin/adm/admCategorias/cadastro', 'create')->name('categorias.create');

    Route::post('/admin/adm/admCategorias/salvarCategoria', 'store')->name('categorias.store');

    Route::get('/admin/adm/admCategorias/editar/{id}', 'edit')->name('categorias.edit');
    Route::put('/admin/adm/admCategorias/atualizar/{id}', 'update')->name('categorias.update');
    Route::delete('/admin/adm/admCategorias/deletar/{id}', 'destroy')->name('categorias.destroy');    
});

/* pasta cadastroParceiros */

Route::controller(ParceirosController::class)->group(function () {
    Route::get('/sejaParceiro', 'create')->name('parceiros.sejaParceiro')->middleware('guest');
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

route::get("/login", [AutenticacaoController::class, "formLogin"])->name("login.form")->middleware("guest");
route::post("/login", [AutenticacaoController::class, "login"])->name("login")->middleware('guest');
route::get("/logout", [AutenticacaoController::class, "logout"])->name("logout");
