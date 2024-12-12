<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensCarrinho extends Model
{
    use HasFactory;

    protected $table = "itens_carrinho";

    protected $fillable = [
        'lista_carrinho_id', // Chave estrangeira para a lista de carrinho
        'item_id',           // Chave estrangeira para o id do item (produto ou oferta)
        'tipo_item',         // Define se item é uma oferta ou produto normal
        'quantidade'         // Quantidade do item
    ];

    /**
     * Relacionamento com a lista de carrinho.
     */
    public function lista_carrinho_i()
    {
        return $this->belongsTo(ListaCarrinho::class, 'lista_carrinho_id');
    }

    public function carrinhoProdutoAdicionais()
    {   
        // Um item no carrinho pode ter vários adicionais (hasMany).
        return $this->hasMany(CarrinhoProdutoAdicional::class, 'item_carrinho_id');
    }

    /**
     * Relacionamento condicional com Produto.
     */
    public function produto()
    {
        // where é usado para verificar q a coluna tipo_item tem o valor produto, se tiver, retorna um produto (no caso verifica dentro dos atributos do produto)
        return $this->belongsTo(Produto::class, 'item_id')->where('tipo_item', 'produto');
    }

    /**
     * Relacionamento condicional com Oferta.
     */
    public function oferta()
    {
        // where é usado para verificar q a coluna tipo_item tem o valor oferta, se tiver, retorna uma oferta
        return $this->belongsTo(Oferta::class, 'item_id')->where('tipo_item', 'oferta');
    }

    /**
     * Método para obter o item genérico (produto ou oferta) com base em `tipo_item`.
     */
    public function item()
    {
        // Este método é uma maneira conveniente de acessar o item, seja ele um produto ou uma oferta, com base no valor de tipo_item. Ele verifica o tipo e retorna o relacionamento correto automaticamente.

        if ($this->tipo_item === 'produto') {
            return $this->produto;
        } elseif ($this->tipo_item === 'oferta') {
            return $this->oferta;
        }
        return null;
    }
}
