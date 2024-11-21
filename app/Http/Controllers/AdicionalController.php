<?php

namespace App\Http\Controllers;

use App\Models\Adicional;
use App\Models\CategoriaProduto;
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
}
