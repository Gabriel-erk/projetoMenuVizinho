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
        Schema::create('cupom_palavras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cupom_id');
            $table->string('palavra'); // para as múltiplas palavaras-chave que podem ser associadas (um cupom pode ter várias palavras-chave associadas a ele)
            $table->foreign('cupom_id')->references('id')->on('cupons')->onDelete('cascade'); //se deletar o cupom, apaga essa tabela
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cupom_palavras');
    }
};
