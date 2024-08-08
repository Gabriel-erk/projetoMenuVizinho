<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParceirosController extends Controller
{
    /*
     * views da pasta parceiros
     */

    public function meuRestaurante()
    {
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

    public function createRestarurante()
    {
        return view('admin.cadastroParceiros.cadastroRestaurante');
    }

    public function cadastroInformacoes()
    {
        return view('admin.cadastroParceiros.cadastroInformacoes');
    }

    public function cadastroCategorias()
    {
        return view('admin.cadastroParceiros.cadastroCategorias');
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

    public function cadastroBanner()
    {
        return view('admin.cadastroParceiros.cadastroBanner');
    }

    public function cadastroCupons()
    {
        return view('admin.cadastroParceiros.cadastroCupons');
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
