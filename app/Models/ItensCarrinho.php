<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItensCarrinho extends Model
{
    protected $table = "itens_carrinho";
    protected $fillable = [
        'lista_carrinho_id', // Chave estrangeira para a lista de carrinho
        'produto_id', // Chave estrangeira para o produto
        'quantidade' // Campo para armazenar a quantidade do produto
    ];

    use HasFactory;

    // Como tabela intermediária, ela vai se relacionar tanto com produtos quanto com lista_carrinho.

    // _i para dizer que a relação é com a tabela itens
    public function lista_carrinho_i(){
        // dizendo que a tabela itensCarrinho pode ter muitos registros na tabela lista_carrinho (ou seja, uma lista_carrinho pode ter só uma tabela itens_carrinho, mas uma tabela itens_carrinho pode ter muitos registros na tabela lista_carrinho, pois múltiplos usuário vão ter uma lista_carrinho, e todos terão itens diferentes)
        return $this->belongsTo(ListaCarrinho::class, 'lista_carrinho_id');
    }

    // relacionamento com produto
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }
}