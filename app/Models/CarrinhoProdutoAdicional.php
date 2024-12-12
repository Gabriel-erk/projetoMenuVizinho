<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarrinhoProdutoAdicional extends Model
{
    use HasFactory;

    protected $table = "carrinho_produto_adicional";

    protected $fillable = ['item_carrinho_id', 'adicional_id', 'quantidade'];

    public function itemCarrinho()
    {
        // Cada registro em CarrinhoProdutoAdicional pertence a um ItensCarrinho. (belongsTo)
        return $this->belongsTo(ItensCarrinho::class, 'item_carrinho_id');
    }

    public function adicional()
    {
        // Cada registro em CarrinhoProdutoAdicional pertence a um adicional (belongsTo)
        return $this->belongsTo(Adicional::class, 'adicional_id');
    }
}
