<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupom extends Model
{
    protected $table = 'cupons'; // Define explicitamente o nome da tabela, pois se não o laravel vai procurar o plural, 'cupoms', que não existe, e sim, cupons
    
    protected $fillable = [
        'nome_cupom',
        'descricao_cupom',
        'data_expiracao',
        'loja_id',
    ];
    use HasFactory;

    public function loja()
    {    
        // cada cupom pertence a uma loja
        return $this->belongsTo(Loja::class);
    }
}
