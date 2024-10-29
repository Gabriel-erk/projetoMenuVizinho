<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cupom_sub_categorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cupom_id');
            $table->unsignedBigInteger('sub_categoria_id');
            $table->foreign('cupom_id')->references('id')->on('cupons')->onDelete('cascade');
            $table->foreign('sub_categoria_id')->references('id')->on('sub_categoria')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cupom_sub_categorias');
    }
};
