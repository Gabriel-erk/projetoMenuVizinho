<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('admin.usuarios.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome'=> 'required|string',
            'sobrenome'=> 'required|string',
            'email'=>'required|string|email|unique:usuarios',
            'password'=>'required',
            'rua'=>'required|string',
            'numero'=>'required',
            'bairro'=>'required|string',
            'cidade'=>'required|string',            
            'estado'=>'nullable|string',
            'cep'=>'required',            
            'celular'=>'required',            
            'telefone'=>'nullable',            
            'foto'=>'nullable'             
        ]);

        User::create([
            'nome'=> $request->nome,
            'sobrenome'=> $request->sobrenome,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'rua'=>$request->rua,
            'numero'=>$request->numero,
            'bairro'=>$request->bairro,
            'cidade'=>$request->cidade,
            'estado'=>$request->estado,
            'cep'=>$request->cep,
            'celular'=>$request->celular,
            'telefone'=>$request->telefone,
            'foto'=>$request->foto,
        ]);

        return redirect()->route('site.index')->with('success','Usuário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // comando para encontrar o id do usuário e se não encontrar retornar um erro - string $id comando que tirei de parametro desse metodo
        // $usuario = User::findOrFail($id);
        return view('admin.usuarios.minhaConta');
    }

    // quando este método for passado, ele listará as informações do usuário nos camnpos: email, telefone, nome, sobrenome (eles vao ter um placeholder mostrando as informações atuais daquele usuário, ou seja, para chamar este método, precisará passar o id do usuário atual para a view, com compact também)
    public function infoConta()
    {
        return view('admin.usuarios.minhasInformacoes');
    }

    /*
    * views da seçao de pagamentos 
    */

    public function viewPagamentos()
    {
        return view('admin.usuarios.gerenciarPagamentos');
    }

    // vai editar as informações da forma de pagamento escolhida, ela será passada quando o metodo for chamado, ou seja, quando clicar no lapis, ao lado de um pagamento salvo, sera passado o 'id', daquela forma de pagamento, então, ao realizar conexão com db, precisarei passar o id dql pagamento atraves da rota(em webp) e pegar aaqui newPagamentos(string $id), e devolver para a view return view ('admin.usuarios.adicionarPagamento', compact($id));
    public function newPagamentos()
    {
        return view('admin.usuarios.adicionarPagamento');
    }

    public function editPagamentos()
    {
        return view('admin.usuarios.editarPagamento');
    }

    public function viewEnderecos()
    {
        return view('admin.usuarios.enderecoDeEntrega');
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
