@extends('layouts.site')
<link rel="stylesheet" href="{{ asset('css/produtos.css') }}">

<!-- adicionando fonte 2 (Titan One) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap" rel="stylesheet">


@section('conteudo')
    <style>
        body {
            background-color: #F8F7F7;
        }

    </style>
    <main>

        <div class="imgTelaProduto">
            <img src="/img/duplo-cheddar.png">
        </div>


        <div class="especificacoesProduto">

            <div class="detalhesProduto centraliza">
                <div id="valorNomeTelaProduto">
                    <h1>Mrs. King Chedar Extra</h1>

                    <h2>$38.99</h2>
                </div>

                <div class="descricaoTelaProduto">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis aperiam debitis dolores porro
                        magnam quos quidem, commodi blanditiis eveniet vero aspernatur nobis atque molestias ratione
                        est voluptates officiis libero eligendi.</p>
                </div>
            </div>

            <div class="informacoesNutricionais centraliza">
                <p>INFORMAÇÕES NUTRICIONAIS</p>
                <i class="fa-solid fa-plus" style="color: #8C6342;"></i>
            </div>
        </div>

        <div class="complemento">
            <div class="adicionais centraliza">
                <h2>Adicionais</h2>
                <p>Escolha até 5 opções!</p>
            </div>

            <div class="itemAdicional centraliza">
                <div class="descricaoAdicional">
                    <h3>Adicionar Cebola</h3>
                    <p>+ R$ 2,00</p>
                </div>

                <i class="fa-solid fa-plus" style="color: #8C6342;"></i>
            </div>

            <div class="itemAdicional centraliza">
                <div class="descricaoAdicional">
                    <h3>Adicionar Cebola</h3>
                    <p>+ R$ 2,00</p>
                </div>

                <i class="fa-solid fa-plus" style="color: #8C6342;"></i>
            </div>
        </div>

        <div class="complemento">
            <div class="adicionais centraliza">
                <h2>Adicionais</h2>
                <p>Escolha até 5 opções!</p>
            </div>

            <div class="itemAdicional centraliza">
                <div class="descricaoAdicional">
                    <h3>Adicionar Cebola</h3>
                    <p>+ R$ 2,00</p>
                </div>

                <i class="fa-solid fa-plus" style="color: #8C6342;"></i>
            </div>

            <div class="itemAdicional centraliza">
                <div class="descricaoAdicional">
                    <h3>Adicionar Cebola</h3>
                    <p>+ R$ 2,00</p>
                </div>

                <i class="fa-solid fa-plus" style="color: #8C6342;"></i>
            </div>
        </div>

        <div id="botaoTelaProduto">
            <button class="botaoAddCartTelaProduto">Add to Cart</button>
        </div>


    </main>
@endsection
