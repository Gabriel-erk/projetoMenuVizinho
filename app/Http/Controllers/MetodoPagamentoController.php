<?php

namespace App\Http\Controllers;

use App\Models\MetodoPagamento;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MetodoPagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $metodosPagamentos = MetodoPagamento::all();
        return view('admin.usuarios.gerenciarPagamentos', compact('metodosPagamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.usuarios.adicionarPagamento');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'numeroCartao' => 'required|string',
            'cvv' => 'required|integer',
            'dataVencimento' => 'required|date',
            'nomeTitular' => 'required|string',
            'cpf' => 'required|string'
        ]);

        MetodoPagamento::create([
            'user_id' => Auth::user()->id,
            'numero_cartao' => $request->numeroCartao,
            'cvv' => $request->cvv,
            'data_vencimento' => $request->dataVencimento,
            'nome_titular' => $request->nomeTitular,
            'cpf' => $request->cpf
        ]);

        return redirect()->route('usuario.gerenciarPagamentos', ['id' => Auth::user()->id])->with('sucesso', 'Cartão cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $metodoPagamento = MetodoPagamento::find($id);
        return view('admin.usuarios.editarPagamento', compact('metodoPagamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'numeroCartao' => 'required|string|unique:cartao_cliente,numero_cartao,' . $id,
            'cvv' => 'required|integer',
            'dataVencimento' => 'required|date',
            'nomeTitular' => 'required|string',
            'cpf' => 'required|string|unique:cartao_cliente,cpf,' . $id,
        ]);

        $metodoPagamento = MetodoPagamento::findOrFail($id);

        $metodoPagamento->update([
            'numero_cartao' => $request->numeroCartao,
            'cvv' => $request->cvv,
            'data_vencimento' => $request->dataVencimento,
            'nome_titular' => $request->nomeTitular,
            'cpf' => $request->cpf
        ]);

        return redirect()->route('usuario.gerenciarPagamentos', ['id' => Auth::user()->id])->with('sucesso', 'Cartão atualizado com sucesso!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
