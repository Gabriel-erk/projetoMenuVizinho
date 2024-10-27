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
        Schema::create('lista_carrinho', function (Blueprint $table) {
            $table->id();
            // vou precisar das info do usuário logado
            $table->unsignedBigInteger('user_id')->unique(); // Relaciona com o usuário - unique para cada usuário aparecer uma vez na tabela lista_carrinho, e ajuda a evitar inserir múltiplicas listas_carrinho para um único usuário
            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('user_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lista_carrinho');
    }
};
