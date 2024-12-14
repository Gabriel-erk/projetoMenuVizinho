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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('usuarios')->onDelete('cascade');
            $table->decimal('total', 8, 2);
            $table->decimal('frete', 8, 2);
            // cria uma coluna chamada cupom_id, que pode ter valores nulos(nullable()), pois uma venda não possui necessariamente cupons para ser realizada, constrained faz referencia direta a tabela cupons, então o valor de cupom_id corresponde a um registro existente na tabela cupons, nullOnDelete quer dizer que caso o registro na tabela cupons for deletado, todos os registros que fazem referência a ele (no caso na tabela vendas) terão o valor de cupom_id alterado para null
            $table->foreignId('cupom_id')->nullable()->constrained('cupons')->nullOnDelete();

            $table->foreignId('metodo_pagamento_id')->constrained('cartao_cliente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venda');
    }
};
