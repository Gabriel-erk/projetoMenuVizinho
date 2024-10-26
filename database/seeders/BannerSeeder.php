<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banners')->insert([
            [
                'loja_id' => 1,
                'imagem' => 'img/banner-certo.png', // Caminho da imagem do primeiro banner
                'titulo' => 'Deliciosos Hambúrgueres',
                'categoria' => 'cardapio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'loja_id' => 1,
                'imagem' => 'img/peca-o-seu3.png', // Caminho da imagem do segundo banner
                'titulo' => 'Acompanhamentos Irresistíveis',
                'categoria' => 'cardapio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'loja_id' => 1,
                'imagem' => 'img/banner 3.png', // Caminho da imagem do terceiro banner
                'titulo' => 'Sobremesas para Adoçar o Dia',
                'categoria' => 'cardapio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
