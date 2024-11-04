<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OfertaSeeder extends Seeder
{
    public function run()
    {
        // Insere 10 ofertas com dados fictícios
        DB::table('ofertas')->insert(
            collect(range(1, 10))->map(function ($i) {
                return [
                    'imagem' => 'img/mr-nugget.png', // Nome de exemplo para imagem
                    'nome' => 'Oferta '.$i,
                    'preco' => rand(10, 100) * 0.5, // Gera preço aleatório
                    'descricao' => 'Descrição do produto '.$i,
                    'info_nutricional' => 'Informação nutricional do produto '.$i,
                    'duracao' => Carbon::now()->addDays(rand(1, 10)), // Define a duração de 1 a 10 dias a partir de hoje
                    'loja_id' => 1, // ID de loja exemplo (ajuste conforme necessário)
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            })->toArray()
        );
    }
}
