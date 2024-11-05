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
        // trazendo apenas os métodos de pagamenteo associados ao usuário logado
        $metodosPagamentos = MetodoPagamento::where('user_id', Auth::user()->id)->get();
        return view('admin.usuarios.gerenciarPagamentos', compact('metodosPagamentos'));
    }

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
            'numeroCartao' => 'required|string|unique:cartao_cliente,numero_cartao',
            'cvv' => 'required|integer|unique:cartao_cliente,cvv',
            'dataVencimento' => 'required|date',
            'nomeTitular' => 'required|string',
            'cpf' => 'required|string|unique:cartao_cliente,cpf'
        ]);

        MetodoPagamento::create([
            'user_id' => Auth::user()->id,
            'numero_cartao' => $request->numeroCartao,
            'cvv' => $request->cvv,
            'data_vencimento' => $request->dataVencimento,
            'nome_titular' => $request->nomeTitular,
            'cpf' => $request->cpf
        ]);

        return redirect()->route('pagamentos.gerenciarPagamentos', ['id' => Auth::user()->id])->with('sucesso', 'Cartão cadastrado com sucesso!');
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
        $metodoPagamento = MetodoPagamento::findOrFail($id);
        return view('admin.usuarios.editarPagamento', compact('metodoPagamento'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'numeroCartao' => 'required|string|unique:cartao_cliente,numero_cartao,' . $id,
            'cvv' => 'required|integer|unique:cartao_cliente,cvv,' . $id,    
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

        return redirect()->route('pagamentos.gerenciarPagamentos', ['id' => Auth::user()->id])->with('sucesso', 'Cartão atualizado com sucesso!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            // Tente encontrar o método de pagamento
            $metodoPagamento = MetodoPagamento::findOrFail($id);

            // Se pertence, deletar o cartão
            $metodoPagamento->delete();

            return redirect()->route('pagamentos.gerenciarPagamentos', ['id' => Auth::user()->id])
                ->with('sucesso', 'Cartão deletado com sucesso!!!');
        } catch (\Exception $e) {

            return redirect()->route('pagamentos.gerenciarPagamentos', ['id' => Auth::user()->id])->with('error', 'Erro ao deletar cartão');
        }
    }
}
