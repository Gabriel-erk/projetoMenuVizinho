<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Adiciona o uso de Hash

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            [
                'nome' => 'gabriel',
                'sobrenome' => 'erick',
                'email' => 'gb@gmail.com',
                // criptografando a senha pois o laravel espera receber esse campo criptografado
                'password' => Hash::make('28112006'), // Criptografa a senha
                'rua' => 'jjjjuuuuujj',
                'bairro' => 'juiiiuuuu',
                'numero' => '1023',
                'celular' => '1499231345'
            ]
        ]);
    }
}
