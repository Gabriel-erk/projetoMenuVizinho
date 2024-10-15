<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {   
        /*
        * método view composer serve para executar uma lógica para views específicas (ou todas), sempre que forem carregadas 
        * o primeiro parâmetro '*' diz que será passado a todas as views do projeto - caso queira apenas a views específicas, pode colocar o nome delas
        * o segundo parâmetro é uma função anônima que será executada ao carregar as views (pega a quantidade de produtos do carrinho e devolve para as views)
        */
        view()->composer('*', function ($view) {
            // executa somente se o usuário estiver logado
            if (auth()->check()) { // Verifica se o usuário está logado - se não estiver não executa
                $userId = auth()->id(); // pega o id do usuário autenticado
                // método whreHas verifica se tem uma relação entre a lista carrinho e itens carrinho - buscando o carrinho associado ao usuário logado (id do usuário logado é $userId)
                $totalItensCarrinho = \App\Models\ItensCarrinho::whereHas
                // O $query permite que você defina condições específicas em uma relação entre duas tabelas, neste caso, entre ItensCarrinho e ListaCarrinho. Ele funciona como um "filtro" que você pode usar para garantir que está buscando apenas as listas de carrinho do usuário correto, e não de qualquer usuário.
                ('lista_carrinho_i', function ($query) use ($userId) {
                    // filtra a tabela listaCarrinho para encontrar a listaCarrinho associada ao usuário logado
                    $query->where('user_id', $userId);
                    // sum('quantidade') retorna a soma de TODOS os produtos do carrinho, não somente de um tipo de produto
                })->sum('quantidade');
                // with passa a váriavel 'totalItensCarrinho' para todas as views, onde agora todas as views carregadas podem acessa-la
                $view->with('totalItensCarrinho', $totalItensCarrinho);
            }
        });
    }
    
}
