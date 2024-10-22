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
        Schema::create('lojas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome_loja', 25);
            $table->string('logotipo'); // guarda imagem, logo, o tamanho é de 255, mas, quando não se define, automaticamente assume 255
            $table->text('texto_sobre_restaurante');
            $table->string('imagem_sobre_restaurante');
            $table->text('texto_politica_privacidade');
            $table->text('regras_cupons');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lojas');
    }
};
