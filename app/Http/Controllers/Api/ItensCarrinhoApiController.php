<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ItensCarrinho;
use Exception;
use Illuminate\Http\Request;

class ItensCarrinhoApiController extends Controller
{
    // retorna todos os itens de uma lista carrinho específica
    public function index(string $id)
    {
        try {
            // Busca os itens da tabela ItensCarrinho que estão associados à lista de carrinho
            $itens = ItensCarrinho::where('lista_carrinho_id', $id)->get();

            // Retorna passando os itens encontrados
            return response()->json([$itens], 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao listar dados"], 500);
        }
    }
}
