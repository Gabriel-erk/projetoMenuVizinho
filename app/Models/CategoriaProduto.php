<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProduto extends Model
{
    use HasFactory;

    protected $table = "categoria_produto";

    protected $fillable = [
        'imagem',
        'titulo_categoria',
        'descricao'
    ];
}
