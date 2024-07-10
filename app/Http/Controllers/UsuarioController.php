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
        //
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

    public function editPagamentos() {
        return view('admin.usuarios.gerenciarPagamentos');
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
