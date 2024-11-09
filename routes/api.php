<?php

use App\Http\Controllers\api\CategoriasProdutosApiController;
use App\Http\Controllers\api\ProdutosApiController;
use App\Http\Controllers\api\SubCategoriasApiController;
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
