@extends('layouts.site')
<link rel="stylesheet" href="{{ asset('css/cadastroRestaurante.css') }}">

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
                <h2>Àrea do usuário</h2>
            </div>

            <div class="opcoesCadastro">
                <a href="{{ route('usuario.minhasInformacoes') }}">
                    <h3>Minhas Informações</h3>
                </a>
                <p class="descricaoOpcao">Visualize ou altere suas informações de cadastro</p>

            </div>

            <div class="opcoesCadastro">
                <a href="{{ route('usuario.gerenciarPagamentos') }}">
                    <h3>Formas de pagamento</h3>
                </a>
                <p class="descricaoOpcao">Visualize ou altere suas formas de pagamento</p>

            </div>

        </div>
    </main>
@endsection
