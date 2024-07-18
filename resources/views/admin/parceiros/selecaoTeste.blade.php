@extends('layouts.site')
<link rel="stylesheet" href="{{ asset('css/cadastroRestaurante.css') }}">

@section('conteudo')
    <style>
        body {
            background-color: #fff;
        }

        .conteudo{
            display: flex;
            /* justify-content: space-evenly */
            /* justify-content: space-between; */
        }

        .secaoCategorias {
            width: 50%;
        }

        .secaoSubCategorias {
            width: 50%
            /* margin-right: 50px; */
        }

        .opcoesCadastro {
            border-bottom: none
        }

        .opcaoFinal {
            border-bottom: none;
        }

    </style>

    <main class="contrabando">

        <div class="conteudo">

            <div class="secaoCategorias">
                <div id="titulo">
                    <h2>Categorias</h2>
                </div>

                <div class="opcoesCadastro">
                    <a href="{{ route("parceiros.cadastroCardapio") }}">
                        <h3>Lanches</h3>
                    </a>
                    <p class="descricaoOpcao">Cadastro dos lanches</p>

                </div>

                <div class="opcoesCadastro">
                    <a href="{{ route("parceiros.cadastroCardapio") }}">
                        <h3>Bebidas</h3>
                    </a>
                    <p class="descricaoOpcao">Cadastro de bebidas</p>

                </div>

                <div class="opcoesCadastro">
                    <a href="{{ route("parceiros.cadastroCardapio") }}">
                        <h3>Açai</h3>
                    </a>
                    <p class="descricaoOpcao">Cadastro de Açai</p>

                </div>

                <div class="opcoesCadastro opcaoFinal">
                    <a href="{{ route("parceiros.cadastroCardapio") }}">
                        <h3>Acompanhamentos</h3>
                    </a>
                    <p class="descricaoOpcao">Cadastro de acompanhamentos</p>

                </div>

            </div>

            <div class="secaoSubCategorias">
                <div id="titulo">
                    <h2>Sub-categorias</h2>
                </div>

                <div class="opcoesCadastro">
                    <a href="{{ route("parceiros.cadastroCardapio") }}">
                        <h3>Mais pedidos</h3>
                    </a>
                    <p class="descricaoOpcao">Produtos de: mais pedidos</p>

                </div>

                <div class="opcoesCadastro">
                    <a href="{{ route("parceiros.cadastroCardapio") }}">
                        <h3>Ofertas</h3>
                    </a>
                    <p class="descricaoOpcao">Produtos de: ofertas</p>

                </div>

                <div class="opcoesCadastro opcaoFinal">
                    <a href="{{ route("parceiros.cadastroCardapio") }}">
                        <h3>Lançamentos</h3>
                    </a>
                    <p class="descricaoOpcao">Produtos de: lançamentos</p>

                </div>

            </div>

        </div>
    </main>
@endsection
