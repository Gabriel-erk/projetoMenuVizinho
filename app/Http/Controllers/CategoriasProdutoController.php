<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProduto;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CategoriasProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoriasProdutos = CategoriaProduto::all();
        return view('admin.adm.admCategorias.index', compact('categoriasProdutos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.adm.admCategorias.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // if (CategoriaProduto::count() >= 4) {
        //     return redirect()->back()->with('error', 'Não é possível adicionar mais de 4 registros.');
        // }

        $request->validate([
            'titulo_categoria' => 'required|string',
            'imagem' => 'required',
        ]);

        CategoriaProduto::create([
            'titulo_categoria' => $request->titulo_categoria,
            'imagem' => $request->imagem
        ]);

        return redirect()->route('categorias.index')->with('sucesso', 'Categoria cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoriaProduto = CategoriaProduto::findOrFail($id);
        return view('admin.adm.admCategorias.visualizar', compact('categoriaProduto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoriaProduto = CategoriaProduto::findOrFail($id);
        return view('admin.adm.admCategorias.editar', compact('categoriaProduto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo_categoria' => 'required',
            'imagem' => 'required'
        ]);

        $categoriaProduto = CategoriaProduto::findOrFail($id);

        $categoriaProduto->update([
            'titulo_categoria' => $request->titulo_categoria,
            'imagem' => $request->imagem
        ]);

        return redirect()->route('categorias.index')->with('sucesso', 'Usuário atualizado com sucesso!!!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $categoriaProduto = CategoriaProduto::findOrFail($id);
            $categoriaProduto->delete();
            return redirect()->route('categorias.index')->with('sucesso', 'Categoria deletada com sucesso!!!');
        } catch (\Exception $e) {

            return redirect()->route('admin.adm.admCategorias.index')->with('error', 'Erro ao deletar a categoria');
        }
    }
}