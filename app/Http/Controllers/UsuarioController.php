<?php

namespace App\Http\Controllers;

use App\Models\ListaCarrinho;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Venda;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{

    // método da pasta admUsuario, que redireciona o adm a página principal, listando todos os usuários cadastrados (em breve deixar na tabela usuários o campo que mostra em qual restaurante ele tá registrado, etc, ou se mudar a lógica do site, colocar pra ele ver vários restaurantes, pique ifood, e n ter essa n, ele tem acesso a todos - q é uma ideia baiana)
    public function index()
    {
        $usuarios = User::all();
        return view('admin.adm.admUsuarios.index', compact('usuarios'));
    }

    public function show(string $id)
    {
        // Encontra o usuário pelo ID
        $usuario = User::findOrFail($id);

        // Busca a lista de carrinho associada ao ID do usuário - claúsula where me permite comparar o campo 'user_id' diretamente com o id do usuário
        $listaCarrinho = ListaCarrinho::where('user_id', $usuario->id)->first();

        return view('admin.adm.admUsuarios.visualizar', compact('usuario', 'listaCarrinho'));
    }

    public function edit(string $id)
    {
        session(['from_admin_edit_area' => true]); // definindo uma sessão para mostrar que a requisição veio da area administrativa
        $usuario = User::findOrFail($id);
        return view('admin.adm.admUsuarios.editar', compact('usuario'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'email' => 'required|string|email|unique:usuarios,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
            'rua' => 'required|string',
            'bairro' => 'required|string',
            'numero' => 'required|string',
            'complemento' => 'nullable|string',
            'telefone' => 'nullable|string',
            'celular' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $usuario = User::findOrFail($id);

        // Armazena nova foto, se enviada, e remove a foto antiga
        if ($request->hasFile('foto')) {
            if ($usuario->foto) {
                Storage::disk('public')->delete($usuario->foto);
            }
            $usuario->foto = $request->file('foto')->store('imgUser', 'public');
        }

        // Atualiza o usuário com os novos dados
        $usuario->update([
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $usuario->password,
            'rua' => $request->rua,
            'bairro' => $request->bairro,
            'complemento' => $request->complemento,
            'numero' => $request->numero,
            'telefone' => $request->telefone,
            'celular' => $request->celular,
        ]);

        // Verificar a origem da requisição
        if (session('from_admin_edit_area')) {
            // Se veio da área administrativa, redireciona para o índice da área administrativa
            session()->forget('from_admin_area'); // Limpa a sessão
            return redirect()->route('usuarioAdm.index')->with('sucesso', 'Usuário atualizado com sucesso!');
        }

        // Se veio de qualquer outro lugar, redireciona para a página da conta do usuário
        return redirect()->route('usuario.minhaConta')->with('sucesso', 'Usuário atualizado com sucesso!!!');
    }

    public function create()
    {
        return view('admin.usuarios.cadastro');
    }

    public function createUserAdmView()
    {
        session(['from_admin_area' => true]); // passa para a view cadastro da area administrativa esse nome de sessão para identificar que a requisição store abaixo veio de lá, se não veio, vai para index
        return view('admin.adm.admUsuarios.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'sobrenome' => 'required|string',
            'email' => 'required|string|email|unique:usuarios',
            'password' => 'required',
            'rua' => 'required|string',
            'numero' => 'required',
            'complemento' => 'nullable|string',
            'bairro' => 'required|string',
            'celular' => 'required',
            'telefone' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('imgUser', 'public');
        }

        User::create([
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'complemento' => $request->complemento,
            'celular' => $request->celular,
            'telefone' => $request->telefone,
            'foto' => $fotoPath,
        ]);

        // Verificar a origem da requisição
        if (session('from_admin_area')) {
            // Se veio da área administrativa, redireciona para o índice da área administrativa
            session()->forget('from_admin_area'); // Limpa a sessão
            return redirect()->route('usuarioAdm.index')->with('sucesso', 'Usuário cadastrado com sucesso!');
        }

        // Se veio de qualquer outro lugar, redireciona para o site.index
        return redirect()->route('site.index')->with('sucesso', 'Usuário cadastrado com sucesso!');
    }

    public function destroy(string $id)
    {
        try {
            $usuario = User::findOrFail($id);
            $usuario->delete();

            // Verificar se a requisição veio da tela da conta do usuário
            if (session('from_account_page')) {
                // Se deletou da conta do usuário, redireciona para a página inicial
                $successMessage = 'Conta deletada com sucesso!!!';
                session()->forget('from_account_page'); // Limpa a sessão criada para identificar de onde veio a requisição (view minhaConta)
                return redirect()->route('site.index')->with('sucesso', $successMessage);
            }

            // Se veio da tela de administração, mantém na mesma página
            return redirect()->route('usuarioAdm.index')->with('sucesso', 'Usuário deletado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('usuarioAdm.index')->with('error', 'Erro ao deletar o usuário');
        }
    }

    /**
     * Display the specified resource.
     */
    public function minhaConta()
    {
        // Define que o usuário está na página da conta (usando para saber a sua view e mudar a lógica ao salvar alterar informações do usuário na view minhaConta e na área admin)
        session(['from_account_page' => true]);
        return view('admin.usuarios.minhaConta');
    }

    public function infoConta(string $id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.minhasInformacoes', compact('usuario'));
    }

    /*
    * meus pedidos 
    */

    // vou pedir id do usuário dps - mostrar apenas os pedidos referentes a aquele usuário
    public function meusPedidos()
    {
        $userId = auth()->id();
        // Recuperar todas as vendas do usuário logado
        $vendas = Venda::with([
            'itensVenda', // Itens da venda e informações dos produtos
            'itensVenda.adicionaisVenda', // Adicionais de cada item
            'cupom', // Informações do cupom usado
            'metodoPagamento', // Método de pagamento usado
        ])->where('user_id', $userId)->get();

        
        return view('admin.usuarios.meusPedidos', compact('vendas'));
    }
}
