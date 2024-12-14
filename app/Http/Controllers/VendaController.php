<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function meusPedidos($userId){
        $vendas = Venda::where("user_id", $userId)->get();
        return view("admin.usuarios.meusPedidos", compact("vendas"));
    }

    // area administrativa

    public function index(){
        $vendas = Venda::all();
        return view("admin.adm.admVendas.index", compact("vendas"));
    }

    public function show(string $id){
        $venda = Venda::findOrFail( $id );
        return view("admin.adm.admVendas.visualizar", compact("venda"));
    }

    public function destroy(string $id)
    {
        try {
            $venda = Venda::findOrFail($id);
            $venda->delete();
            return redirect()->route('venda.index')->with('sucesso', 'Venda excluída com sucesso!!!');
        } catch (\Exception $e) {

            return redirect()->route('venda.destroy')->with('error', 'Erro ao deletar a venda');
        }
    }
}
