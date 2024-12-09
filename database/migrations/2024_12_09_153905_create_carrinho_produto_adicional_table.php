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
        Schema::create('carrinho_produto_adicional', function (Blueprint $table) {
            $table->id();
            $table->foreignId('itens_carrinho_id')->constrained('itens_carrinho')->onDelete('cascade');
            $table->foreignId('produto_adicional_id')->constrained('produto_adicional')->onDelete('cascade');
            $table->integer('quantidade')->default(1); // Quantidade de adicionais escolhidos (talvez eu tire isso pq nem preciso)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrinho_produto_adicional');
    }
};
