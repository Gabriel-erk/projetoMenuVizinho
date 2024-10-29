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
        Schema::create('cupom_categorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cupom_id');
            $table->unsignedBigInteger('categoria_id'); // ID da categoria ou subcategoria
            $table->foreign('cupom_id')->references('id')->on('cupons')->onDelete('cascade'); // deletou cupom, laravel irá deletar todos os registros da tabela cupom_categorias com o id da tabela cupom
            $table->foreign('categoria_id')->references('id')->on('categoria_produto')->onDelete('cascade'); // deletou categoria, laravel irá deletar os registros da tabela cupom_categorias com o id daquela categoria
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cupom_categorias');
    }
};
