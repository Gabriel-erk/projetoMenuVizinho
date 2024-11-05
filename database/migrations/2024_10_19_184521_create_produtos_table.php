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
            $table->unsignedBigInteger('categoria_produto_id')->nullable(); // Campo da chave estrangeira
            $table->foreign('categoria_produto_id') // Definindo a coluna 'categoria_produto_id' como chave estrangeira
                ->references('id') // Referenciando o campo 'id' da tabela categoria_produto
                ->on('categoria_produto') // Tabela relacionada
                ->onDelete('set null'); // Comportamento ao deletar (opcional: 'cascade', 'set null', etc.) - quero que seja set null pois um produto pode ter uma subcategoria e cat também, então, se possivel verificar o valor deste campo e estiver null, os 2, delete o produto automaticamente
            // Definir a chave estrangeira para a tabela sub_categoria_produto (opcional)
            $table->unsignedBigInteger('sub_categoria_produto_id')->nullable(); // Sub-categoria é opcional, por isso nullable (pode ser nulo)
            $table->foreign('sub_categoria_produto_id')
                ->references('id')
                ->on('sub_categoria')
                ->onDelete('set null'); // Se a sub-categoria for deletada, o campo é definido como NULL e não deleta todos os registros associados a ele
            //chave estrangeira da loja, que diz que cada produto pertence a uma loja - ele obrigatoriamente esta associado a uma loja (como é uma loja só no meu sistema, posso sempre definir um valor fixo)
            $table->unsignedBigInteger('loja_id'); // não é nullable pois não quero produtos sem loja
            $table->foreign('loja_id')->references('id')->on('lojas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            // processo necessário para manter integridade no banco de dados
            // Remove a definição da chave estrangeira que liga 'loja_id' a tabela 'lojas'
            $table->dropForeign(['loja_id']);

            // Remove a coluna 'loja_id' da tabela 'produtos'
            $table->dropColumn('loja_id');
        });

        Schema::dropIfExists('produtos');
    }
};
