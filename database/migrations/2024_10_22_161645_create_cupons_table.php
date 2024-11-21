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
        Schema::create('cupons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome_cupom', 50);
            $table->string('descricao_cupom', 60);
            $table->datetime('data_expiracao');
            $table->unsignedTinyInteger('forma_desconto'); // 1 para palavras-chave, 2 para categorias
            $table->decimal('valor_desconto', 8, 2); // valor do desconto
            $table->unsignedBigInteger('loja_id');
            $table->foreign('loja_id')->references('id')->on('lojas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cupons');
    }
};
