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
        Schema::create('categoria_produto', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // $table->string('imagem');
            $table->string('titulo_categoria', 20);
            $table->string('descricao', 40);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria_produto');
    }
};
