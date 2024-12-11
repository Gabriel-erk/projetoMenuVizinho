<?php

namespace App\Http\Controllers;
use App\Models\ItensCarrinho;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ItensCarrinhoController extends Controller
{

    public function index(string $id)
    {
        // Busca os itens da tabela ItensCarrinho que estão associados à lista de carrinho
        $itens = ItensCarrinho::where('lista_carrinho_id', $id)->get();
    
        // Retorna para a view 'visualizar' passando os itens encontrados
        return view('admin.adm.admListaC.admItensCarrinho.index', compact('itens'));
    }    

}
