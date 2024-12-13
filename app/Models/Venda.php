<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $table = "vendas";

    protected $fillable = [
        'user_id',
        'total',
        'frete',
        'cupom_id',
        'metodo_pagamento_id'
    ];

    // Relação com o usuário (quem realizou a compra)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relação com os itens da venda
    public function itensVenda()
    {
        return $this->hasMany(ItensVenda::class, 'venda_id');
    }

    // Relação com o cupom (opcional)
    public function cupom()
    {
        return $this->belongsTo(Cupom::class, 'cupom_id');
    }

    // Relação com o método de pagamento
    public function metodoPagamento()
    {
        return $this->belongsTo(MetodoPagamento::class, 'metodo_pagamento_id');
    }
}
