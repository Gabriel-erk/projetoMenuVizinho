<?php

namespace App\Http\Controllers;

use App\Models\Adicional;
use App\Models\CarrinhoProdutoAdicional;
use App\Models\CategoriaProduto;
use App\Models\ItensCarrinho;
use App\Models\ListaCarrinho;
use App\Models\Produto;
use App\Models\ProdutoAdicional;
use App\Models\SubCategoria;
use Exception;
use Illuminate\Http\Request;

class AdicionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adicionais = Adicional::all();

        return view('admin.adm.admAdicionais.index', compact('adicionais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = CategoriaProduto::all();
        $subCategorias = SubCategoria::all();

        return view('admin.adm.admAdicionais.cadastro', compact('categorias', 'subCategorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
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

        Adicional::create([
            'nome' => $request->nome,
            'valor' => $request->valor,
            // um dos dois deve estar preenchido, se não retorna um erro por conta do model 
            'categoria_produto_id' => $request->categoria_produto_id,
            'sub_categoria_produto_id' => $request->sub_categoria_produto_id,
        ]);

        return redirect()->route('adicional.index')->with('sucesso', 'Adicional cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $adicional = Adicional::findOrFail($id);

        return view('admin.adm.admAdicionais.visualizar', compact('adicional'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $adicional = Adicional::findOrFail($id);
        $categorias = CategoriaProduto::all();
        $subCategorias = SubCategoria::all();

        return view('admin.adm.admAdicionais.editar', compact('adicional', 'categorias', 'subCategorias'));
    }

    /**
     * Update the specified resource in storage.
     */
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

        $adicional = Adicional::findOrFail($id);

        $adicional->update([
            'nome' => $request->nome,
            'valor' => $request->valor,
            // um dos dois deve estar preenchido, se não retorna um erro por conta do model 
            'categoria_produto_id' => $request->categoria_produto_id,
            'sub_categoria_produto_id' => $request->sub_categoria_produto_id,
        ]);

        return redirect()->route('adicional.index')->with('sucesso', 'Adicional atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $adicional = Adicional::findOrFail($id);
            $adicional->delete();
            return redirect()->route('adicional.index')->with('sucesso', 'Adicional deletado com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('adicional.index')->with('error', 'Erro ao deletar Adicional');
        }
    }

    public function addAdicional($produtoId, $tipoItem, $adicionalId)
    {
        $userId = auth()->id();
        // se não encontrar a lista carrinho dele joga um erro, utilizar a cláusula where permite aplicar filtros de retorno, neste caso quero o registro que tiver a coluna 'user_id' igual ao do usuário logado no momento, ou retorne uma exceção caso não encontre (caso use como antes, somente firstOrFail, ele irá me retornar somente a coluna 'user_id' e me retornar o novamente o erro 'column not found')
        $listaCarrinho = ListaCarrinho::where('user_id', $userId)->firstOrFail();

        // verifica se o produto já esta na lista
        $itemCarrinho = ItensCarrinho::where('lista_carrinho_id', $listaCarrinho->id)->where('item_id', $produtoId)->where('tipo_item', $tipoItem)->first();

        if (!$itemCarrinho) {
            // caso não esteja no carrinho, lança um erro
            // redireciona de volta para a mesma view passando a msg de erro q coloquei
            return redirect()->back()->with('error', 'Adicione o produto ao carrinho primeiro!');
        }

        // se chegar até aqui, é pq o item está no carrinho
        // verifica se o adicional já esta vinculado ao item no carrinho
        $carrinhoProdutoAdicional = CarrinhoProdutoAdicional::where('item_carrinho_id', $itemCarrinho->id)->where('adicional_id', $adicionalId)->first();

        if ($carrinhoProdutoAdicional) {
            // incrementa a quantidade se já existir (se já estiver vinculado ao item do carrinho)
            $carrinhoProdutoAdicional->increment('quantidade', 1);
        } else {
            // cria o vínculo do adicional com o item do carrinho
            CarrinhoProdutoAdicional::create([
                'item_carrinho_id' => $itemCarrinho->id,
                'adicional_id' => $adicionalId,
                'quantidade' => 1
            ]);
        }

        // redireciona de volta para a mesma view passando a msg de sucesso (que vai mostrar em um alert a msg que to passando)
        return redirect()->back()->with('sucesso', 'Adicional incluído com sucesso!');
    }
}
