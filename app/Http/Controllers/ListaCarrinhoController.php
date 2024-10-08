<?php

namespace App\Http\Controllers;

use App\Models\ItensCarrinho;
use App\Models\ListaCarrinho;

use App\Models\Produto;
use App\Models\MetodoPagamento;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListaCarrinhoController extends Controller
{

    public function addToCart($produtoId)
    {
        $userId = auth()->id();  // Pega o ID do usuário autenticado

        // Verifica se já existe uma lista de carrinho para o usuário
        $listaCarrinho = ListaCarrinho::firstOrCreate(
            ['user_id' => $userId]
        );

        // Verifica se o produto já está na tabela itens_carrinho para esse carrinho
        $itemCarrinho = ItensCarrinho::where('lista_carrinho_id', $listaCarrinho->id)
            ->where('produto_id', $produtoId)
            ->first();

        if ($itemCarrinho) {
            // Se já existir, incrementa a quantidade
            $itemCarrinho->quantidade += 1;
            $itemCarrinho->save();
        } else {
            // Se não existir, cria um novo item com quantidade 1
            ItensCarrinho::create([
                'lista_carrinho_id' => $listaCarrinho->id,
                'produto_id' => $produtoId,
                'quantidade' => 1
            ]);
        }

        return redirect()->route('lista.carrinho');  // Redireciona para a view do carrinho
    }

    public function index()
    {
        $userId = auth()->id();

        // Busca a lista de carrinho do usuário
        $listaCarrinho = ListaCarrinho::where('user_id', $userId)->first();

        if ($listaCarrinho) {
            // Busca os itens do carrinho junto com os produtos
            $itensCarrinho = ItensCarrinho::with('produto')
                ->where('lista_carrinho_id', $listaCarrinho->id)
                ->get();
        } else {
            $itensCarrinho = collect(); // Retorna uma coleção vazia se não houver lista de carrinho
        }

        // Produtos aleatórios
        $produtos = Produto::inRandomOrder()->take(7)->get();

        // Métodos de pagamento do usuário logado
        $metodosPagamentos = MetodoPagamento::where('user_id', $userId)->get();

        return view('carrinho', compact('produtos', 'metodosPagamentos', 'itensCarrinho'));
    }
}
