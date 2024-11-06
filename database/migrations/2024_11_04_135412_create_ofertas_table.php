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
        Schema::create('ofertas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('imagem');
            $table->string('nome', 25);
            $table->decimal('preco', 8, 2);
            $table->text('descricao');
            $table->text('info_nutricional');
            $table->timestamp('duracao');
            $table->string('tipo_item')->default('oferta');
          
            $table->unsignedBigInteger('loja_id'); // não é nullable pois não quero ofertas sem loja
            $table->foreign('loja_id')->references('id')->on('lojas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ofertas');
    }
};
