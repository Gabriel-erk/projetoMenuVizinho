<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\SubCategoria;
use Exception;
use Illuminate\Http\Request;

class SubCategoriasApiController extends Controller
{
    public function index()
    {
        $subCategorias = SubCategoria::all();
        try {
            return response()->json($subCategorias, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao listar dados"], 500);
        }
    }

    public function show(string $id)
    {
        try {
            // Busca a categoria com os produtos associados
            $subCategoria = SubCategoria::with('produtos')->findOrFail($id);

            // Conta o número de produtos associados
            $quantidadeProdutos = $subCategoria->produtos->count();

            // Retorna a categoria com a contagem e a lista de produtos associados
            return response()->json([
                'subCategoria' => $subCategoria,
                'quantidadeProdutos' => $quantidadeProdutos,
                'produtosAssociados' => $subCategoria->produtos
            ], 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "SubCategoria não encontrada"], 404);
        }
    }

    public function store(Request $request)
    {

        // Validação
        $request->validate([
            'titulo_sub_categoria' => 'required|string',
            'descricao' => 'required|string'
        ]);

        try {
            // Cria o registro com o caminho da imagem
            $subCategoria = SubCategoria::create([
                'titulo_sub_categoria' => $request->titulo_sub_categoria,
                'descricao' => $request->descricao
            ]);

            return response()->json($subCategoria, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao criar sub-categoria"], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo_sub_categoria' => 'required',
            'descricao' => 'required',
        ]);
        try {
            $SubCategoria = SubCategoria::findOrFail($id);

            $SubCategoria->update([
                'titulo_sub_categoria' => $request->titulo_sub_categoria,
                'descricao' => $request->descricao,
            ]);

            return response()->json($SubCategoria, 200);
        } catch (Exception $th) {
            return response()->json(["Erro" => "Erro ao atualizar SubCategoria"], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $SubCategoria = SubCategoria::findOrFail($id);
            $SubCategoria->delete();
            return response()->json(["message" => "Sub Categoria deletada com sucesso"], 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao deletar Sub Categoria"], 500);
        }
    }
}
