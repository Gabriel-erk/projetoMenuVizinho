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
        Schema::create('adicionais', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome', 25);
            $table->decimal('valor', 8, 2);
            
            $table->unsignedBigInteger('categoria_produto_id')->nullable();
            $table->foreign('categoria_produto_id')->references('id')->on('categoria_produto')->onDelete('set null');
            
            $table->unsignedBigInteger('sub_categoria_produto_id')->nullable();
            $table->foreign('sub_categoria_produto_id')->references('id')->on('sub_categoria')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adicionais');
    }
};
