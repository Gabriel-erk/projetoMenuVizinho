<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CupomPalavra extends Model
{
    use HasFactory;

    protected $table = 'cupom_palavras';
    
    protected $fillable = [
        'cupom_id',
        'palavra_chave',
    ];

    // Relacionamento com o Cupom
    public function cupom()
    {
        return $this->belongsTo(Cupom::class);
    }
}
