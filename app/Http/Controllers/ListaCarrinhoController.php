<?php

namespace App\Http\Controllers;

use App\Models\AdicionaisVenda;
use App\Models\Cupom;
use App\Models\ItensCarrinho;
use App\Models\ItensVenda;
use App\Models\ListaCarrinho;

use App\Models\Produto;
use App\Models\MetodoPagamento;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        if (session('from_showProduct_product_area')) {
            // Se veio da view produto, redireciona para o para a mesma view com a msg
            session()->forget('from_showProduct_product_area'); // Limpa a sessão
            return redirect()->back()->with('sucesso', 'Produto adicionado ao carrinho com sucesso!');
        } else if (session('from_showProduct_productOffer_area')) {
            // Se veio da view produtoOferta, redireciona para o para a mesma view com a msg
            session()->forget('from_showProduct_productOffer_area'); // Limpa a sessão
            return redirect()->back()->with('sucesso', 'Oferta adicionada ao carrinho com sucesso!');
        } else if (session('from_Offer_area') || session('from_Menu_area')) {
            session()->forget('from_Offer_area');
            session()->forget('from_Menu_area');
            return redirect()->route('lista.carrinho');
        } 

        return response()->json([
            'success' => true,
            'redirect' => route('lista.carrinho') // URL para redirecionar
        ]);  // Redireciona para a view do carrinho
    }

    public function index2()
    {
        $userId = auth()->id();

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

        return view('carrinho', compact('produtos', 'metodosPagamentos', 'itensCarrinho', 'listaCarrinho', 'cupons', 'totalCarrinho', 'totalComTaxa', 'taxaEntrega'));
    }

    public function index()
    {
        $userId = auth()->id();

        // Busca a lista de carrinho do usuário
        $listaCarrinho = ListaCarrinho::where('user_id', $userId)->first();

        // Itens do carrinho e seus relacionamentos (produto, oferta e adicionais) 
        // incluindo relacionamento com a tabela adicionais, trazendo os itens e seus adicionais relacionados entre si
        $itensCarrinho = $listaCarrinho
            ? ItensCarrinho::with([
                'produto',
                'oferta',
                'carrinhoProdutoAdicionais.adicional'
            ])->where('lista_carrinho_id', $listaCarrinho->id)->get()
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
            // Calcula o total do carrinho, considerando produtos, ofertas e adicionais
            $totalCarrinho = $itensCarrinho->sum(function ($item) {
                $itemTotal = ($item->tipo_item == 'produto' ? $item->produto->preco : $item->oferta->preco) * $item->quantidade;

                // Soma os preços dos adicionais associados
                if ($item->carrinhoProdutoAdicionais->isNotEmpty()) {
                    $adicionalTotal = $item->carrinhoProdutoAdicionais->sum(function ($adicional) {
                        return $adicional->adicional->valor * $adicional->quantidade;
                    });
                    $itemTotal += $adicionalTotal;
                }

                return $itemTotal;
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

        return view('carrinho', compact(
            'produtos',
            'metodosPagamentos',
            'itensCarrinho',
            'listaCarrinho',
            'cupons',
            'totalCarrinho',
            'totalComTaxa',
            'taxaEntrega'
        ));
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

        return response()->json([
            'success' => true,
            'redirect' => route('lista.carrinho') // URL para redirecionar
        ]);
    }

    public function limparCarrinho()
    {
        $userId = auth()->id();

        // Busca a lista de carrinho do usuário
        $listaCarrinho = ListaCarrinho::where('user_id', $userId)->first();

        if ($listaCarrinho) {
            // Apaga os itens relacionados ao carrinho
            ItensCarrinho::where('lista_carrinho_id', $listaCarrinho->id)->delete();

            return redirect()->back();

            // caso queira passar a mensagem
            // return redirect()->back()->with('sucesso', 'Carrinho limpo com sucesso!');
        }
    }

    public function finalizarCompra(Request $request)
    {
        $userId = auth()->id();
        $listaCarrinho = ListaCarrinho::where('user_id', $userId)->first();

        DB::beginTransaction();

        try {
            $itensCarrinho = ItensCarrinho::with(['produto', 'oferta', 'carrinhoProdutoAdicionais.adicional'])->where('lista_carrinho_id', $listaCarrinho->id)->get();

            $frete = 5.0;
            $total = 0;
            // calcula o total da compra
            foreach ($itensCarrinho as $item) {

                $precoItem = $item->tipo_item === 'produto' ? $item->produto->preco : $item->oferta->preco;
                $total += $precoItem * $item->quantidade;

                // somando o valor dos adicionais no carrinho ao total da compra (juntamente dos itens)
                foreach ($item->carrinhoProdutoAdicionais as $adicional) {
                    $total += $adicional->adicional->valor * $item->quantidade;
                }
            }

            $totalComFrete = $total + $frete;

            // pegando o id do primeiro metódo de pagamenteo do usuário
            $metodoPagamentoId = MetodoPagamento::where('user_id', $userId)->value('id');

            $venda = Venda::create([
                'user_id' => $userId,
                'total' => $totalComFrete,
                'frete' => $frete,
                'cupom_id' => $request->cupom_id ?? null,
                'metodo_pagamento_id' => $metodoPagamentoId
            ]);

            foreach ($itensCarrinho as $item) {
                $itemVenda = ItensVenda::create([
                    'venda_id' => $venda->id,
                    'item_id' => $item->item_id,
                    'tipo_item' => $item->tipo_item,
                    'produto_id' => $item->produto_id,
                    'quantidade' => $item->quantidade,
                    'preco' => $item->tipo_item === 'produto' ? $item->produto->preco : $item->oferta->preco,
                ]);

                // 3. Transfira os adicionais relacionados
                foreach ($item->carrinhoProdutoAdicionais as $adicional) {
                    AdicionaisVenda::create([
                        'item_venda_id' => $itemVenda->id,
                        'adicional_id' => $adicional->id,
                        'valor' => $adicional->adicional->valor,
                        'quantidade' => $adicional->quantidade
                    ]);
                }
            }
            ItensCarrinho::where('lista_carrinho_id', $userId)->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Compra realizada com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
