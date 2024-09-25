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
                'titulo_sub_categoria' => 'Lanches mais pedidos',
                'descricao' => 'Aproveite o melhor dos nossos lanches.',
            ],
            [
                'titulo_sub_categoria' => 'Ofertas da semana',
                'descricao' => 'Aproveite o melhor dos nossos lanches.',
            ],
            [
                'titulo_sub_categoria' => 'Lançamentos',
                'descricao' => 'Aproveite o melhor dos nossos lanches.',
            ],
            [
                'titulo_sub_categoria' => 'Combos',
                'descricao' => 'Aproveite o melhor dos nossos lanches.',
            ],
        ]);
    }
}
