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
            $table->unsignedBigInteger('item_id'); // ID do item (pode ser produto ou oferta)
            $table->string('tipo_item'); // Define o tipo do item (produto ou oferta)
            $table->integer('quantidade')->default(1); // Quantidade do item

            // Chaves estrangeiras e restrições
            $table->foreign('lista_carrinho_id')->references('id')->on('lista_carrinho')->onDelete('cascade');

            // Índices para otimizar as consultas
            $table->index(['item_id', 'tipo_item']);
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
