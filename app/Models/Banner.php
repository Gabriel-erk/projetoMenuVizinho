<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'loja_id',
        // pode ser útil para SEO, em relação a busca do site etc
        'titulo',
        'imagem',
        'categoria',
    ];

    // banner pertence a uma loja
    public function loja()
    {
        return $this->belongsTo(Loja::class);
    }
}
