<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adicional extends Model
{
    protected $table = "adicionais";

    use HasFactory;
    protected $fillable = [
        'nome',
        'valor',
        'categoria_produto_id',
        'sub_categoria_produto_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(CategoriaProduto::class, 'categoria_produto_id');
    }

    public function subCategoria()
    {
        return $this->belongsTo(SubCategoria::class, 'sub_categoria_produto_id');
    }

    // relacionamento de muitos para muitos com a tabela intermediária 'produto_adicional', que vai a relacionar com os registros de produtos
    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'produto_adicional');
    }

    public static function boot()
    {
        parent::boot();

        // Antes de salvar, garantir que um dos dois campos esteja preenchido
        static::saving(function ($adicional) {
            if (is_null($adicional->categoria_produto_id) && is_null($adicional->sub_categoria_produto_id)) {
                throw new \Exception('O Adicional deve estar associado a uma categoria ou a uma subcategoria.');
            }
        });
    }
}
