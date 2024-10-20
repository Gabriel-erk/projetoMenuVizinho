<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LojaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lojas')->insert([
            'nome_loja' => 'Mr.Burger',
            'logotipo' => 'img/bua3.png',
            'texto_sobre_restaurante' => 'Bem-vindo ao Mr. Burger, onde a paixão por hambúrgueres é levada a um novo patamar! Fundado em 2020,
                nosso restaurante nasceu do desejo de criar experiências gastronômicas únicas, combinando ingredientes
                frescos e de alta qualidade com um ambiente acolhedor e moderno.',

            'imagem_sobre_restaurante' => 'img/img-restaurante.jpg',
            
            'texto_politica_privacidade' => 'A Mr. Burger, doravante denominada "nós", preza pela transparência e pela proteção dos dados dos nossos
            clientes. Esta Política de Privacidade explica como coletamos, usamos, protegemos e divulgamos suas
            informações quando você utiliza nosso site.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
