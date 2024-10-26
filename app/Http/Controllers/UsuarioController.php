<?php

namespace App\Http\Controllers;

use App\Models\ListaCarrinho;
use Illuminate\Http\Request;
use App\Models\User;
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

        return redirect()->route('usuario.minhaConta')->with('sucesso', 'Usuário atualizado com sucesso!!!');
    }

    public function create()
    {
        return view('admin.usuarios.cadastro');
    }

    public function createUserAdmView()
    {
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

        return redirect()->route('usuarioAdm.index')->with('sucesso', 'Usuário cadastrado com sucesso!');
    }

    public function destroy(string $id)
    {
        try {
            $usuario = User::findOrFail($id);
            $usuario->delete();
            // manter na view atual, se não, para site.index - caso delete na tela da própria conta, precisa estar logado, e ao deletar ele não está mais logado, então mandar para site.index (vai cair no se não, pois não é possivel manter na view atual), e caso delete na view de adm da loja, mantenha lá, pois não precisa estar logado para usa-lá
            return redirect()->route('site.index')->with('sucesso', 'Conta deletada com sucesso!!!');
        } catch (\Exception $e) {

            return redirect()->route('usuarioAdm.index')->with('error', 'Erro ao deletar o usuário');
        }
    }

    /**
     * Display the specified resource.
     */
    public function minhaConta()
    {
        return view('admin.usuarios.minhaConta');
    }

    // quando este método for passado, ele listará as informações do usuário nos camnpos: email, telefone, nome, sobrenome (eles vao ter um placeholder mostrando as informações atuais daquele usuário, ou seja, para chamar este método, precisará passar o id do usuário atual para a view, com compact também)
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
        return view('admin.usuarios.meusPedidos');
    }
}
