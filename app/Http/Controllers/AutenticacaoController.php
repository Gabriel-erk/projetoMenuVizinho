<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutenticacaoController extends Controller
{
    public function formLogin()
    {
        return view('admin.autenticacao.login');
    }

    public function login(Request $request)
    {
        $dadosUsuarios = $request->validate([
            "email" => ["required", "email"],
            "password" => "required"
        ]);

        if (Auth::attempt($dadosUsuarios)) {
            $request->session()->regenerate();

            return redirect()->intended("/admin/usuarios/minhaConta");
        }
        return redirect()->back()->withErrors(["email" => "Usuário ou senha inválida"]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        // invalidando token
        $request->session()->regenerateToken();

        return redirect("/");
    }
}
