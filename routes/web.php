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
use App\Http\Controllers\OfertasController;
use App\Http\Controllers\SubCategoriasController;
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
    Route::get('/produto/{id}', 'produto')->name('site.produto');
    // Route::get('/ofertas', 'ofertas')->name('site.ofertas');
    Route::get('/sobre', 'sobre')->name('site.sobre');
    Route::get('/login', 'login')->name('site.login');
});

/*
* travando as rotas, fazendo com que, se o usuário não estiver logado, ele não tem acesso a essas rotas ["auth"]
*/
Route::middleware(["auth"])->group(function () {
    // relacionados a views q tem q tá logado
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

    Route::controller(CupomController::class)->group(function () {
        // area administrativa
        Route::get('/admin/adm/admCupons/index', 'index')->name('cupom.index');
        Route::get('/admin/adm/admCupons/visualizar/{id}', 'show')->name('cupom.show');
        Route::get('/admin/adm/admCupons/create', 'create')->name('cupom.create');
        Route::post('/admin/adm/admCupons/salvar', 'store')->name('cupom.store');
        Route::get('/admin/adm/admCupons/editar/{id}', 'edit')->name('cupom.edit');
        Route::put('/admin/adm/admCupons/atualizar/{id}', 'update')->name('cupom.update');
        Route::delete('/admin/adm/admCupons/deletar/{id}', 'destroy')->name('cupom.destroy');
        // view cupom
        Route::get('/cupons', 'indexView')->name('cupom.cupons');
    });
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

// OfertasController
Route::controller(OfertasController::class)->group(function () {
    Route::get('/ofertas/produto/{id}', 'produto')->name('ofertas.produto');
    Route::get('/ofertas', 'viewIndex')->name('ofertas.view');
    // area administrativa
    Route::get('/admin/adm/admOfertas/index', 'index')->name('ofertas.index');
    Route::get('/admin/adm/admOfertas/visualizar/{id}', 'show')->name('ofertas.show');
    Route::get('/admin/adm/admOfertas/cadastro', 'create')->name('ofertas.create');
    Route::post('/admin/adm/admOfertas/salvar', 'store')->name('ofertas.store');

    Route::get('/admin/adm/admOfertas/editar/{id}', 'edit')->name('ofertas.edit');
    Route::put('/admin/adm/admOfertas/atualizar/{id}', 'update')->name('ofertas.update');
    Route::delete('/admin/adm/admOfertas/deletar/{id}', 'destroy')->name('ofertas.destroy');
});

// prefix('admin/adm/admUsuarios'): Adiciona o prefixo admin/adm/admUsuarios para todas as rotas dentro do grupo, evitando a repetição desse trecho em cada rota.
// name('usuarioAdm.'): Define o prefixo usuarioAdm. para os nomes das rotas, facilitando o acesso a elas usando o nome abreviado (usuarioAdm.index, usuarioAdm.show, etc.).
// controller(UsuarioController::class): Define o controlador UsuarioController para todas as rotas do grupo, permitindo omitir a classe do controlador em cada rota individual.
// controller(UsuarioController::class): Define o controlador UsuarioController para todas as rotas do grupo, permitindo omitir a classe do controlador em cada rota individual.
Route::prefix('admin/adm/admUsuarios')->name('usuarioAdm.')->controller(UsuarioController::class)->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('/visualizar/{id}', 'show')->name('show');
    Route::get('/cadastro', 'createUserAdmView')->name('create');
    Route::get('/editar/{id}', 'edit')->name('edit');
    Route::put('/atualizar/{id}', 'update')->name('update');
    Route::delete('/deletar/{id}', 'destroy')->name('destroy');
    Route::get('/cadastro', 'create')->name('cadastro')->middleware('guest');
    Route::post('/salvarUsuario', 'store')->name('store');

    // Route::get('/admin/usuarios/cadastro', [UsuarioController::class, 'create'])->name('usuario.cadastro')->middleware('guest');
    // Route::post('/admin/usuarios/salvar', [UsuarioController::class, 'store'])->name('usuario.store');
});

Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
/* pasta de categoriaProdutos */

// Grupo de rotas para Categorias
Route::prefix('admin/adm/admCategorias')->name('categorias.')->controller(CategoriasProdutoController::class)->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('/visualizar/{id}', 'show')->name('show');
    Route::get('/cadastro', 'create')->name('create');
    Route::post('/salvarCategoria', 'store')->name('store');
    Route::get('/produtos/{id}', 'produtos')->name('produtos');
    Route::get('/editar/{id}', 'edit')->name('edit');
    Route::put('/atualizar/{id}', 'update')->name('update');
    Route::delete('/deletar/{id}', 'destroy')->name('destroy');
});

// Grupo de rotas para SubCategorias
Route::prefix('admin/adm/admSubCategorias')->name('subCategorias.')->controller(SubCategoriasController::class)->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('/visualizar/{id}', 'show')->name('show');
    Route::get('/cadastro', 'create')->name('create');
    Route::post('/salvarCategoria', 'store')->name('store');
    Route::get('/produtos/{id}', 'produtos')->name('produtos');
    Route::get('/editar/{id}', 'edit')->name('edit');
    Route::put('/atualizar/{id}', 'update')->name('update');
    Route::delete('/deletar/{id}', 'destroy')->name('destroy');
});

// Grupo de rotas para Produtos
Route::prefix('admin/adm/admProdutos')->name('produtos.')->controller(ProdutoController::class)->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('/visualizar/{id}', 'show')->name('show');
    Route::get('/cadastro', 'create')->name('create');
    Route::post('/salvar', 'store')->name('store');
    Route::get('/editar/{id}', 'edit')->name('edit');
    Route::put('/atualizar/{id}', 'update')->name('update');
    Route::delete('/deletar/{id}', 'destroy')->name('destroy');
});

/* processo de autenticação, login, logout */
route::get("/login", [AutenticacaoController::class, "formLogin"])->name("login.form")->middleware("guest");
route::post("/login", [AutenticacaoController::class, "login"])->name("login")->middleware('guest');
route::get("/logout", [AutenticacaoController::class, "logout"])->name("logout");
