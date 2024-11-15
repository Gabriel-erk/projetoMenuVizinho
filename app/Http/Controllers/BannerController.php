<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.adm.admBanners.index', compact('banners'));
    }

    public function show(string $id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.adm.admBanners.visualizar', compact('banner'));
    }

    public function create()
    {
        return view('admin.adm.admBanners.cadastro');
    }

    public function store(Request $request)
    {
        $request->validate([
            // valida o campo imagens da view com '.*' para indicar que pode receber multiplos arquivos
            'imagens.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validação para cada imagem
            'titulo' => 'required|string|max:20',
            'categoria' => 'required|in:cardapio,ofertas',
        ]);

        if ($request->hasFile('imagens')) {
            $lojaId = 1; // Pode ser dinâmico dependendo do caso

            // trata cada imagem que foi passada corretamente, percorre o array de imagens e cria uma de cada vez
            foreach ($request->file('imagens') as $imagem) {
                $bannerPath = $imagem->store('imgLoja/banners', 'public');

                Banner::create([
                    'loja_id' => $lojaId,
                    'imagem' => $bannerPath,
                    'titulo' => $request->titulo,
                    'categoria' => $request->categoria,
                ]);
            }

            return redirect()->route('banners.index')->with('sucesso', 'Banners cadastrados com sucesso!');
        }

        return redirect()->back()->with('error', 'Erro ao carregar as imagens.');
    }


    public function edit(string $id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.adm.admBanners.editar', compact('banner'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:25',
            'categoria' => 'required|in:cardapio,ofertas',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $banner = Banner::findOrFail($id);

        $banner->update([
            // se o campo imagem tiver uma imagem, substitui a atual e armazena em imgLoja/banners, se não, o banner fica com a mesma imagem ($banner->imagem, que será passado para o atributo 'imagem' da váriavel que chamou o update)
            'imagem' => $request->hasFile('imagem') ? $request->file('imagem')->store('imgLoja/banners', 'public') : $banner->imagem,
            // se tiver alguma categoria, recebe ela, se não, fica com a que já estava, lógica é a mesma do comentario de imagem
            'categoria' => $request->categoria ? $request->categoria : $banner->categoria,
            'titulo' => $request->titulo
        ]);

        return redirect()->route('banners.index')->with('sucesso', 'Banner atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        try {
            $banner = Banner::findOrFail($id);
            $banner->delete();
            return redirect()->route('banners.index')->with('sucesso', 'Banner deletado com sucesso!!!');
        } catch (Exception $e) {
            return redirect()->route('banners.index')->with('error', 'Erro ao deletar banner');
        }
    }
}
