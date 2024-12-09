<?php

namespace Database\Seeders;

use App\Models\Adicional;
use App\Models\CategoriaProduto;
use App\Models\SubCategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdicionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = CategoriaProduto::all();
        $subCategorias = SubCategoria::all();

        foreach ($categorias as $categoria) {
            for ($i = 0; $i < 5; $i++) {
                Adicional::create([
                    'nome' => 'adicional ' . $i,
                    'valor' =>  rand(10, 100) * 0.5, // Gera preço aleatório
                    'categoria_produto_id' => $categoria->id
                ]);
            }
        }

        foreach ($subCategorias as $subCategoria) {
            for ($i = 0; $i < 3; $i++) {
                Adicional::create([
                    'nome' => 'adiciional ' . $i,
                    'valor' =>  rand(10, 100) * 0.5, // Gera preço aleatório
                    'sub_categoria_produto_id' => $subCategoria->id
                ]);
            }
        }
    }
}
