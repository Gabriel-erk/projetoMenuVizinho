<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use Illuminate\Http\Request;

class OfertasController extends Controller
{
    public function viewIndex()
    {
        $produtos = Oferta::all();
        return view('ofertas', compact('produtos'));
    }

    public function produto(string $id)
    {
        $produto = Oferta::findOrFail($id);
        return view('produto', compact('produto'));
    }

    // área administrativa
    public function index()
    {
        $produtos = Oferta::all();
        return view('admin.adm.admOfertas.index', compact('produtos'));
    }

    public function show(string $id)
    {
        $produto = Oferta::findOrFail($id);
        return view('admin.adm.admOfertas.visualizar', compact('produto'));
    }

    public function create()
    {
        return view('admin.adm.admOfertas.cadastro');
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

        // Verifica se uma imagem foi carregada
        if ($request->hasFile('imagem')) {
            $lojaId = 1;
            // Armazena a imagem na pasta 'public/imgLoja/Produtos'
            $imagemPath = $request->file('imagem')->store('imgLoja/ofertas', 'public');

            // Cria o registro com o caminho da imagem e categorias
            Oferta::create([
                'imagem' => $imagemPath, // Armazena o caminho da imagem
                'nome' => $request->nome,
                'preco' => $request->preco,
                'descricao' => $request->descricao,
                'info_nutricional' => $request->info_nutricional,
                'duracao' => $request->duracao,
                'loja_id' => $lojaId
            ]);

            return redirect()->route('ofertas.index')->with('sucesso', 'Oferta cadastrada com sucesso!');
        }

        return redirect()->back()->with('error', 'Erro ao carregar a imagem.');
    }

    public function edit(string $id)
    {
        $produto = Oferta::findOrFail($id);
        return view('admin.adm.admOfertas.editar', compact('produto'));
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

        $produto = Oferta::findOrFail($id);

        $produto->update([
            'imagem' => $request->hasFile('imagem') ? $request->file('imagem')->store('imgLoja/ofertas', 'public') : $produto->imagem,
            'nome' => $request->nome,
            'preco' => $request->preco,
            'descricao' => $request->descricao,
            'info_nutricional' => $request->info_nutricional,
            'duracao' => $request->duracao,
        ]);
        return redirect()->route('ofertas.index')->with('sucesso', 'Oferta atualizada com sucesso!!!');
    }

    public function destroy(string $id)
    {
        try {
            $produto = Oferta::findOrFail($id);
            $produto->delete();
            return redirect()->route('ofertas.index')->with('sucesso', 'Oferta deletada com sucesso!!!');
        } catch (\Exception $e) {

            return redirect()->route('admin.adm.admOfertas.index')->with('error', 'Erro ao deletar a oferta');
        }
    }

    public function removerOfertasExpiradas()
    {
        $ofertasExpiradas = Oferta::where('duracao', '<', now())->get();

        foreach ($ofertasExpiradas as $oferta) {
            $oferta->delete();
        }
    }
}
