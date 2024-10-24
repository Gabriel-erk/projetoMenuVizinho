<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loja extends Model
{
    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome_loja',
        'logotipo',
        'texto_sobre_restaurante',
        'imagem_sobre_restaurante',
        'texto_politica_privacidade',
        'regras_cupons',
    ];


    public function banners()
    {   
        // cada loja pode ter muitos banners
        return $this->hasMany(Banner::class);
    }

    public function produtos()
    {   
        // cada loja pode ter muitos produtos
        return $this->hasMany(Produto::class);
    }

    public function cupons()
    {   
        // cada loja pode ter muitos cupons
        return $this->hasMany(Cupom::class);
    }
}
