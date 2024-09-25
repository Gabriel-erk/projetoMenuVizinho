<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_produto')->insert([
            [
                'titulo_categoria' => 'Lanches',
                'descricao' => 'Aproveite o melhor dos nossos lanches.',
                'imagem' => 'img/hamburger.webp'
            ],
            [
                'titulo_categoria' => 'Acompanhamentos',
                'descricao' => 'Aproveite o melhor dos nossos lanches.',
                'imagem' => 'img/batata-frita.webp'
            ],
            [
                'titulo_categoria' => 'Bebidas',
                'descricao' => 'Aproveite o melhor dos nossos lanches.',
                'imagem' => 'img/suco.webp'
            ],
            [
                'titulo_categoria' => 'Sobremesas',
                'descricao' => 'Aproveite o melhor dos nossos lanches.',
                'imagem' => 'img/sorveteChocolate.png'
            ],
        ]);
    }
}
