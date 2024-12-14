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
}
