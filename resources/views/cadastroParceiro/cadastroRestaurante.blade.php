@extends('layouts.site')
<link rel="stylesheet" href="{{ asset('css/cadastroRestaurante.css') }}">

@section('conteudo')
    <style>
        body {
            background-color: #fff;
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
                <a href="cadastroCardapio">
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
    </main>
@endsection
