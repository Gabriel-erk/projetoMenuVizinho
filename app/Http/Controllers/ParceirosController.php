<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParceirosController extends Controller
{
    /*
     * views da pasta parceiros
     */

    public function meuRestaurante(){
        return view('admin.parceiros.meuRestaurante');
    }

    public function index()
    {
        //
    }

    /*
     * views da pasta cadastroParceiros
     */

    public function create()
    {
        return view('admin.cadastroParceiros.sejaParceiro');
    }

    // só pode entrar nessa página se as categorias/subcategorias já foram criadas
    public function selecaoCardapio()
    {
        return view('admin.cadastroParceiros.selecaoCardapio');
    }
    
    public function cadastroCardapio()
    {
        return view('admin.cadastroParceiros.cadastroCardapio');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
