<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoPagamento extends Model
{
    use HasFactory;

    protected $table = "cartao_cliente";

    protected $fillable = [
        // pode ter vários cartões associados a um usuário, ent, esse campo se encaixa no quesito de entrada de dados em massa
        'user_id',
        'numero_cartao',
        'cvv',
        'data_vencimento',
        'nome_titular',
        'cpf'
    ];

    // Relação com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
