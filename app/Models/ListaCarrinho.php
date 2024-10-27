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
    ];

    // Define o relacionamento com ItensCarrinho
    public function itens()
    {
        return $this->hasMany(ItensCarrinho::class, 'lista_carrinho_id');
    }
}
