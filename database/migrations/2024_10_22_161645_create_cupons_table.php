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
            $table->datetime('data_expiracao'); // campo de data e hora para a expiração
            $table->int('forma_desconto'); // se for 1 é desconto por palavras chave, 2 é por categoria 
            $table->unsignedBigInteger('loja_id'); // não é nullable pois não quero cupons sem loja
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
