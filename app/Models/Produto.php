<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = "produtos";

    protected $fillable = [
        'imagem',
        'nome',
        'preco',
        'descricao',
        'info_nutricional',
        'categoria_produto_id',
        'sub_categoria_produto_id'
    ];
    use HasFactory;
}
