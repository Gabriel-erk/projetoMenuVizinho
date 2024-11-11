<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ListaCarrinho;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsuariosApiController extends Controller
{
    public function index()
    {
        try {
            $usuarios = User::all();
            return response()->json($usuarios, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao listar dados"], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $usuario = User::findOrFail($id);

            return response()->json($usuario, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Usuário não encontrada"], 404);
        }
    }

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

        try {
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

            return response()->json(["message" => "Usuário criado com sucesso"], 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao criar usuário"], 500);
        }
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

        try {
            $usuario = User::findOrFail($id);
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

            return response()->json($usuario, 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao atualizar usuário"], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $usuario = User::findOrFail($id);
            $usuario->delete();

            return response()->json(["message" => "Usuário deletado com sucesso"], 200);
        } catch (Exception $e) {
            return response()->json(["Erro" => "Erro ao deletar usuário"], 500);
        }
    }
}
