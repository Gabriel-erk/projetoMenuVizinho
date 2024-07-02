<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    // paginas principais
    public function index()
    {
        return view('index');
    }

    public function cardapio()
    {
        return view('cardapio');
    }

    public function produto()
    {
        return view('produto');
    }

    public function ofertas()
    {
        return view('ofertas');
    }

    public function carrinho()
    {
        return view('carrinho');
    }

    public function cupons()
    {
        return view('cupons');
    }

    public function politica()
    {
        return view('politica');
    }

    public function sobre()
    {
        return view('sobre');
    }

    // public function cadastro()
    // {
    //     return view('cadastro');
    // }

    public function login()
    {
        return view('login');
    }

    // paginas de cadastro de restaurante


}
