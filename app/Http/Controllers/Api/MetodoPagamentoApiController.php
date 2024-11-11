<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\MetodoPagamento;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MetodoPagamentoApiController extends Controller
{
    public function index(string $id)
    {
        try {
            // Filtra os métodos de pagamento pelo user_id igual ao id passado pelo parâmetro
            $metodosPagamentos = MetodoPagamento::where('user_id', $id)->get();
            return response()->json($metodosPagamentos, 200); // Removi os colchetes para evitar um array adicional desnecessário
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao listar dados"], 500);
        }
    }


    public function show(string $id)
    {
        try {
            $metodoPagamento = MetodoPagamento::findOrFail($id);
            return response()->json($metodoPagamento, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Cartão não encontrada"], 404);
        }
    }

    // pedindo o id do usuário que irei armazenar aquele cartão
    public function store(Request $request, string $id)
    {
        $request->validate([
            'numeroCartao' => 'required|string|unique:cartao_cliente,numero_cartao',
            'cvv' => 'required|integer|unique:cartao_cliente,cvv',
            'dataVencimento' => 'required|date',
            'nomeTitular' => 'required|string',
            'cpf' => 'required|string|unique:cartao_cliente,cpf'
        ]);

        try {
            MetodoPagamento::create([
                'user_id' => $id,
                'numero_cartao' => $request->numeroCartao,
                'cvv' => $request->cvv,
                'data_vencimento' => $request->dataVencimento,
                'nome_titular' => $request->nomeTitular,
                'cpf' => $request->cpf
            ]);

            return response()->json(["message" => "Cartão adicionado com sucesso"], 200);
        } catch (Exception  $e) {
            return response()->json(["Erro" => $e->getMessage()], 500);
            // return response()->json(["Erro" => "Erro ao adicionar cartão"], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'numeroCartao' => 'required|string|unique:cartao_cliente,numero_cartao,' . $id,
            'cvv' => 'required|integer|unique:cartao_cliente,cvv,' . $id,
            'dataVencimento' => 'required|date',
            'nomeTitular' => 'required|string',
            'cpf' => 'required|string|unique:cartao_cliente,cpf,' . $id,
        ]);

        try {
            $metodoPagamento = MetodoPagamento::findOrFail($id);

            $metodoPagamento->update([
                'numero_cartao' => $request->numeroCartao,
                'cvv' => $request->cvv,
                'data_vencimento' => $request->dataVencimento,
                'nome_titular' => $request->nomeTitular,
                'cpf' => $request->cpf
            ]);

            return response()->json($metodoPagamento, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao atualizar produto"], 500);
        }
    }

    public function destroy(string $id)
    {

        try {
            // Tente encontrar o método de pagamento
            $metodoPagamento = MetodoPagamento::findOrFail($id);

            // Se pertence, deletar o cartão
            $metodoPagamento->delete();

            return response()->json(["message" => "Cartão deletado com sucesso"], 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao deletar cartão"], 500);
        }
    }
}
