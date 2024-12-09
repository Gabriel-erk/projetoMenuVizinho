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
        Schema::create('produto_adicional', function (Blueprint $table) {
            $table->id();
            // guarda id do produto e se for deletado, apaga todos os registros relacionados a ele(se apagar o campo produto_id os produtos vão junto/limpar o valor do campo)
            // o método constrained indica qual tabela deve ser referenciada para a chave estrangeira (normalmente o laravel pega o nome do foreignId e coloca-o no plural, em produto_id funciona, mas adicional mantem-se adicionals, o que não existe, apenas adicionais, então é necessário especificar a tabela em questão, fiz o mesmo em produtos apenas por aprendizado mesmo) 
            $table->foreignId('produto_id')->constrained('produtos')->onDelete('cascade');
            $table->foreignId('adicional_id')->constrained('adicionais')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto_adicional');
    }
};
