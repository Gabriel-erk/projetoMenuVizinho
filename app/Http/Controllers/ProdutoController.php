<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\CategoriaProduto;
use App\Models\SubCategoria;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('admin.adm.admProdutos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = CategoriaProduto::all();
        $subCategorias = SubCategoria::all();
        $produtos = Produto::all();
        return view('admin.adm.admProdutos.cadastro', compact('categorias', 'subCategorias', 'produtos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nome' => 'required|string|max:25',
            // numeric para substituir o decimal
            'preco' => 'required|numeric|min:0',
            'descricao' => 'required|string',
            'info_nutricional' => 'required|string',
            'categoria_produto_id' => 'nullable|exists:categoria_produto,id', // Validar categoria, exists:categoria_produto,id: Verifica se o valor fornecido para categoria_produto_id existe na coluna id da tabela categoria_produto
            'sub_categoria_produto_id' => 'nullable|exists:sub_categoria,id', // Validar subcategoria (opcional)
        ]);

        // Verifica se uma imagem foi carregada
        if ($request->hasFile('imagem')) {
            $lojaId = 1;
            // Armazena a imagem na pasta 'public/images'
            $imagemPath = $request->file('imagem')->store('imgLoja/produtos', 'public');

            // Cria o registro com o caminho da imagem e categorias
            Produto::create([
                'imagem' => $imagemPath, // Armazena o caminho da imagem
                'nome' => $request->nome,
                'preco' => $request->preco,
                'descricao' => $request->descricao,
                'info_nutricional' => $request->info_nutricional,
                'categoria_produto_id' => $request->categoria_produto_id, // Categoria obrigatória
                'sub_categoria_produto_id' => $request->sub_categoria_produto_id, // Subcategoria opcional
                'loja_id' => $lojaId
            ]);

            return redirect()->route('produtos.index')->with('sucesso', 'Produto cadastrado com sucesso!');
        }

        return redirect()->back()->with('error', 'Erro ao carregar a imagem.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Produto::findOrFail($id);
        return view('admin.adm.admProdutos.visualizar', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto = Produto::findOrFail($id);
        // passando todas categorias/sub para caso queira trocar
        $categorias = CategoriaProduto::all();
        $subCategorias = SubCategoria::all();
        return view('admin.adm.admProdutos.editar', compact('produto', 'categorias', 'subCategorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // ao atualizar posso querer manter a mesma img, caso não envie, fica a mesma
            'nome' => 'required|string|max:25',
            'preco' => 'required|numeric|min:0',
            'descricao' => 'required|string',
            'info_nutricional' => 'required|string',
            'categoria_produto_id' => 'nullable|exists:categoria_produto,id', 
            'sub_categoria_produto_id' => 'nullable|exists:sub_categoria,id', 
        ]);

        $produto = Produto::findOrFail($id);

        $produto->update([
            'imagem' => $request ->hasFile('imagem') ? $request->file('imagem')->store('imgLoja/produtos', 'public') : $produto->imagem,
            'nome' => $request -> nome,
            'preco' => $request -> preco,
            'descricao' => $request -> descricao,
            'info_nutricional' => $request -> info_nutricional,
            'categoria_produto_id' => $request -> categoria_produto_id,
            'sub_categoria_produto_id' => $request -> sub_categoria_produto_id,
        ]);
        return redirect()->route('produtos.index')->with('sucesso', 'Produto atualizado com sucesso!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $produto = Produto::findOrFail($id);
            $produto->delete();
            return redirect()->route('produtos.index')->with('sucesso', 'Produto deletada com sucesso!!!');
        } catch (\Exception $e) {

            return redirect()->route('admin.adm.admProdutos.index')->with('error', 'Erro ao deletar o produto');
        }
    }
}
