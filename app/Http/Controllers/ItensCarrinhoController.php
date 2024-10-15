<?php

namespace App\Http\Controllers;
use App\Models\ItensCarrinho;
use App\Models\ListaCarrinho;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ItensCarrinhoController extends Controller
{

    public function index(string $id)
    {
        // Busca os itens da tabela ItensCarrinho que estão associados à lista de carrinho
        $itens = ItensCarrinho::where('lista_carrinho_id', $id)->get();
    
        // Retorna para a view 'visualizar' passando os itens encontrados
        return view('admin.adm.admListaC.admItensCarrinho.index', compact('itens'));
    }    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
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
