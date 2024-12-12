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
        'tipo_item',
        'categoria_produto_id',
        'sub_categoria_produto_id',
        'loja_id'
    ];
    use HasFactory;

    public function loja()
    {
        return $this->belongsTo(Loja::class);
    }

    public function categoria()
    {
        // Define que um produto pertence a uma categoria - Informa que o produto pertence a uma categoria, utilizando a chave estrangeira
        return $this->belongsTo(CategoriaProduto::class, 'categoria_produto_id');
    }

    public function subCategoria()
    {
        // Define que um produto pertence a uma sub-categoria - Informa que o produto pertence a uma sub-categoria, utilizando a chave estrangeira
        return $this->belongsTo(SubCategoria::class, 'sub_categoria_produto_id');
    }

    // Um produto pode estar em vários carrinhos, portanto, o relacionamento com itens_carrinho será de "um produto pode ter muitos registros de itens carrinho".
    public function itens_carrinho()
    {
        return $this->hasMany(ItensCarrinho::class, 'produto_id');
    }

    public static function boot()
    {
        parent::boot();

        // Antes de salvar, garantir que um dos dois campos esteja preenchido, para que um produto nunca seja enviado sem ter categoria/sub
        static::saving(function ($produto) {
            if (is_null($produto->categoria_produto_id) && is_null($produto->sub_categoria_produto_id)) {
                throw new \Exception('O produto deve estar associado a uma categoria ou a uma subcategoria.');
            }
        });
    }
}
