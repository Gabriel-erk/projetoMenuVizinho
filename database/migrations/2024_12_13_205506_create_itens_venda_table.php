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
        Schema::create('itens_venda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venda_id')->constrained('vendas')->onDelete('cascade');
            // irá representar o id do produto (pois ao invés de fazer  uma referência ao item, irei copiar as informações dele para cá, pois um usuário pode ter múltiplas compras, e teria que apagar os itens frequentemente, oq deixaria este campo null e me imposibilitaria de referenciar novamente caso o usuário vá comprar novamente)
            $table->unsignedBigInteger('item_id')->nullable();
            $table->string('tipo_item');
            $table->integer('quantidade')->default(1);
            $table->decimal('preco', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens_venda');
    }
};
