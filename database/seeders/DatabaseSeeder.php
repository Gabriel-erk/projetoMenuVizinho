<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use LojaSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        // colocando aqui para poder rodar com todas as outras seeders, com um comando menor
        $this->call(CategoriaProdutoSeeder::class);
        $this->call(SubCategoriaSeeder::class);
        $this->call(LojaSeeder::class);
        $this->call(ProdutoSeeder::class);

    }
}
