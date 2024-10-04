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
            $table->unsignedBigInteger('user_id'); // Relaciona com o usuário
            // vou precisar das info do cartao do cliente, q estarão na tabela cartao_cliente
            $table->unsignedBigInteger('cartao_cliente_id')->nullable(); // Relaciona com o cartão do cliente (opcional)
            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('user_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('cartao_cliente_id')->references('id')->on('cartao_cliente')->onDelete('set null'); // Se o cartão for deletado, o campo fica null
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
