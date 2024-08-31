<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoPagamento extends Model
{
    use HasFactory;

    protected $table = "metodopagamento";

    protected $fillable = [
        'numero_cartao',
        'data_vencimento',
        'nome_titular',
        'cpf'
    ];
}
