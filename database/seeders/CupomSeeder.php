<?php

namespace Database\Seeders;

use App\Models\Cupom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CupomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criando um cupom
        $cupom = Cupom::create([
            'nome_cupom' => 'Desconto Especial',
            'descricao_cupom' => 'Desconto em produtos com palavra-chave "carne"',
            'data_expiracao' => '2024-12-31 23:59:59',
            'forma_desconto' => 1, // Forma de desconto por palavra-chave
            'loja_id' => 1,
            'valor_desconto' => 15.00,
            'tipo_desconto' => 1, // Percentual
        ]);

        // Associando palavras-chave ao cupom
        $cupom->palavras()->createMany([
            ['palavra_chave' => 'carne'],
            ['palavra_chave' => 'vegetariano'],
        ]);
    }
}
