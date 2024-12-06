<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Adicional;
use Exception;
use Illuminate\Http\Request;

class AdicionalApiController extends Controller
{
    public function index()
    {
        try {
            $adicionais = Adicional::all();

            return response()->json([$adicionais], 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao carregar dados"], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $adicional = Adicional::findOrFail($id);

            return response()->json($adicional, 200);
        } catch (\Throwable $th) {
            return response()->json(["Erro" => "Erro ao carregar dados"], 500);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            // numeric para substituir o decimal
            'valor' => 'required|numeric|min:0',
            // exists:tablela (categoria_produto), campo(id)
            'categoria_produto_id' => 'nullable|exists:categoria_produto,id',
            'sub_categoria_produto_id' => 'nullable|exists:sub_categoria,id',
        ]);

        try {
            Adicional::create([
                'nome' => $request->nome,
                'valor' => $request->valor,
                // um dos dois deve estar preenchido, se não retorna um erro por conta do model 
                'categoria_produto_id' => $request->categoria_produto_id,
                'sub_categoria_produto_id' => $request->sub_categoria_produto_id,
            ]);

            return response()->json(["message" => "Adicional criado com sucesso"], 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao criar adicional"], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|string',
            // numeric para substituir o decimal
            'valor' => 'required|numeric|min:0',
            // exists:tablela (categoria_produto), campo(id)
            'categoria_produto_id' => 'nullable|exists:categoria_produto,id',
            'sub_categoria_produto_id' => 'nullable|exists:sub_categoria,id',
        ]);

        try {
            $adicional = Adicional::findOrFail($id);

            $adicional->update([
                'nome' => $request->nome,
                'valor' => $request->valor,
                // um dos dois deve estar preenchido, se não retorna um erro por conta do model 
                'categoria_produto_id' => $request->categoria_produto_id,
                'sub_categoria_produto_id' => $request->sub_categoria_produto_id,
            ]);

            return response()->json($adicional, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao atualizar usuário"], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $adicional = Adicional::findOrFail($id);
            $adicional->delete();
            return response()->json([["message" => "Adicional deletado com sucesso"], 200], 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao deletar usuário"], 500);
        }
    }
}
