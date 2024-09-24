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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('imagem');
            $table->string('nome', 25);
            $table->decimal('preco', 8, 2);
            $table->text('descricao');
            $table->text('info_nutricional');

            // Definir a chave estrangeira para a tabela categoria_produto
            $table->unsignedBigInteger('categoria_produto_id'); // Campo da chave estrangeira
            $table->foreign('categoria_produto_id') // Definindo a coluna 'categoria_produto_id' como chave estrangeira
                ->references('id') // Referenciando o campo 'id' da tabela categoria_produto
                ->on('categoria_produto') // Tabela relacionada
                ->onDelete('cascade'); // Comportamento ao deletar (opcional: 'cascade', 'set null', etc.)
            // Definir a chave estrangeira para a tabela sub_categoria_produto (opcional)
            $table->unsignedBigInteger('sub_categoria_produto_id')->nullable(); // Sub-categoria é opcional, por isso nullable (pode ser nulo)
            $table->foreign('sub_categoria_produto_id')
                ->references('id')
                ->on('sub_categoria')
                ->onDelete('set null'); // Se a sub-categoria for deletada, o campo é definido como NULL e não deleta todos os registros associados a ele
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
