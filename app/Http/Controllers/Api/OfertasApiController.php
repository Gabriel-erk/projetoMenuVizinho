<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Oferta;
use Exception;
use Illuminate\Http\Request;

class OfertasApiController extends Controller
{
    public function index()
    {
        try {
            $produtos = Oferta::all();
            return response()->json($produtos, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao listar dados"], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $produto = Oferta::findOrFail($id);
            return response()->json($produto, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Oferta não encontrada"], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nome' => 'required|string|max:25',
            // numeric para substituir o decimal
            'preco' => 'required|numeric|min:0',
            'descricao' => 'required|string',
            'info_nutricional' => 'required|string',
            'duracao' => 'required|date',
        ]);

        try {
            // Verifica se uma imagem foi carregada
            if ($request->hasFile('imagem')) {
                $lojaId = 1;
                // Armazena a imagem na pasta 'public/imgLoja/Produtos'
                $imagemPath = $request->file('imagem')->store('imgLoja/ofertas', 'public');

                // Cria o registro com o caminho da imagem e categorias
                $oferta = Oferta::create([
                    'imagem' => $imagemPath, // Armazena o caminho da imagem
                    'nome' => $request->nome,
                    'preco' => $request->preco,
                    'descricao' => $request->descricao,
                    'info_nutricional' => $request->info_nutricional,
                    'duracao' => $request->duracao,
                    'loja_id' => $lojaId
                ]);

                return response()->json($oferta, 200);
            }

            return redirect()->back()->with('error', 'Erro ao carregar a imagem.');
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao criar Oferta"], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // ao atualizar posso querer manter a mesma img, caso não envie, fica a mesma
            'nome' => 'required|string|max:25',
            'preco' => 'required|numeric|min:0',
            'descricao' => 'required|string',
            'info_nutricional' => 'required|string',
            'duracao' => 'required|date',
        ]);

        try {
            $produto = Oferta::findOrFail($id);

            $produto->update([
                'imagem' => $request->hasFile('imagem') ? $request->file('imagem')->store('imgLoja/ofertas', 'public') : $produto->imagem,
                'nome' => $request->nome,
                'preco' => $request->preco,
                'descricao' => $request->descricao,
                'info_nutricional' => $request->info_nutricional,
                'duracao' => $request->duracao,
            ]);
            return response()->json($produto, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao atualizar oferta"], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $produto = Oferta::findOrFail($id);
            $produto->delete();
            return response()->json(["message" => "Oferta deletada com sucesso"], 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao deletar oferta"], 500);
        }
    }
}
