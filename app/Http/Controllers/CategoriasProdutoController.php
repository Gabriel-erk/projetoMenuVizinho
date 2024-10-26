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
        // Limite de 4 registros
        if (CategoriaProduto::count() >= 4) {
            return redirect()->back()->with('error', 'Não é possível adicionar mais de 4 registros.');
        }

        // Validação
        $request->validate([
            'titulo_categoria' => 'required|string',
            'descricao' => 'required|string'
        ]);

        // Cria o registro com o caminho da imagem
        CategoriaProduto::create([
            'titulo_categoria' => $request->titulo_categoria,
            'descricao' => $request->descricao
        ]);

        return redirect()->route('categorias.index')->with('sucesso', 'Categoria cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoriaProduto = CategoriaProduto::findOrFail($id);
        // pega todos os produtos associados a uma categoria
        $produtosAssociados = CategoriaProduto::with('produtos')->find($id);
        // é atribuido a quantidade de produtos da categoria encontrada
        $quantidadeProdutos = $produtosAssociados->produtos->count();
        return view('admin.adm.admCategorias.visualizar', compact('categoriaProduto', 'quantidadeProdutos'));
    }

    public function produtos($id)
    {
        $categoria = CategoriaProduto::with('produtos')->findOrFail($id);
        $produtos = $categoria->produtos;

        return view('admin.adm.admCategorias.produtos', compact('categoria', 'produtos'));
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
            'imagem' => 'required',
            'titulo_categoria' => 'required',
            'descricao' => 'required'
        ]);

        $categoriaProduto = CategoriaProduto::findOrFail($id);

        $categoriaProduto->update([
            'imagem' => $request->imagem,
            'titulo_categoria' => $request->titulo_categoria,
            'descricao' => $request->descricao,
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
