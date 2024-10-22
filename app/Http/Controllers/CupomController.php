<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cupom;
use App\Models\Loja;

class CupomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cupons = Cupom::all();
        return view('admin.adm.admCupons.index', compact('cupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.adm.admCupons.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome_cupom' => 'required|string',
            'descricao_cupom' => 'required|string',
            'data_expiracao' => 'required|date',
        ]);

        Cupom::create([
            'nome_cupom' => $request->nome_cupom,
            'descricao_cupom' => $request->descricao_cupom,
            'data_expiracao' => $request->data_expiracao,
            'loja_id' => 1
        ]);

        return redirect()->route('cupom.index')->with('sucesso', 'Cupom cadastrado com sucesso!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cupom = Cupom::findOrFail($id);
        return view('admin.adm.admCupons.visualizar', compact('cupom'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cupom = Cupom::findOrFail($id);
        return view('admin.adm.admCupons.editar', compact('cupom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome_cupom' => 'required|string',
            'descricao_cupom' => 'required|string',
            'data_expiracao' => 'required|date',
        ]);

        $cupom = Cupom::findOrFail($id);

        $cupom->update([
            'nome_cupom' => $request -> nome_cupom,
            'descricao_cupom' => $request -> descricao_cupom,
            'data_expiracao' => $request -> data_expiracao,
        ]);
        return redirect()->route('cupom.index')->with('sucesso', 'cupom atualizado com sucesso!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $cupom = Cupom::findOrFail($id);
            $cupom->delete();
            return redirect()->route('cupom.index')->with('sucesso', 'cupom deletado com sucesso!!!');
        } catch (\Exception $e) {

            return redirect()->route("cupom.index")->with('error', 'Erro ao deletar o cupom');
        }
    }

}
