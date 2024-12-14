<?php

use App\Http\Controllers\AdicionalController;
use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\BannerController;
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
    Route::get('/sobre', 'sobre')->name('site.sobre');
    Route::get('/login', 'login')->name('site.login');
});

// prefix('admin/adm/admUsuarios'): Adiciona o prefixo admin/adm/admUsuarios para todas as rotas dentro do grupo, evitando a repetição desse trecho em cada rota.
// name('usuarioAdm.'): Define o prefixo usuarioAdm. para os nomes das rotas, facilitando o acesso a elas usando o nome abreviado (usuarioAdm.index, usuarioAdm.show, etc.).
// controller(UsuarioController::class): Define o controlador UsuarioController para todas as rotas do grupo, permitindo omitir a classe do controlador em cada rota individual.
// controller(UsuarioController::class): Define o controlador UsuarioController para todas as rotas do grupo, permitindo omitir a classe do controlador em cada rota individual.
Route::prefix('admin/adm/admUsuarios')->name('usuarioAdm.')->controller(UsuarioController::class)->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('/visualizar/{id}', 'show')->name('show');
    Route::get('/cadastrar', 'createUserAdmView')->name('create');
    Route::get('/editar/{id}', 'edit')->name('edit');
    Route::put('/atualizar/{id}', 'update')->name('update');
    Route::delete('/deletar/{id}', 'destroy')->name('destroy');
    Route::get('/cadastro', 'create')->name('cadastro')->middleware('guest');
    Route::post('/salvarUsuario', 'store')->name('store');
});

/*
* travando as rotas, fazendo com que, se o usuário não estiver logado, ele não tem acesso a essas rotas ["auth"]
*/
Route::middleware(["auth"])->group(function () {
    // relacionados a views q tem q tá logado

    // Rotas para Gerenciamento de Conta de Usuário
    Route::prefix('admin/usuarios')->name('usuario.')->controller(UsuarioController::class)->group(function () {
        Route::get('/minhaConta', 'minhaConta')->name('minhaConta');
        Route::get('/minhasInformacoes/{id}', 'infoConta')->name('minhasInformacoes');
        Route::get('/meusPedidos', 'meusPedidos')->name('meusPedidos');
    });

    Route::controller(MetodoPagamentoController::class)->group(function () {
        // Rotas para Gerenciamento de Métodos de Pagamento em usuários
        Route::prefix('admin/usuarios')->name('pagamentos.')->group(function () {
            Route::get('/gerenciarPagamentos/{id}', 'index')->name('gerenciarPagamentos');
            Route::get('/novaFormaPagamento', 'create')->name('novaFormaPagamento');
            Route::get('/editarPagamentos/{id}', 'edit')->name('editarPagamentos');

            Route::post('/salvarPagamento', 'store')->name('store');
            Route::put('/atualizarPagamento/{id}', 'update')->name('atualizarPagamento');
            Route::delete('/deletarPagamento/{id}', 'destroy')->name('deletarPagamento');
        });

        // Rotas para da área administrativa para Gerenciamento de Métodos de Pagamento
        Route::prefix('admin/usuarios/admCartões')->name('cartao.')->group(function () {
            Route::get('/index', 'indexAdm')->name('index');
            Route::get('/visualizar/{id}', 'show')->name('show');
            Route::get('/create', 'createAdm')->name('create');
            Route::get('/editar/{id}', 'editAdm')->name('edit');
        });
    });

    // só pode adicionar ao carrinho se estiver logado - o que já evita de jogar um erro na cara do usuário pq o usuário n ta logado e ele tá tentando salvar, mas como n está logado, n consegue pegar o id dele, q é essencial
    Route::controller(ListaCarrinhoController::class)->group(function () {
        Route::post('/produto/adicionarAoCarrinho/{itemId}/{tipoItem}', 'addToCart')->name('lista.addToCart');
        Route::get('/carrinho', 'index')->name('lista.carrinho');
        Route::post('/carrinho/removerItem/{itemId}', 'removeItem')->name('lista.remover');
        Route::post('/carrinho/limpar', 'limparCarrinho')->name('lista.limpar');
        Route::post('/finalizar-compra', 'finalizarCompra')->name('lista.finalizarCompra');

        // area administrativa
        Route::get('/admin/adm/admListaC/index', 'admIndex')->name('lista.index');
        Route::get('/admin/adm/admListaC/show/{id}', 'show')->name('lista.show');
    });

    Route::controller(ItensCarrinhoController::class)->group(function () {
        // area administrativa
        Route::get('/admin/adm/admListaC/admItensCarrinho/index/{id}', 'index')->name('itens.index');
    });

    // Rota para Cupons
    Route::controller(CupomController::class)->group(function () {
        // Rotas administrativas para Cupons
        Route::prefix('admin/adm/admCupons')->name('cupom.')->group(function () {
            Route::get('/index', 'index')->name('index');
            Route::get('/visualizar/{id}', 'show')->name('show');
            Route::get('/create', 'create')->name('create');
            Route::post('/salvar', 'store')->name('store');
            Route::get('/editar/{id}', 'edit')->name('edit');
            Route::put('/atualizar/{id}', 'update')->name('update');
            Route::delete('/deletar/{id}', 'destroy')->name('destroy');
        });
        // Rota pública para Cupons
        Route::get('/cupons', 'indexView')->name('cupom.cupons');
    });
});

