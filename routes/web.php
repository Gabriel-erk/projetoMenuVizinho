<?php

use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CupomController;
use App\Http\Controllers\MetodoPagamentoController;
use App\Http\Controllers\CategoriasProdutoController;
use App\Http\Controllers\ListaCarrinhoController;
use App\Http\Controllers\ItensCarrinhoController;
use App\Http\Controllers\SubCategoriasController;
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
    Route::get('/produto/{id}', 'produto')->name('site.produto');
    Route::get('/ofertas', 'ofertas')->name('site.ofertas');
    Route::get('/cupons', 'cupons')->name('site.cupons');
    Route::get('/sobre', 'sobre')->name('site.sobre');
    Route::get('/login', 'login')->name('site.login');
    // Route::get('/regraCupon', 'regraCupon')->name('site.regraCupon');
});

// UsuarioController - métodoPagamentoController e listaCarrinhoController (já que todos dentro deste bloco, somente logados tem acesso a essas rotas)
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
    // só pode adicionar ao carrinho se estiver logado - o que já evita de jogar um erro na cara do usuário pq o usuário n ta logado e ele tá tentando salvar, mas como n está logado, n consegue pegar o id dele, q é essencial
    Route::controller(ListaCarrinhoController::class)->group(function () {
        Route::post('/produto/adicionarAoCarrinho/{produtoId}', 'addToCart')->name('lista.addToCart');
        Route::get('/carrinho', 'index')->name('lista.carrinho');
        Route::post('/carrinho/removerItem/{itemId}', 'removeItem')->name('lista.remover');
        Route::post('/carrinho/limpar/{itemId}', 'clearCart')->name('lista.limpar');
        // area administrativa
        Route::get('/admin/adm/admListaC/index', 'admIndex')->name('lista.index');
        Route::get('/admin/adm/admListaC/show/{id}', 'show')->name('lista.show');
    });

    Route::controller(ItensCarrinhoController::class)->group(function () {
        // area administrativa
        Route::get('/admin/adm/admListaC/admItensCarrinho/index/{id}', 'index')->name('itens.index');
    });

    Route::controller(LojaController::class)->group(function () {
        // area administrativa
        Route::get('/admin/adm/admLoja/index', 'index')->name('loja.index');
        Route::get('/admin/adm/admLoja/visualizar', 'show')->name('loja.show');
        Route::get('/admin/adm/admLoja/create', 'create')->name('loja.create');
        Route::post('/admin/adm/admLoja/salvar', 'store')->name('loja.store');
        Route::get('/admin/adm/admLoja/editar', 'edit')->name('loja.edit');
        Route::put('/admin/adm/admLoja/atualizar', 'update')->name('loja.update');
        Route::get('/admin/adm/admLoja/deletar', 'destroy')->name('loja.destroy');
        // view normal
        Route::get('/politicaPrivacidade', 'politica')->name('loja.politica');
        Route::get('/regrasCupons', 'showRegras')->name('loja.regras');
    });

    Route::controller(CupomController::class)->group(function () {
        // area administrativa
        Route::get('/admin/adm/admCupons/index', 'index')->name('cupom.index');
        Route::get('/admin/adm/admCupons/visualizar', 'show')->name('cupom.show');
        Route::get('/admin/adm/admCupons/create', 'create')->name('cupom.create');
        Route::post('/admin/adm/admCupons/salvar', 'store')->name('cupom.store');
        Route::get('/admin/adm/admCupons/editar/{id}', 'edit')->name('cupom.edit');
        Route::put('/admin/adm/admCupons/atualizar/{id}', 'update')->name('cupom.update');
        Route::delete('/admin/adm/admCupons/deletar/{id}', 'destroy')->name('cupom.destroy');
    });
});

