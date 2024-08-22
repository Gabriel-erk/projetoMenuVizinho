<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('parceiros', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 25);
            $table->string('sobrenome', 60);
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->timestamps();
            $table->rememberToken();
            $table->string('rua', 90);
            $table->string('bairro', 80)->nullable();
            $table->string('numero', 10);
            $table->string('complemento', 30)->nullable();
            $table->string('cidade', 35);
            $table->string('estado', 2)->nullable();
            $table->string('cep', 9);
            $table->string('telefone', 15)->nullable();
            $table->string('celular', 15);
            // campo para diferenciar a tabela parceiros de usuários
            $table->integer('tipo')->default(2); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parceiros');
    }
};
