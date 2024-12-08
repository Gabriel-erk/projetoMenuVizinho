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
            'numero_cartao' => 'required|string|unique:cartao_cliente,numero_cartao',
            'cvv' => 'required|integer|unique:cartao_cliente,cvv',
            'data_vencimento' => 'required|date',
            'nome_titular' => 'required|string',
            'cpf' => 'required|string|unique:cartao_cliente,cpf'
        ]);

        MetodoPagamento::create([
            'user_id' => Auth::user()->id,
            'numero_cartao' => $request->numero_cartao,
            'cvv' => $request->cvv,
            'data_vencimento' => $request->data_vencimento,
            'nome_titular' => $request->nome_titular,
            'cpf' => $request->cpf
        ]);

        if (session('from_admin_area_cards_create')) {
            session()->forget('from_admin_area_cards_create');
            return redirect()->route('cartao.index', ['id' => Auth::user()->id])->with('sucesso', 'Cartão cadastrado com sucesso!');
        }

        return redirect()->route('pagamentos.gerenciarPagamentos', ['id' => Auth::user()->id])->with('sucesso', 'Cartão cadastrado com sucesso!');
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
            'numero_cartao' => 'required|string|unique:cartao_cliente,numero_cartao,' . $id,
            'cvv' => 'required|integer|unique:cartao_cliente,cvv,' . $id,
            'data_vencimento' => 'required|date',
            'nome_titular' => 'required|string',
            'cpf' => 'required|string|unique:cartao_cliente,cpf,' . $id,
        ]);

        $metodoPagamento = MetodoPagamento::findOrFail($id);

        $metodoPagamento->update([
            'numero_cartao' => $request->numero_cartao,
            'cvv' => $request->cvv,
            'data_vencimento' => $request->data_vencimento,
            'nome_titular' => $request->nome_titular,
            'cpf' => $request->cpf
        ]);

        if (session('from_admin_area_cards_edit')) {
            session()->forget('from_admin_area_cards_edit');
            return redirect()->route('cartao.index', ['id' => Auth::user()->id])->with('sucesso', 'Cartão atualizado com sucesso!!!');
        }

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

            if (session('from_admin_area_cards_index')) {
                session()->forget('from_admin_area_cards_index');
                return redirect()->route('cartao.index', ['id' => Auth::user()->id])
                    ->with('sucesso', 'Cartão deletado com sucesso!!!');
            }

            return redirect()->route('pagamentos.gerenciarPagamentos', ['id' => Auth::user()->id])
                ->with('sucesso', 'Cartão deletado com sucesso!!!');
        } catch (\Exception $e) {

            return redirect()->route('pagamentos.gerenciarPagamentos', ['id' => Auth::user()->id])->with('error', 'Erro ao deletar cartão');
        }
    }

    // rotas da área administrativa agora

    public function indexAdm()
    {
        session(['from_admin_area_cards_index' => true]); // passa para a view cadastro da area administrativa esse nome de sessão para identificar que a requisição store abaixo veio de lá, se não veio, vai para index

        $cartoes = MetodoPagamento::all();
        return view('admin.adm.admCartoes.index', compact('cartoes'));
    }

    public function show(string $id)
    {
        $cartao = MetodoPagamento::findOrFail($id);
        return view('admin.adm.admCartoes.visualizar', compact('cartao'));
    }

    public function createAdm()
    {
        session(['from_admin_area_cards_create' => true]); // passa para a view cadastro da area administrativa esse nome de sessão para identificar que a requisição store abaixo veio de lá, se não veio, vai para index
        return view('admin.adm.admCartoes.cadastro');
    }

    public function editAdm(string $id)
    {
        session(['from_admin_area_cards_edit' => true]);
        $cartao = MetodoPagamento::findOrFail($id);
        return view('admin.adm.admCartoes.editar', compact('cartao'));
    }
}
