<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parceiro extends Model
{
    use HasFactory;
    protected $table = "parceiros";

    protected $fillable = [
        'nome',
        'sobrenome',
        'email',
        'password', 
        'rua',
        'numero',
        'bairro',
        'complemento',
        'cidade',
        'estado',
        'cep',
        'celular',
        'telefone'
    ];
}

