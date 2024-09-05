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
        Schema::create('cartao_cliente', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // criando uma coluna na tabela para armazenar o id do usuário
            $table->unsignedBigInteger('user_id');
            /*
            * definindo uma chave estrangeira que faz referencia a ao id do usuário na tabela usuário e ao deletar um usuário, deleta todas as informações relacionadas a ele nesta tabela
            * foreign('user_id')->references('id')->on('users') define user_id como uma chave estrangeira que referencia o campo id na tabela usuários
            * onDelete('cascade'): Especifica que, ao deletar um usuário, todos os registros relacionados na tabela cartao_cliente serão automaticamente deletados (opcional, mas útil para manter a integridade referencial).
            */
            $table->foreign('user_id')->references('id')->on('usuarios')->onDelete('cascade');

            $table->string('numero_cartao', 25);
            $table->integer('cvv');
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
        Schema::dropIfExists('cartao_cliente');
    }
};
