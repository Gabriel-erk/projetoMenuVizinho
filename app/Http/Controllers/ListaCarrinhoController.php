<?php

namespace App\Http\Controllers;

use App\Models\Cupom;
use App\Models\ItensCarrinho;
use App\Models\ListaCarrinho;

use App\Models\Produto;
use App\Models\MetodoPagamento;

class ListaCarrinhoController extends Controller
{

    public function admIndex()
    {
        $listas = ListaCarrinho::all();
        return view('admin.adm.admListaC.index', compact('listas'));
    }

    public function show(string $id)
    {
        $lista = ListaCarrinho::findOrFail($id);
        return view('admin.adm.admListaC.visualizar', compact('lista'));
    }

    // tipoItem identifica se é produto ou oferta
    // itemId é o id do produto ou oferta
    public function addToCart($itemId, $tipoItem)
    {
        $userId = auth()->id();  // Pega o ID do usuário autenticado

        // Verifica se já existe uma lista de carrinho para o usuário
        $listaCarrinho = ListaCarrinho::firstOrCreate(
            ['user_id' => $userId]
        );

        // Verifica se o item (produto ou oferta) já está na tabela itens_carrinho para esse carrinho
        $itemCarrinho = ItensCarrinho::where('lista_carrinho_id', $listaCarrinho->id)
            ->where('item_id', $itemId)
            ->where('tipo_item', $tipoItem)
            ->first();

        if ($itemCarrinho) {
            // Se já existir, incrementa a quantidade
            $itemCarrinho->quantidade += 1;
            $itemCarrinho->save();
        } else {
            // Se não existir, cria um novo item com quantidade 1 e define o tipo do item
            ItensCarrinho::create([
                'lista_carrinho_id' => $listaCarrinho->id,
                'item_id' => $itemId,
                'tipo_item' => $tipoItem,  // Define se é um produto ou uma oferta
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

        // Itens do carrinho e produtos ou ofertas associados
        $itensCarrinho = $listaCarrinho
            ? ItensCarrinho::with(['produto', 'oferta'])->where('lista_carrinho_id', $listaCarrinho->id)->get()
            : collect();

            dd($itensCarrinho);

        // Inicialização dos totais
        $totalCarrinho = 0.00;
        $totalComTaxa = 0.00;
        $taxaEntrega = 5.0; // Taxa fixa de entrega

        // Produtos aleatórios para recomendação ou destaque
        $produtos = Produto::inRandomOrder()->take(7)->get();

        // Métodos de pagamento do usuário logado
        $metodosPagamentos = MetodoPagamento::where('user_id', $userId)->get();

        // Inicializamos a coleção vazia de cupons para evitar erros caso o carrinho esteja vazio ou não haja produtos
        $cupons = collect();

        if ($itensCarrinho->isNotEmpty()) {
            // Calcula o total do carrinho, considerando apenas produtos
            $totalCarrinho = $itensCarrinho->sum(function ($item) {
                return ($item->tipo_item == 'produto' ? $item->produto->preco : $item->oferta->preco) * $item->quantidade;
            });
            $totalComTaxa = $totalCarrinho + $taxaEntrega;

            // Filtramos apenas os itens do tipo produto para aplicar os cupons
            $produtosCarrinho = $itensCarrinho->filter(function ($item) {
                return $item->tipo_item === 'produto';
            });

            if ($produtosCarrinho->isNotEmpty()) {
                $cupons = Cupom::where(function ($query) use ($produtosCarrinho) {
                    foreach ($produtosCarrinho as $item) {
                        $produto = $item->produto;

                        // Obtemos os cupons com palavras-chave associadas e verificamos a descrição do produto
                        $cuponsComPalavras = Cupom::with('palavras')->get();
                        foreach ($cuponsComPalavras as $cupom) {
                            foreach ($cupom->palavras as $palavra) {
                                if (stripos($produto->descricao, $palavra->palavra_chave) !== false) {
                                    $query->orWhere('cupons.id', $cupom->id);
                                    break;
                                }
                            }
                        }

                        // Verificação de cupons pelas categorias
                        $query->orWhereHas('categorias', function ($q) use ($produto) {
                            $q->where('categoria_produto.id', $produto->categoria_produto_id);
                        });

                        // Verificação de cupons pelas subcategorias
                        $query->orWhereHas('subCategorias', function ($q) use ($produto) {
                            $q->where('sub_categoria.id', $produto->sub_categoria_produto_id);
                        });
                    }
                })->get();
            }
        }

        return view('carrinho', compact('produtos', 'metodosPagamentos', 'itensCarrinho', 'listaCarrinho', 'cupons', 'totalCarrinho', 'totalComTaxa', 'taxaEntrega'));
    }

    public function removeItem($itemId)
    {
        // Encontre o item no carrinho
        $itemCarrinho = ItensCarrinho::find($itemId);

        if ($itemCarrinho) {
            // Se a quantidade for maior que 1, diminua a quantidade
            if ($itemCarrinho->quantidade > 1) {
                $itemCarrinho->quantidade -= 1;
                $itemCarrinho->save();
            } else {
                // Se a quantidade for 1, remova o item
                $itemCarrinho->delete();
            }
        }

        return redirect()->route('lista.carrinho');  // Redireciona para a view do carrinho
    }

    // remove todos os itens da lista_carrinho do usuário
    public function clearCart()
    {
        $userId = auth()->id(); // Pega o ID do usuário autenticado

        // Busca a lista de carrinho do usuário
        $listaCarrinho = ListaCarrinho::where('user_id', $userId)->first();

        if ($listaCarrinho) {
            // Remove todos os itens do carrinho
            ItensCarrinho::where('lista_carrinho_id', $listaCarrinho->id)->delete();
        }

        return redirect()->route('lista.carrinho')->with('success', 'Carrinho limpo com sucesso!'); // Mensagem de sucesso
    }
}