Route::get('/admin/adm/admUsuarios/index', [UsuarioController::class, 'index'])->name('usuarioAdm.index');
Route::get('/admin/adm/admUsuarios/visualizar/{id}', [UsuarioController::class, 'show'])->name('usuarioAdm.show');
Route::get('/admin/adm/admUsuarios/cadastro', [UsuarioController::class, 'createUserAdmView'])->name('usuarioAdm.create');
Route::get('/admin/adm/admUsuarios/editar/{id}', [UsuarioController::class, 'edit'])->name('usuarioAdm.edit');
Route::put('/admin/adm/admUsuarios/atualizar/{id}', [UsuarioController::class, 'update'])->name('usuarioAdm.update');
Route::delete('/admin/adm/admUsuarios/deletar/{id}', [UsuarioController::class, 'destroy'])->name('usuarioAdm.destroy');

Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// se ficar no bloco acima, só podem ser feitas se o usuário estiver logado, e quero poder cadastrar informações apenas como vistante
Route::get('/admin/usuarios/cadastro', [UsuarioController::class, 'create'])->name('usuario.cadastro')->middleware('guest');
Route::post('/admin/usuarios/salvar', [UsuarioController::class, 'store'])->name('usuario.store');

/* pasta de categoriaProdutos */

Route::controller(CategoriasProdutoController::class)->group(function () {
    Route::get('/admin/adm/admCategorias/index', 'index')->name('categorias.index');
    Route::get('/admin/adm/admCategorias/visualizar/{id}', 'show')->name('categorias.show');
    Route::get('/admin/adm/admCategorias/cadastro', 'create')->name('categorias.create');

    Route::post('/admin/adm/admCategorias/salvarCategoria', 'store')->name('categorias.store');

    Route::get('/admin/adm/admCategorias/produtos/{id}', 'produtos')->name('categorias.produtos');

    Route::get('/admin/adm/admCategorias/editar/{id}', 'edit')->name('categorias.edit');
    Route::put('/admin/adm/admCategorias/atualizar/{id}', 'update')->name('categorias.update');
    Route::delete('/admin/adm/admCategorias/deletar/{id}', 'destroy')->name('categorias.destroy');
});

/* pasta de subcategorias */
Route::controller(SubCategoriasController::class)->group(function () {
    Route::get('/admin/adm/admSubCategorias/index', 'index')->name('subCategorias.index');
    Route::get('/admin/adm/admSubCategorias/visualizar/{id}', 'show')->name('subCategorias.show');
    Route::get('/admin/adm/admSubCategorias/cadastro', 'create')->name('subCategorias.create');

    Route::post('/admin/adm/admSubCategorias/salvarCategoria', 'store')->name('subCategorias.store');
    Route::get('/admin/adm/admSubCategorias/produtos/{id}', 'produtos')->name('subCategorias.produtos');

    Route::get('/admin/adm/admSubCategorias/editar/{id}', 'edit')->name('subCategorias.edit');
    Route::put('/admin/adm/admSubCategorias/atualizar/{id}', 'update')->name('subCategorias.update');
    Route::delete('/admin/adm/admSubCategorias/deletar/{id}', 'destroy')->name('subCategorias.destroy');
});

/* pasta de produtos */
Route::controller(ProdutoController::class)->group(function () {
    Route::get('/admin/adm/admProdutos/index', 'index')->name('produtos.index');
    Route::get('/admin/adm/admProdutos/visualizar/{id}', 'show')->name('produtos.show');
    Route::get('/admin/adm/admProdutos/cadastro', 'create')->name('produtos.create');

    Route::post('/admin/adm/admProdutos/salvarCategoria', 'store')->name('produtos.store');

    Route::get('/admin/adm/admProdutos/editar/{id}', 'edit')->name('produtos.edit');
    Route::put('/admin/adm/admProdutos/atualizar/{id}', 'update')->name('produtos.update');
    Route::delete('/admin/adm/admProdutos/deletar/{id}', 'destroy')->name('produtos.destroy');
});

/* processo de autenticação, login, logout */
route::get("/login", [AutenticacaoController::class, "formLogin"])->name("login.form")->middleware("guest");
route::post("/login", [AutenticacaoController::class, "login"])->name("login")->middleware('guest');
route::get("/logout", [AutenticacaoController::class, "logout"])->name("logout");
