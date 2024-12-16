<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdicionaisVenda extends Model
{
    use HasFactory;

    protected $table = "adicionais_venda";

    protected $fillable = [
        'item_venda_id',
        'adicional_id',
        'valor',
        'quantidade'
    ];

    // Relação com o item da venda
    public function itemVenda()
    {
        return $this->belongsTo(ItensVenda::class, 'item_venda_id');
    }

    // Relação com o adicional
    public function adicional()
    {
        return $this->belongsTo(Adicional::class, 'adicional_id');
    }
}
