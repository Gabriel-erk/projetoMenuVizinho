<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProduto extends Model
{
    use HasFactory;

    protected $table = "cartao_cliente";

    protected $fillable = [
        'imagem',
        'titulo_cateogria'
    ];
}
