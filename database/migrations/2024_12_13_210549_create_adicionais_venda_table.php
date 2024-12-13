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
        Schema::create('adicionais_venda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_venda_id')->constrained('itens_venda')->onDelete('cascade');
            $table->foreignId('adicional_id')->constrained('adicionais');
            // meu adicional já vem com seu preço, então não é necessário este campo, porém, irei estruturar primeiro
            $table->decimal('preco', 8, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adicionais_venda');
    }
};
