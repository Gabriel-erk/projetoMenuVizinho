<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaCarrinho extends Model
{
    use HasFactory;

    protected $table = "lista_carrinho";

    protected $fillable = [
        'user_id', // Assumindo que você tem um campo user_id
        'cartao_cliente_id' // Caso você tenha um cartão cliente
    ];

    // Define o relacionamento com ItensCarrinho
    public function itens()
    {
        return $this->hasMany(ItensCarrinho::class, 'lista_carrinho_id');
    }
}
