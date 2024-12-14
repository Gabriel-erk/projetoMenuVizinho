<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensVenda extends Model
{
    use HasFactory;

    protected $table = "itens_venda";

    protected $fillable = [
        'venda_id',
        'item_id',
        'tipo_item',
        'quantidade',
        'preco',
    ];

    // Relação com a venda
    public function venda()
    {
        return $this->belongsTo(Venda::class, 'venda_id');
    }

    // Relação com os adicionais do item
    public function adicionaisVenda()
    {
        return $this->hasMany(AdicionaisVenda::class, 'item_venda_id');
    }

    // Relação condicional com o produto ou oferta
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'item_id')->where('tipo_item', 'produto');
    }

    public function oferta()
    {
        return $this->belongsTo(Oferta::class, 'item_id')->where('tipo_item', 'oferta');
    }
}
