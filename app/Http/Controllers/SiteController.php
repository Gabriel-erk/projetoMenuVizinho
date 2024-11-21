<?php

namespace App\Http\Controllers;
use App\Models\CategoriaProduto;
use App\Models\SubCategoria;
use App\Models\Produto;

class SiteController extends Controller
{
    // paginas principais
    public function index()
    {   
        return view('index');
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
        return view('showProduct.produto', compact('produto'));
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
