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
                'imagem' => 'img/hamburger.webp'
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
