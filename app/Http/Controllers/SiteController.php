<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CategoriaProduto;


class SiteController extends Controller
{
    // paginas principais
    public function index()
    {   
        $categorias = CategoriaProduto::all();
        return view('index', compact('categorias'));
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

    // vai mostrar as regras de uso dos cupons no geral
    public function regraCupon(){
        return view('regras');
    }


}
