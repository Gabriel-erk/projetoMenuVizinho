<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Exception;
use Illuminate\Http\Request;

class BannerApiController extends Controller
{
    public function index()
    {
        try {
            $banners = Banner::all();
            return response()->json([$banners], 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao listar dados"], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $banner = Banner::findOrFail($id);
            return response()->json($banner, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Banner não encontrado"], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            // valida o campo imagens da view com '.*' para indicar que pode receber multiplos arquivos
            'imagens.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validação para cada imagem
            'titulo' => 'required|string|max:20',
            'categoria' => 'required|in:cardapio,ofertas',
        ]);

        try {
            if ($request->hasFile('imagens')) {
                $lojaId = 1; // Pode ser dinâmico dependendo do caso

                // trata cada imagem que foi passada corretamente, percorre o array de imagens e cria uma de cada vez
                foreach ($request->file('imagens') as $imagem) {
                    $bannerPath = $imagem->store('imgLoja/banners', 'public');

                    $banner = Banner::create([
                        'loja_id' => $lojaId,
                        'imagem' => $bannerPath,
                        'titulo' => $request->titulo,
                        'categoria' => $request->categoria,
                    ]);
                }

                return response()->json($banner, 200);
            }

            // return redirect()->back()->with('error', 'Erro ao carregar as imagens.');
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao criar banner"], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:25',
            'categoria' => 'required|in:cardapio,ofertas',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $banner = Banner::findOrFail($id);

            $banner->update([
                // se o campo imagem tiver uma imagem, substitui a atual e armazena em imgLoja/banners, se não, o banner fica com a mesma imagem ($banner->imagem, que será passado para o atributo 'imagem' da váriavel que chamou o update)
                'imagem' => $request->hasFile('imagem') ? $request->file('imagem')->store('imgLoja/banners', 'public') : $banner->imagem,
                // se tiver alguma categoria, recebe ela, se não, fica com a que já estava, lógica é a mesma do comentario de imagem
                'categoria' => $request->categoria ? $request->categoria : $banner->categoria,
                'titulo' => $request->titulo
            ]);

            return response()->json($banner, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao atualizar banner"], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $banner = Banner::findOrFail($id);
            $banner->delete();
            return response()->json(["message" => "Banner deletado com sucesso"], 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao deletar banner"], 500);
        }
    }
}
