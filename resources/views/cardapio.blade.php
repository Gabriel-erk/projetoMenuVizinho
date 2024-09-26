@extends('layouts.site')

<link rel="stylesheet" href="{{ asset('css/siteCss/products.css') }}">
<link rel="stylesheet" href="{{ asset('css/siteCss/titleProducts.css') }}">

@section('conteudo')
    <main class="container">
        <style>
            .x {
                position: relative;
                top: 1.5em
            }
        </style>

        <div class="titulos">
            <span class="subtitulo x" style="display: block">Cardápio</span>
        </div>

        @foreach ($categorias as $categoria)
            <div class="titulos">
                <span class="fs-5 fw-semibold" style="display: block">{{ $categoria->titulo_categoria }}</span>
                <span class="descCategoria" style="display: block">{{ $categoria->descricao }} </span>
            </div>

            <div class="listaProdutos">
                @foreach ($categoria->produtos as $produto)
                    <div class="produto">
                        <a href="{{ route('site.produto') }}">
                            <div class="imgProduto">
                                <img src="{{ asset($produto->imagem) }}" alt="" srcset="">
                            </div>
                        </a>

                        <div class="nomeValorProduto">
                            <h2 class="nomeProduto">{{ $produto->nome }}</h2>
                            <p class="precoProduto">${{ $produto->preco }}</p>
                        </div>

                        <div class="descricaoProduto">
                            <p>{{ $produto->descricao }}</p>
                        </div>

                        <div class="agrupaIconeProduto">

                            <div class="iconeProduto imgCesta">

                                <img src="{{ asset('img/cetaShopping.png') }}" alt="" srcset="">
                            </div>

                            <div class="iconeProduto imgFavoritar">

                                <img src="{{ asset('img/favoritar3.png') }}" alt="">
                                {{-- <i class="fa-regular fa-heart"></i> --}}

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

        @foreach ($subCategorias as $subCategoria)
            <!-- Verifica se há produtos relacionados - se houver, lista a categoria e seus produtos - isso evita que imprima subCategorias vazias -->
            @if ($subCategoria->produtos->isNotEmpty())
                <div class="titulos">
                    <span class="fs-5 fw-semibold" style="display: block">{{ $subCategoria->titulo_sub_categoria }}</span>
                    <span class="descCategoria" style="display: block">{{ $subCategoria->descricao }} </span>
                </div>

                <div class="listaProdutos">
                    @foreach ($subCategoria->produtos as $produto)
                        <div class="produto">
                            <a href="{{ route('site.produto') }}">
                                <div class="imgProduto">
                                    <img src="{{ asset($produto->imagem) }}" alt="" srcset="">
                                </div>
                            </a>

                            <div class="nomeValorProduto">
                                <h2 class="nomeProduto">{{ $produto->nome }}</h2>
                                <p class="precoProduto">${{ $produto->preco }}</p>
                            </div>

                            <div class="descricaoProduto">
                                <p>{{ $produto->descricao }}</p>
                            </div>

                            <div class="agrupaIconeProduto">
                                <div class="iconeProduto imgCesta">
                                    <img src="{{ asset('img/cetaShopping.png') }}" alt="" srcset="">
                                </div>

                                <div class="iconeProduto imgFavoritar">
                                    <img src="{{ asset('img/favoritar3.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endforeach


    </main>
@endsection
