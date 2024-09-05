<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoPagamento extends Model
{
    use HasFactory;

    protected $table = "cartao_cliente";

    protected $fillable = [
        'user_id',
        'numero_cartao',
        'cvv',
        'data_vencimento',
        'nome_titular',
        'cpf'
    ];
}
