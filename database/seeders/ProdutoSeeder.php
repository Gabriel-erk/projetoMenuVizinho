<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto; // Modelo de Produto
use App\Models\CategoriaProduto; // Modelo de CategoriaProduto
use App\Models\SubCategoria; // Modelo de SubCategoria
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    public function run()
    {
        // Pegando todas as categorias da tabela categoria_produto
        $categorias = CategoriaProduto::all();
        $subCategorias = SubCategoria::all();

        // Para cada categoria, criamos três produtos associados
        foreach ($categorias as $categoria) {
            // cria 6 produtos, e passa para a próxima categoria, e refaz o processo
            for ($i = 1; $i <= 6; $i++) {
                Produto::create([
                    'imagem' => 'img/img-corrigida/duplo-cheddar.png', // Imagem padrão
                    'nome' => 'Produto ' . $i, // Nome do produto
                    'preco' => 19.99, // Preço padrão
                    'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula vestibulum ullamcorper vel eget libero.',
                    // 'descricao' => 'Descrição padrão do Produto ' . $i,
                    'info_nutricional' => 'Informações nutricionais do Produto ' . $i,
                    'categoria_produto_id' => $categoria->id, // Associando à categoria existente
                    'sub_categoria_produto_id' => null, // Subcategoria é opcional, então deixamos como null
                ]);
            }
        }
        foreach ($subCategorias as $subCategoria) {
            // cria 3 produtos, e passa para a próxima categoria, e refaz o processo
            for ($i = 1; $i <= 6; $i++) {
                Produto::create([
                    'imagem' => 'img/img-corrigida/duplo-cheddar.png', // Imagem padrão
                    'nome' => 'Produto ' . $i, // Nome do produto
                    'preco' => 19.99, // Preço padrão
                    'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula vestibulum ullamcorper vel eget libero.',
                    // 'descricao' => 'Descrição padrão do Produto ' . $i,
                    'info_nutricional' => 'Informações nutricionais do Produto ' . $i,
                    'categoria_produto_id' => null, // Associando à nenhuma categoria
                    'sub_categoria_produto_id' => $subCategoria->id, // associando somente a subCategoria
                ]);
            }
        }
    }
}
