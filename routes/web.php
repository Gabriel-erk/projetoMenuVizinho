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