Route::controller(LojaController::class)->group(function () {
    // Grupo de rotas para Loja
    Route::prefix('admin/adm/admLoja')->name('loja.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/visualizar', 'show')->name('show');
        Route::get('/create', 'create')->name('create');
        Route::post('/salvar', 'store')->name('store');
        Route::get('/editar', 'edit')->name('edit');
        Route::put('/atualizar', 'update')->name('update');
        Route::delete('/deletar', 'destroy')->name('destroy');
    });
    // Rotas públicas para Loja
    Route::get('/politicaPrivacidade', 'politica')->name('loja.politica');
    Route::get('/regrasCupons', 'showRegras')->name('loja.regras');
});
Route::controller(BannerController::class)->group(function () {
    // Grupo de rotas para Banners
    Route::prefix('admin/adm/admBanners')->name('banners.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/visualizar/{id}', 'show')->name('show');
        Route::get('/create', 'create')->name('create');
        Route::post('/salvar', 'store')->name('store');
        Route::get('/editar/{id}', 'edit')->name('edit');
        Route::put('/atualizar/{id}', 'update')->name('update');
        Route::delete('/deletar/{id}', 'destroy')->name('destroy');
    });
});

Route::controller(OfertasController::class)->group(function () {
    // Grupo de rotas para Ofertas
    Route::prefix('admin/adm/admOfertas')->name('ofertas.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/visualizar/{id}', 'show')->name('show');
        Route::get('/cadastro', 'create')->name('create');
        Route::post('/salvar', 'store')->name('store');
        Route::get('/editar/{id}', 'edit')->name('edit');
        Route::put('/atualizar/{id}', 'update')->name('update');
        Route::delete('/deletar/{id}', 'destroy')->name('destroy');
    });
    // Rotas públicas para Ofertas
    Route::get('/ofertas/produto/{id}', 'produtoOferta')->name('ofertas.produto');
    Route::get('/ofertas', 'viewIndex')->name('ofertas.view');
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

// Rota para Addicionais
Route::controller(AdicionalController::class)->group(function () {
    // Rotas administrativas para Adicionais
    Route::prefix('admin/adm/admAdicionais')->name('adicional.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/visualizar/{id}', 'show')->name('show');
        Route::get('/create', 'create')->name('create');
        Route::post('/salvar', 'store')->name('store');
        Route::get('/editar/{id}', 'edit')->name('edit');
        Route::put('/atualizar/{id}', 'update')->name('update');
        Route::delete('/deletar/{id}', 'destroy')->name('destroy');
    });
    // rota para vincular adicional ao produto e add ao carrinho
    Route::post('/produto/addAdicional/{produtoId}/{tipoItem}/{adicionalId}', 'addAdicional')->name('adicional.addToCart');
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
