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
        Schema::create('metodo_pagamento', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('numero_cartao', 25);
            $table->date('data_vencimento');
            $table->string('nome_titular', 45);
            $table->string('cpf', 14);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metodo_pagamento');
    }
};
