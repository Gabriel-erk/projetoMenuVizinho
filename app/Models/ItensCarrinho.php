<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItensCarrinho extends Model
{
    protected $table = "itens_carrinho";
    use HasFactory;

    public function lista_carrinho(){
        // dizendo que a tabela itensCarrinho pode ter muitos registros na tabela lista_carrinho (ou seja, uma lista_carrinho pode ter só uma tabela itens_carrinho, mas uma tabela itens_carrinho pode ter muitos registros na tabela lista_carrinho, pois múltiplos usuário vão ter uma lista_carrinho, e todos terão itens diferentes)
        return $this->hasMany(ListaCarrinho::class, 'itens_carrinho_id');
    }
}


