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

    public function categoria()
    {
        // Define que um produto pertence a uma categoria - Informa que o produto pertence a uma categoria, utilizando a chave estrangeira
        return $this->belongsTo(CategoriaProduto::class, 'categoria_produto_id');
    }

    public function subCategoria()
    {
        // Define que um produto pertence a uma categoria - Informa que o produto pertence a uma categoria, utilizando a chave estrangeira
        return $this->belongsTo(SubCategoria::class, 'sub_categoria_produto_id');
    }

    public static function boot()
    {
        parent::boot();

        // Antes de salvar, garantir que um dos dois campos esteja preenchido
        static::saving(function ($produto) {
            if (is_null($produto->categoria_produto_id) && is_null($produto->sub_categoria_produto_id)) {
                throw new \Exception('O produto deve estar associado a uma categoria ou a uma subcategoria.');
            }
        });
    }
}