<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        $this->call(BannerSeeder::class);
        $this->call(ProdutoSeeder::class);
        $this->call(CupomSeeder::class);
        $this->call(UserSeeder::class);

    }
}
