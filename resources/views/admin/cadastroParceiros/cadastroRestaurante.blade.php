@extends('layouts.site')
<link rel="stylesheet" href="{{ asset('css/parceirosCss/cadastroRestaurante.css') }}">

@section('conteudo')
    <style>
        body {
            background-color: #fff;
        }

        /* formatação dos botões */

        .agrupaBotoes {
            display: flex;
            justify-content: center;
        }

        .botoes {

            margin-top: 45px;
            margin-left: 10px;
            padding: 8px 14px;

            background-color: #8C6342;

            border-radius: 4px;

            transition: filter 0.3s ease;
        }

        .botoes a {
            color: #fff;
            font-weight: 600;
            font-size: 18px;
        }

        .botoes:hover {
            /* color: #e6e1e1; */
            filter: brightness(0.9);
        }
    </style>
    <main class="contrabando">

        <div class="conteudo">

            <div id="titulo">
                <h2>Cadastro de restaurante</h2>
            </div>

            <div class="opcoesCadastro">
                <a href="cadastroInformacoes">
                    <h3>Informações</h3>
                </a>
                <p class="descricaoOpcao">Informações auxiliares e logo</p>

            </div>

            <div class="opcoesCadastro">
                <a href="cadastroCategorias">
                    <h3>Categorias</h3>
                </a>
                <p class="descricaoOpcao">Categorias dos produtos</p>

            </div>

            <div class="opcoesCadastro">
                <a href="cadastroSubCategorias">
                    <h3>Sub-Categorias</h3>
                </a>
                <p class="descricaoOpcao">Sub-categorias dos produtos</p>

            </div>

            <div class="opcoesCadastro">
                <a href="{{ route('parceiros.selecaoCardapio') }}">
                    <h3>Cardápio</h3>
                </a>
                <p class="descricaoOpcao">Cadastro de produtos</p>

            </div>

            <div class="opcoesCadastro">
                <a href="cadastroBanner">
                    <h3>Banners</h3>
                </a>
                <p class="descricaoOpcao">Banners do site</p>

            </div>

            <div class="opcoesCadastro opcaoFinal">
                <a href="cadastroCupons">
                    <h3>Cupons</h3>
                </a>
                <p class="descricaoOpcao">Cupons para seus produtos</p>

            </div>

        </div>

        <div class="agrupaBotoes">

            <div class="botoes">

                <a href="{{ route('site.index') }}">Voltar</a>

            </div>

            <div class="botoes">

                <a type="submit" href="#">Salvar</a>

            </div>

        </div>
    </main>
@endsection
