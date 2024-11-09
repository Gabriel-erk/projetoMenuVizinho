<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\CategoriaProduto;
use Exception;
use Illuminate\Http\Request;

class CategoriaProdutoApiController extends Controller
{
    public function index()
    {
        $categoriasProdutos = CategoriaProduto::all();
        try {
            return response()->json($categoriasProdutos, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao listar dados"], 500);
        }
    }

    public function show(string $id)
    {
        try {
            // Busca a categoria com os produtos associados
            $categoriaProduto = CategoriaProduto::with('produtos')->findOrFail($id);

            // Conta o número de produtos associados
            $quantidadeProdutos = $categoriaProduto->produtos->count();

            // Retorna a categoria com a contagem e a lista de produtos associados
            return response()->json([
                // no json vai ter a chave categoria, trazendo todas as informações da categoria - porém também traz a chave produto em meio todas essas informações, onde, traz redundância e repetição ao código, onde eu talvez possa remover a chave 'produtos associados'
                'categoria' => $categoriaProduto,
                // no json vai ter a chave qntdProdutos, trazendo a qntd de produtos relacionados a aquela categoria
                'quantidadeProdutos' => $quantidadeProdutos,
                // e nessa chave traz todos os produtos vinculados a aquela categoria
                'produtosAssociados' => $categoriaProduto->produtos
            ], 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Categoria não encontrada"], 404);
        }
    }

    public function store(Request $request)
    {
        // Validação
        $request->validate([
            'titulo_categoria' => 'required|string',
            'descricao' => 'required|string'
        ]);

        try {
            $categoria = CategoriaProduto::create([
                'titulo_categoria' => $request->titulo_categoria,
                'descricao' => $request->descricao
            ]);
            return response()->json($categoria, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao criar categoria"], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo_categoria' => 'required',
            'descricao' => 'required'
        ]);
        try {
            $categoriaProduto = CategoriaProduto::findOrFail($id);

            $categoriaProduto->update([
                'titulo_categoria' => $request->titulo_categoria,
                'descricao' => $request->descricao,
            ]);

            return response()->json($categoriaProduto, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao atualizar categoria"], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $categoriaProduto = CategoriaProduto::findOrFail($id);
            $categoriaProduto->delete();
            return response()->json(["message" => "Categoria deletada com sucesso"], 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao deletar categoria"], 500);
        }
    }
}
