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

    public function produtos()
    {   
        // definindo que uma categoria pode ter muitos produtos - dizendo que esta tabela está relacionada a muitos registros na tabela Produtos através da coluna categoria_produto_id
        return $this->hasMany(Produto::class, 'categoria_produto_id');
    }
}
