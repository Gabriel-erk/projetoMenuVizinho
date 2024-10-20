<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use Illuminate\Http\Request;

class LojaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loja = Loja::findOrFail(1);
        return view('admin.adm.admLoja.index', compact('loja'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.adm.admLoja.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'nome_loja' => 'required|string|max:25',
            'logotipo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'texto_sobre_restaurante' => 'required|string',
            'imagem_sobre_restaurante' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'texto_politica_privacidade' => 'required|string',
        ]);

        // Verifica se os arquivos de imagem foram enviados e armazena as imagens
        if ($request->hasFile('logotipo')) {
            $logotipoPath = $request->file('logotipo')->store('images', 'public');
        }

        if ($request->hasFile('imagem_sobre_restaurante')) {
            $imgSobrePath = $request->file('imagem_sobre_restaurante')->store('img', 'public');
        }

        // Cria o registro da loja com os dados fornecidos
        Loja::create([
            'nome_loja' => $request->nome_loja,
            'logotipo' => $logotipoPath ?? null, // Verifica se o arquivo foi armazenado
            'texto_sobre_restaurante' => $request->texto_sobre_restaurante,
            'imagem_sobre_restaurante' => $imgSobrePath ?? null, // Verifica se o arquivo foi armazenado
            'texto_politica_privacidade' => $request->texto_politica_privacidade,
        ]);

        return redirect()->route('loja.index')->with('sucesso', 'Loja cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $loja = Loja::findOrFail(1);
        return view('admin.adm.admLoja.visualizar', compact('loja'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $loja = Loja::findOrFail(1);
        return view('admin.adm.admLoja.editar', compact('loja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id = 1)
    {
        // Validação dos campos de loja
        $request->validate([
            'nome_loja' => 'required|string|max:25',
            'logotipo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 'nullable' permite que a imagem seja opcional
            'texto_sobre_restaurante' => 'required|string',
            'imagem_sobre_restaurante' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 'nullable' para imagem opcional, pois o dono pode querer simplesmente manter a mesma img
            'texto_politica_privacidade' => 'required|string',
        ]);

        // Encontrar a loja pelo ID
        $loja = Loja::findOrFail($id);

        // Atualização dos dados da loja
        $loja->update([
            'nome_loja' => $request->nome_loja,
            'logotipo' => $request->hasFile('logotipo')
                ? $request->file('logotipo')->store('logos', 'public') // Se tiver imagem, armazena
                : $loja->logotipo, // Caso contrário, manter a imagem existente
            'texto_sobre_restaurante' => $request->texto_sobre_restaurante,
            'imagem_sobre_restaurante' => $request->hasFile('imagem_sobre_restaurante')
                ? $request->file('imagem_sobre_restaurante')->store('img', 'public') // Salvar nova imagem se enviada
                : $loja->imagem_sobre_restaurante, // Caso contrário, manter a imagem existente
            'texto_politica_privacidade' => $request->texto_politica_privacidade,
        ]);

        return redirect()->route('loja.index', $id)->with('sucesso', 'Loja atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        try {
            $loja = Loja::findOrFail(1);
            $loja->delete();
            return redirect()->route('loja.index')->with('sucesso', 'loja deletada com sucesso!!!');
        } catch (\Exception $e) {

            return redirect()->route('admin.adm.admloja.index')->with('error', 'Erro ao deletar o loja');
        }
    }
}
