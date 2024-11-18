<?php

use App\Http\Controllers\api\CategoriasProdutosApiController;
use App\Http\Controllers\api\CupomApiController;
use App\Http\Controllers\api\ItensCarrinhoApiController;
use App\Http\Controllers\api\LojaApiController;
use App\Http\Controllers\api\MetodoPagamentoApiController;
use App\Http\Controllers\api\ProdutosApiController;
use App\Http\Controllers\api\SubCategoriasApiController;
use App\Http\Controllers\api\UsuariosApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(CategoriasProdutosApiController::class)->group(function () {
    Route::get("categorias", 'index');
    Route::get("categorias/visualizar/{id}", 'show');
    Route::post("categorias/salvar", 'store');
    Route::put("categorias/atualizar/{id}", 'update');
    Route::delete("categorias/deletar/{id}", 'destroy');
});

Route::controller(SubCategoriasApiController::class)->group(function () {
    Route::get("subCategorias", 'index');
    Route::get("subCategorias/visualizar/{id}", 'show');
    Route::post("subCategorias/salvar", 'store');
    Route::put("subCategorias/atualizar/{id}", 'update');
    Route::delete("subCategorias/deletar/{id}", 'destroy');
});

Route::controller(ProdutosApiController::class)->group(function () {
    Route::get("produtos", 'index');
    Route::get("produtos/visualizar/{id}", 'show');
    Route::post("produtos/salvar", 'store');
    Route::put("produtos/atualizar/{id}", 'update');
    Route::delete("produtos/deletar/{id}", 'destroy');
});

Route::controller(UsuariosApiController::class)->group(function () {
    Route::get("usuarios", 'index');
    Route::get("usuarios/visualizar/{id}", 'show');
    Route::post("usuarios/salvar", 'store');
    Route::put("usuarios/atualizar/{id}", 'update');
    Route::delete("usuarios/deletar/{id}", 'destroy');
});

Route::controller(MetodoPagamentoApiController::class)->group(function () {
    Route::get("pagamentos/{id}", 'index');
    Route::get("pagamentos/visualizar/{id}", 'show');
    // passando por parâmetro o id do usuário que o cartão será associado
    Route::post("pagamentos/salvar/{userId}", 'store');
    Route::put("pagamentos/atualizar/{id}", 'update');
    Route::delete("pagamentos/deletar/{id}", 'destroy');
});

Route::controller(CupomApiController::class)->group(function () {
    Route::get("cupom", 'index');
    Route::get("cupom/visualizar/{id}", 'show');
    Route::post("cupom/salvar", 'store');
    Route::put("cupom/atualizar/{id}", 'update');
    Route::delete("cupom/deletar/{id}", 'destroy');
});

Route::controller(ItensCarrinhoApiController::class)->group(function () {
    Route::get("itens/{id}", 'index');
});

Route::controller(LojaApiController::class)->group(function () {
    Route::get("loja", 'index');
    Route::get("loja/visualizar", 'show');
    Route::post("loja/salvar", 'store');
    Route::put("loja/atualizar", 'update');
    Route::delete("loja/deletar", 'destroy');
});
