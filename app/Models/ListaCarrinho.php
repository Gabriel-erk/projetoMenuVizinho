<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaCarrinho extends Model
{
    use HasFactory;

    protected $table = "lista_carrinho";

    protected $fillable = [
        'user_id',
        'cartao_cliente_id',
        'itens_carrinho_id'
    ];

    public function itens_carrinho(){
        return $this->belongsTo(ItensCarrinho::class, 'itens_carrinho_id');
    }
}
