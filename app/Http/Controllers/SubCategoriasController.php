<?php

namespace App\Http\Controllers;

use App\Models\SubCategoria;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class SubCategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategorias = SubCategoria::all();
        return view('admin.adm.admSubCategorias.index', compact('subCategorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.adm.admSubCategorias.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Limite de 4 registros
        if (SubCategoria::count() >= 4) {
            return redirect()->back()->with('error', 'Não é possível adicionar mais de 4 registros.');
        }

        // Validação
        $request->validate([
            'titulo_sub_categoria' => 'required|string',
            // 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' garante que o arquivo enviado seja uma imagem nos formatos permitidos, com tamanho máximo de 2 MB.
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Verifica se uma imagem foi carregada
        if ($request->hasFile('imagem')) {
            // Armazena a imagem na pasta 'public/images'
            $imagemPath = $request->file('imagem')->store('images', 'public');

            // Cria o registro com o caminho da imagem
            SubCategoria::create([
                'titulo_sub_categoria' => $request->titulo_sub_categoria,
                'imagem' => $imagemPath, // Armazena o caminho da imagem
            ]);

            return redirect()->route('subCategorias.index')->with('sucesso', 'Sub-Categoria cadastrada com sucesso!');
        }

        return redirect()->back()->with('error', 'Erro ao carregar a imagem.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subCategoria = SubCategoria::findOrFail($id);
        return view('admin.adm.admSubCategorias.visualizar', compact('subCategoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subCategoria = SubCategoria::findOrFail($id);
        return view('admin.adm.admSubCategorias.editar', compact('subCategoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo_sub_categoria' => 'required',
            'imagem' => 'required'
        ]);

        $SubCategoria = SubCategoria::findOrFail($id);

        $SubCategoria->update([
            'titulo_sub_categoria' => $request->titulo_sub_categoria,
            'imagem' => $request->imagem
        ]);

        return redirect()->route('subCategorias.index')->with('sucesso', 'Sub-Categoria atualizado com sucesso!!!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $SubCategoria = SubCategoria::findOrFail($id);
            $SubCategoria->delete();
            return redirect()->route('subCategorias.index')->with('sucesso', 'Sub-Categoria deletada com sucesso!!!');
        } catch (\Exception $e) {

            return redirect()->route('admin.adm.admSubCategorias.index')->with('error', 'Erro ao deletar a sub-categoria');
        }
    }
}
