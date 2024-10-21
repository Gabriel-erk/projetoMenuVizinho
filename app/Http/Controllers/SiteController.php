<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CategoriaProduto;
use App\Models\SubCategoria;
use App\Models\Produto;

use App\Models\MetodoPagamento;
use Illuminate\Support\Facades\Auth;


class SiteController extends Controller
{
    // paginas principais
    public function index()
    {   
        $categorias = CategoriaProduto::all();
        // váriavel com os produtos de cada categoria
        $categoriasProdutos = CategoriaProduto::with('produtos')->get();
        $subCategorias = SubCategoria::with('produtos')->get();
        return view('index', compact('categorias', 'subCategorias'));
    }

    public function cardapio()
    {   
        $categorias = CategoriaProduto::with('produtos')->get();
        $subCategorias = SubCategoria::with('produtos')->get();
        return view('cardapio', compact('categorias', 'subCategorias'));
    }

    public function produto(string $id)
    {   
        $produto = Produto::findOrFail($id);
        return view('produto', compact('produto'));
    }

    public function ofertas()
    {
        return view('ofertas');
    }

    public function cupons()
    {
        return view('cupons');
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
