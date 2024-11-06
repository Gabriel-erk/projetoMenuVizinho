<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{   
    protected $table = "ofertas";

    protected $fillable = ['imagem', 'nome', 'preco', 'descricao', 'info_nutricional', 'tipo_item', 'duracao', 'loja_id'];

    use HasFactory;
}
