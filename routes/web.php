<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/site', function () {
    return view('site');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/cardapio', function () {
    return view('cardapio');
});

Route::get('/politica', function () {
    return view('politica');
});

Route::get('/cadastro', function () {
    return view('cadastro');
});

Route::get('/produto', function () {
    return view('produto');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/ofertas', function () {
    return view('ofertas');
});

Route::get('/sobre', function () {
    return view('sobre');
});

Route::get('/carrinho', function () {
    return view('carrinho');
});


Route::get('/cupons', function () {
    return view('cupons');
});

// views parceiros e cadastro restaurante

Route::get('/sejaParceiro', function () {
    return view('sejaParceiro');
});

Route::get('/cadastroRestaurante', function () {
    return view('cadastroParceiro.cadastroRestaurante');
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

Route::get('/cadastroCardapio', function () {
    return view('cadastroParceiro.cadastroCardapio');
});

Route::get('/cadastroBanner', function () {
    return view('cadastroParceiro.cadastroBanner');
});

Route::get('/cadastroCupons', function () {
    return view('cadastroParceiro.cadastroCupons');
});

Route::get('/minhaConta', function () {
    return view('infoUser.minhaConta');
});



