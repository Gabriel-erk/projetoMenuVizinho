@extends('layouts.site')
<link rel="stylesheet" href="{{ asset('css/parceirosCss/cadastroRestaurante.css') }}">

@section('conteudo')

    <style>
        body {
            background-color: #ffffff
        }

        .conteudo {
            padding-bottom: 220px;
        }
    </style>

    <main class="contrabando">

        <div class="conteudo">

            <div id="titulo">
                <h2>Área do restaurante</h2>
            </div>

            <div class="opcoesCadastro">
                <a href="{{ route('usuario.minhasInformacoes') }}">
                    <h3>Informações</h3>
                </a>
                <p class="descricaoOpcao">Gerencie informações auxiliares e logo</p>
            </div>

            <div class="opcoesCadastro">
                <a href="{{ route('usuario.gerenciarPagamentos') }}">
                    <h3>Categorias</h3>
                </a>
                <p class="descricaoOpcao">Gerencie a categorias dos produtos</p>
            </div>

            <div class="opcoesCadastro">
                <a href="{{ route('usuario.gerenciarPagamentos') }}">
                    <h3>Sub-Categoiras</h3>
                </a>
                <p class="descricaoOpcao">Gerencie sub-categoria dos produtos</p>
            </div>

            <div class="opcoesCadastro">
                <a href="{{ route('usuario.gerenciarPagamentos') }}">
                    <h3>Cardápio</h3>
                </a>
                <p class="descricaoOpcao">Gerencie os produtos do seu cardápio</p>
            </div>

            <div class="opcoesCadastro">
                <a href="{{ route('usuario.gerenciarPagamentos') }}">
                    <h3>Banners</h3>
                </a>
                <p class="descricaoOpcao">Gerencie os banners da tela principal e ofertas</p>
            </div>

            <div class="opcoesCadastro">
                <a href="{{ route('usuario.gerenciarPagamentos') }}">
                    <h3>Cupons</h3>
                </a>
                <p class="descricaoOpcao">Gerencie os cupons dos seus produtos</p>
            </div>

        </div>
    </main>
@endsection
