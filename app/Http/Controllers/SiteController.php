<?php

namespace App\Http\Controllers;

use App\Models\Adicional;
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
        $adicionais = Adicional::all();

        // váriavel recebendo um array vazio
        $adicionaisCategorias = [];
        $adicionaisSubCategorias = [];

        foreach ($adicionais as $adicional) {
            // Verifica correspondência com a categoria
            if ($produto->categoria_produto_id == $adicional->categoria_produto_id) {
                $adicionaisCategorias[] = $adicional;
            }
            // Verifica correspondência com a subcategoria
            elseif ($produto->sub_categoria_produto_id == $adicional->sub_categoria_produto_id) {
                $adicionaisSubCategorias[] = $adicional;
            }
        }

        return view('showProduct.produto', compact('produto', 'adicionaisCategorias', 'adicionaisSubCategorias'));
    }

    public function sobre()
    {
        return view('sobre');
    }

    // vai mostrar as regras de uso dos cupons no geral
    public function regraCupon()
    {
        return view('regras');
    }
}
