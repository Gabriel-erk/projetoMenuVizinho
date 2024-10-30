<?php

namespace Database\Seeders;

use App\Models\CategoriaProduto;
use App\Models\Cupom;
use App\Models\SubCategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CupomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     // Criando um cupom
    //     $cupom = Cupom::create([
    //         'nome_cupom' => 'Desconto Especial',
    //         'descricao_cupom' => 'Desconto em produtos com palavra-chave "carne"',
    //         'data_expiracao' => '2024-12-31 23:59:59',
    //         'forma_desconto' => 1, // Forma de desconto por palavra-chave
    //         'loja_id' => 1,
    //         'valor_desconto' => 15.00,
    //         'tipo_desconto' => 1, // Percentual
    //     ]);

    //     // Associando palavras-chave ao cupom
    //     $cupom->palavras()->createMany([
    //         ['palavra_chave' => 'carne'],
    //         ['palavra_chave' => 'vegetariano'],
    //     ]);
    // }

    public function run()
    {
        // Criando cupons com palavras-chave específicas
        $cupomCarne = Cupom::create([
            'nome_cupom' => 'Desconto Carne',
            'descricao_cupom' => 'Desconto especial para carne',
            'data_expiracao' => '2024-12-12 23:59:59',
            'forma_desconto' => 1,
            'tipo_desconto' => 0,
            'valor_desconto' => 50.00,
            'loja_id' => 1,
        ]);
        $cupomCarne->palavras()->create(['palavra_chave' => 'carne']);

        $cupomFrango = Cupom::create([
            'nome_cupom' => 'Desconto Frango',
            'descricao_cupom' => 'Desconto especial para frango',
            'data_expiracao' => '2024-12-12 23:59:59',
            'forma_desconto' => 1,
            'tipo_desconto' => 0,
            'valor_desconto' => 50.00,
            'loja_id' => 1,
        ]);
        $cupomFrango->palavras()->create(['palavra_chave' => 'frango']);

        // Criando cupons para cada categoria
        $categorias = CategoriaProduto::all();
        foreach ($categorias as $categoria) {
            $cupomCategoria = Cupom::create([
                'nome_cupom' => 'Desconto ' . $categoria->nome,
                'descricao_cupom' => 'Desconto especial para a categoria ' . $categoria->nome,
                'data_expiracao' => '2024-12-12 23:59:59',
                'forma_desconto' => 2,
                'tipo_desconto' => 0,
                'valor_desconto' => 50.00,
                'loja_id' => 1,
            ]);
            $cupomCategoria->categorias()->attach($categoria->id);
        }

        // Criando cupons para cada subcategoria
        $subCategorias = SubCategoria::all();
        foreach ($subCategorias as $subCategoria) {
            $cupomSubCategoria = Cupom::create([
                'nome_cupom' => 'Desconto ' . $subCategoria->nome,
                'descricao_cupom' => 'Desconto especial para a subcategoria ' . $subCategoria->nome,
                'data_expiracao' => '2024-12-12 23:59:59',
                'forma_desconto' => 2,
                'tipo_desconto' => 0,
                'valor_desconto' => 50.00,
                'loja_id' => 1,
            ]);
            $cupomSubCategoria->subCategorias()->attach($subCategoria->id);
        }
    }
}
