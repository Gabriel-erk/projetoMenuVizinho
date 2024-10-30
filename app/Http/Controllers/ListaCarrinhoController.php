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

        // Itens do carrinho e produtos associados
        $itensCarrinho = $listaCarrinho
            ? ItensCarrinho::with('produto')->where('lista_carrinho_id', $listaCarrinho->id)->get()
            : collect();

        // Produtos aleatórios para recomendação ou destaque
        $produtos = Produto::inRandomOrder()->take(7)->get();

        // Métodos de pagamento do usuário logado
        $metodosPagamentos = MetodoPagamento::where('user_id', $userId)->get();

        // Consulta cupons aplicáveis aos produtos no carrinho
        $cupons = collect(); // Definimos como vazio inicialmente para evitar erros, criando uma coleção vazia chamada cupons, oq evita erros ao tentar operar uma coleção vazia depois
        if ($itensCarrinho->isNotEmpty()) { // a váriavel itensCarrinho tem que estar preenchida para encontrar (ou seja, tem q ter algum produto no carrinho para chamar o que está dentro do if, pois não faz sentido tentar verificar se tem cupom sem ter  um produto no carrinho)
            // inicia uma consulta na tabela Cupom (modelo cupom), com u,a função anônima closure, para adicionar condições a consulta (no caso, use ($itensCarrinho)), onde a váriavel $query representa a consulta que será construida
            // use ($itensCarrinho) permite a váriavel $itensCarrinho estar acessivel dentro da func anônima
            $cupons = Cupom::where(function ($query) use ($itensCarrinho) {
                // acessa cada item no carrinho 
                foreach ($itensCarrinho as $item) {
                    // pega o produto associado ao item
                    $produto = $item->produto;

                    // Obtém as palavras-chave associadas aos cupons
                    // Carrega todos os cupons junto com suas palavras-chave associadas - cham o metodo palavras no model Cupom
                    $cuponsComPalavras = Cupom::with('palavras')->get();

                    // percorre o array e lança cada um em uma váriavel cupom
                    foreach ($cuponsComPalavras as $cupom) {
                        // percorre o as palavras do cupom e joga na váriavel palavra (ou seja, encontra todas as palavras chave dos cupons, 1 por 1)
                        foreach ($cupom->palavras as $palavra) {
                            // Verifica se a palavra-chave está presente na descrição do produto, independente de letras minúsculas e maiúsculas
                            if (stripos($produto->descricao, $palavra->palavra_chave) !== false) {
                                // Se a palavra-chave for encontrada na descrição, o cupom correspondente é adicionado à consulta.
                                $query->orWhere('cupons.id', $cupom->id);
                                break; // Encerra o loop ao encontrar uma correspondência
                            }
                        }
                    } // O resultado final é uma coleção de cupons que se aplicam aos produtos no carrinho, considerando as palavras-chave na descrição, além das verificações de categorias e subcategorias.

                    // Verifica cupons pelas categorias
                    // Adiciona uma condição à consulta que verifica se o cupom está associado à mesma categoria que o produto. Isso permite que os cupons que são válidos para produtos em uma categoria específica sejam retornados.
                    // $produto->categoria_produto_id: Utiliza o ID da categoria do produto para fazer a comparação.
                    $query->orWhereHas('categorias', function ($q) use ($produto) {
                        $q->where('categoria_produto.id', $produto->categoria_produto_id);
                    });

                    // Verifica cupons pelas subcategorias
                    // Similar à verificação de categorias, esta linha adiciona uma condição que verifica se o cupom está associado à subcategoria do produto. Isso garante que cupons que são válidos para produtos em uma subcategoria específica também sejam incluídos.
                    // $produto->sub_categoria_produto_id: Utiliza o ID da subcategoria do produto para a comparação.
                    $query->orWhereHas('subCategorias', function ($q) use ($produto) {
                        $q->where('sub_categoria.id', $produto->sub_categoria_produto_id);
                    });
                }
            })->get(); // Finaliza a consulta e executa o get() para obter os cupons que atendem às condições definidas na função anônima. O resultado é armazenado na variável $cupons. - pega o retorno da consulta feito pela função anônima em: Cupom::where(function ($query) use ($itensCarrinho) {
        }

        return view('carrinho', compact('produtos', 'metodosPagamentos', 'itensCarrinho', 'listaCarrinho', 'cupons'));
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
