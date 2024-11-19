<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Cupom;
use App\Models\ItensCarrinho;
use App\Models\ListaCarrinho;
use App\Models\MetodoPagamento;
use App\Models\Produto;
use Exception;
use Illuminate\Http\Request;

class ListaCarrinhoApiController extends Controller
{
    public function admIndex()
    {
        try {
            $listas = ListaCarrinho::all();
            return response()->json([$listas], 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao listar dados"]);
        }
    }

    public function show(string $id)
    {
        try {
            $lista = ListaCarrinho::findOrFail($id);
            return response()->json($lista, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao encontrar lista"]);
        }
    }

    // era a view carrinho, e transcrevi para api, verificar se preciso fazer mais algo, ou é só passar essas info do jeito q tá mesmo
    public function index(string $id)
    {
        try {
            $userId = $id;

            // Busca a lista de carrinho do usuário
            $listaCarrinho = ListaCarrinho::where('user_id', $userId)->first();

            // Itens do carrinho e produtos ou ofertas associados
            $itensCarrinho = $listaCarrinho
                ? ItensCarrinho::with(['produto', 'oferta'])->where('lista_carrinho_id', $listaCarrinho->id)->get()
                : collect();
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
            return response()->json([$produtos, $metodosPagamentos, $itensCarrinho, $listaCarrinho, $cupons, $totalCarrinho, $totalComTaxa, $taxaEntrega], 200);
            // return view('carrinho', compact('produtos', 'metodosPagamentos', 'itensCarrinho', 'listaCarrinho', 'cupons', 'totalCarrinho', 'totalComTaxa', 'taxaEntrega'));
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao listar dados",
        "Mensagem" => $e->getMessage(),]);
        }
    }
}
