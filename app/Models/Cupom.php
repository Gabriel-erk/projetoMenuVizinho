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
        'forma_desconto',
        'valor_desconto',
        'tipo_desconto',
        'loja_id',
    ];
    use HasFactory;

    public function loja()
    {
        // cada cupom pertence a uma loja
        return $this->belongsTo(Loja::class);
    }

    public function palavras()
    {
        return $this->hasMany(CupomPalavra::class);
    }

    public function categorias()
    {
        // cada instância de cupom pode estar relacionada a várias instâncias de CategoriaProduto - 'cupom_categorias' faz ligação entre cupons e categorias, e contém o id da categoria (referenciada na tabela de categorias) e do cupom(referenciada na tabela de cupons), usada para consultar as associações entre cupons e categorias
        return $this->belongsToMany(CategoriaProduto::class, 'cupom_categorias', 'cupom_id', 'categoria_id');
    }

    public function subCategorias()
    {
        return $this->belongsToMany(SubCategoria::class, 'cupom_sub_categorias', 'cupom_id', 'sub_categoria_id');
    }
}
