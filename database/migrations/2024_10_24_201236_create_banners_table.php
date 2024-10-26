<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loja_id')->constrained('lojas')->onDelete('cascade'); // Relacionamento com a tabela lojas
            $table->string('titulo')->nullable(); // pode ajudar com seo, para a busca do site
            $table->string('imagem'); // URL ou caminho da imagem
            $table->string('categoria'); // Define a categoria do banner (ofertas, ou cardápio)
            $table->string('link')->nullable(); // Link de redirecionamento opcional
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
