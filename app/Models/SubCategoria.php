<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    use HasFactory;

    protected $table = "sub_categoria";

    protected $fillable = [
        'titulo_sub_categoria',
        'descricao'
    ];

    public function produtos()
    {
        // definindo que uma categoria pode ter muitos produtos - dizendo que esta tabela está relacionada a muitos registros na tabela Produtos através da coluna categoria_produto_id
        return $this->hasMany(Produto::class, 'sub_categoria_produto_id');
    }
}
