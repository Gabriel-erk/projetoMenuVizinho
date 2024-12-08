<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoAdicional extends Model
{
    use HasFactory;
    protected $table = "produto_adicional";

    protected $fillable = [
        'produto_id',
        'adicional_id'
    ];

    public function itensCarrinho()
    {
        return $this->belongsToMany(ItensCarrinho::class, 'carrinho_produto_adicional')->withPivot('quantidade');
    }
}
