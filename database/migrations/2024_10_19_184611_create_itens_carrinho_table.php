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
        Schema::create('itens_carrinho', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('lista_carrinho_id'); // ID da lista de carrinho (chave estrangeira)
            $table->unsignedBigInteger('produto_id'); // ID do produto (chave estrangeira)
            $table->integer('quantidade')->default(1); // Campo para armazenar a quantidade do produto

            // caso um produto seja deletado, ele será apagado na tabela de itens_carrinho também
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
            $table->foreign('lista_carrinho_id')->references('id')->on('lista_carrinho')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens_carrinho');
    }
};
