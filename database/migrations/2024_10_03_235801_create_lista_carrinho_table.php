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
        Schema::create('lista_carrinho', function (Blueprint $table) {
            $table->id();
            // vou precisar das info do usuário logado
            $table->unsignedBigInteger('user_id')->unique(); // Relaciona com o usuário - unique para cada usuário aparecer uma vez na tabela lista_carrinho, e ajuda a evitar inserir múltiplicas listas_carrinho para um único usuário
            // vou precisar das info do cartao do cliente, q estarão na tabela cartao_cliente
            $table->unsignedBigInteger('cartao_cliente_id')->nullable(); // Relaciona com o cartão do cliente (opcional)
            // $table->unsignedBigInteger('itens_carrinho_id')->nullable(); // Relaciona com a tabela itens carrinho - existem momentos que a tabela pode não ter registros, como um usuário que acabou de se registrar, neste caso seria melhor nullable
            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('user_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('cartao_cliente_id')->references('id')->on('cartao_cliente')->onDelete('set null'); // Se o cartão for deletado, o campo fica null
            // $table->foreign('itens_carrinho_id')->references('id')->on('itens_carrinho')->onDelete('set null'); // Se o registro na tabela itens_carrinho for deletado, o valor do campo itens_carrinho_id ficará como null (por conta de set null) ao invés de deletar o registro principal(tabela lista_carrinho, que tem um campo referenciando a tabela itens_carrinho, ao inves de apagar um registro da tabela lista_carrinho (por ex, a lista_carrinho com o id = 3, apenas deixa como nullo o campo da tabela lista_carrinho que está relacionado com a tabela itens_carrinho)) 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lista_carrinho');
    }
};
