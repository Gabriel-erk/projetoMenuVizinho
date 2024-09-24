<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sub_categoria')->insert([
            [
                'titulo_categoria' => 'Lanches mais pedidos',
                'descricao' => 'Aproveite o melhor dos nossos lanches.',
            ],
            [
                'titulo_categoria' => 'Acompanhamentos',
                'imagem' => 'img/batata-frita.webp'
            ],
            [
                'titulo_categoria' => 'Bebidas',
                'imagem' => 'img/suco.webp'
            ],
            [
                'titulo_categoria' => 'Sobremesas',
                'imagem' => 'img/sorveteChocolate.png'
            ],
        ]);
    }
}
