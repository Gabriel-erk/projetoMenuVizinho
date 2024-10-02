@extends('layouts.site')

<link rel="stylesheet" href="{{ asset('css/siteCss/products.css') }}">
<link rel="stylesheet" href="{{ asset('css/siteCss/titleProducts.css') }}">

@section('banner')
    <div class="banner owl-carousel owl-theme">

        <div class="img-banner">
            <img src="{{ asset('img/banner-certo.png') }}" alt="">
        </div>

        <div class="img-banner">
            <img src="{{ asset('img/peca-o-seu3.png') }}" alt="">
        </div>

        <div class="img-banner">
            <img src="{{ asset('img/banner 3.png') }}" alt="">
        </div>

    </div>
@endsection

@section('conteudo')
    @if (session('sucesso'))
        <script>
            // mostra a mensagem depois de carregar o site primeiro
            window.onload = function() {
                alert('{{ session('sucesso') }}');
            };
        </script>
    @endif

    @if (session('error'))
        <script>
            // mostra a mensagem depois de carregar o site primeiro
            window.onload = function() {
                alert('{{ session('error') }}');
            };
        </script>
    @endif

    <section id="lista-cardapio">
        {{-- bg-light w-100 h-25 mt-5 --}}
        <div class="cardapio bg-light mt-5" style="height: 58vh">
            <div class="containerCardapio container">
                <div class="titulos fw-bold p-2">

                    <span class="subtitulo fs-7 pb-0 d-block">Menu</span>
                    {{-- font size 5 e padding top e bottom 0 --}}
                    <span class="fs-5 py-0 fw-semibold d-block">Nosso Cardápio</span>

                </div>

                <div class="itensCardapio d-flex text-center justify-content-between"
                    style="font-family: 'Cabin', sans-serif">

                    @if ($categorias->isEmpty())
                        <p>Nenhuma categoria cadastrada</p>
                    @else
                        <!-- Exibir dinamicamente as categorias cadastradas -->
                        @foreach ($categorias as $categoria)
                            <div class="itemCardapio">
                                <div class="infoCardapio rounded-3">
                                    <a href="cardapio.html#lista{{ $categoria->titulo_categoria }}"
                                        class="text-decoration-none">
                                        <img src="{{ asset($categoria->imagem) }}" alt="{{ $categoria->titulo_categoria }}">
                                        <p>{{ $categoria->titulo_categoria }}</p>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

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

        {{-- Dividindo as categorias em 2 partes --}}
        @php
            // Pegando as primeiras 2 subCategorias (pré banner)
            $primeirasCategorias = $subCategorias->slice(0, 2);
            // Pegando as últimas 2 subCategorias (pós banner)
            $ultimasCategorias = $subCategorias->slice(2);
        @endphp

        @foreach ($primeirasCategorias as $subCategoriaUm)
            <!-- Verifica se há produtos relacionados - se houver, lista a categoria e seus produtos - isso evita que imprima subCategorias vazias -->
            @if ($subCategoriaUm->produtos->isNotEmpty())
                <div class="titulos">
                    <span class="fs-5 fw-semibold"
                        style="display: block">{{ $subCategoriaUm->titulo_sub_categoria }}</span>
                    <span class="descCategoria" style="display: block">{{ $subCategoriaUm->descricao }} </span>
                </div>

                <div class="listaProdutos">
                    @foreach ($subCategoriaUm->produtos as $produto)
                    @dd($produto->id)
                        <div class="produto">

                            <a href="{{ route('site.produto', ['id' => $produto->id]) }}">
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

        <div class="banner owl-carousel owl-theme mb-4 mt-4">

            <div class="img-banner">
                <img src="img/banner-certo.png" alt="">
            </div>

            <div class="img-banner">
                <img src="img/peca-o-seu3.png" alt="">
            </div>

            <div class="img-banner">
                <img src="img/banner 3.png" alt="">
            </div>

        </div>

        @foreach ($ultimasCategorias as $subCategoriaDois)
            <!-- Verifica se há produtos relacionados - se houver, lista a categoria e seus produtos - isso evita que imprima subCategorias vazias -->
            @if ($subCategoriaDois->produtos->isNotEmpty())
                <div class="titulos">
                    <span class="fs-5 fw-semibold"
                        style="display: block">{{ $subCategoriaDois->titulo_sub_categoria }}</span>
                    <span class="descCategoria" style="display: block">{{ $subCategoriaDois->descricao }} </span>
                </div>

                <div class="listaProdutos">
                    @foreach ($subCategoriaDois->produtos as $produto)
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

        <div class="titulos">
            <span class="subtitulo" style="display: block">Clientes</span>
            <span class="fs-5 fw-semibold" style="display: block">O que os clientes dizem?</span>
            {{-- <span class="descCategoria" style="display: block">{{ $subCategoriaUm->descricao }} </span> --}}
        </div>

        <div class="avaliacoes">
            <div class="d-flex owl-carousel mb-2">
                {{-- border: 1px solid #d8d8d8 --}}
                <div class="opiniaoUsuario bg-white p-3 rounded-2 item shadow-sm"
                    style="font-family: 'Poppins',sans-serif; width:26.5vw; height: 40vh">
                    <div>
                        <div class="imgNomeData d-flex">
                            <img src="{{ asset('img/xj6.png') }}" alt="" srcset="" class="rounded-circle"
                                style="width: 4vw">

                            {{-- por conta da div pai ser flex, não consigo deixa-los block sem ter outra div agrupando-os --}}
                            <div class="ms-2">
                                <span class="d-block" style="font-weight: 600">Enzo Gamer W7m</span>
                                <span class="d-block" style="color:#716b6b; font-size: 0.8em">28-09-2024</span>
                            </div>
                        </div>

                        <div class="estrelas mb-1 mt-2">
                            <i class="fa-solid fa-star "
                                style="color: #FFD43B; font-size: 1.1em; margin-right: 0.1rem"></i>
                            <i class="fa-solid fa-star "
                                style="color: #FFD43B; font-size: 1.1em; margin-right: 0.1rem"></i>
                            <i class="fa-solid fa-star "
                                style="color: #FFD43B; font-size: 1.1em; margin-right: 0.1rem"></i>
                            <i class="fa-solid fa-star "
                                style="color: #FFD43B; font-size: 1.1em; margin-right: 0.1rem"></i>
                            <i class="fa-solid fa-star "
                                style="color: #FFD43B; font-size: 1.1em; margin-right: 0.1rem"></i>


                            {{-- <i class="fa-solid fa-star me-1" style="color: #FFD43B; font-size: 1.3em"></i> --}}
                        </div>

                        <div id="comentario">
                            <span class="d-block" style="font-size: 0.8em">Atendimento espetacular, vim de outro
                                “profissional” que não deu a atenção
                                necessária, fui
                                atendido pelo Alessandro que além de corrigir meu corte de cabelo</span>
                        </div>
                    </div>
                </div>

                <div class="opiniaoUsuario bg-white p-3 rounded-2 item shadow-sm"
                    style="font-family: 'Poppins',sans-serif; width:26.5vw; height: 40vh">
                    <div>
                        <div class="imgNomeData d-flex">
                            <img src="{{ asset('img/xj6.png') }}" alt="" srcset="" class="rounded-circle"
                                style="width: 4vw">

                            {{-- por conta da div pai ser flex, não consigo deixa-los block sem ter outra div agrupando-os --}}
                            <div class="ms-2">
                                <span class="d-block" style="font-weight: 600">Enzo Gamer W7m</span>
                                <span class="d-block" style="color:#716b6b; font-size: 0.8em">28-09-2024</span>
                            </div>
                        </div>

                        <div class="estrelas mb-1 mt-2">
                            <i class="fa-solid fa-star "
                                style="color: #FFD43B; font-size: 1.1em; margin-right: 0.1rem"></i>
                            <i class="fa-solid fa-star "
                                style="color: #FFD43B; font-size: 1.1em; margin-right: 0.1rem"></i>
                            <i class="fa-solid fa-star "
                                style="color: #FFD43B; font-size: 1.1em; margin-right: 0.1rem"></i>
                            <i class="fa-solid fa-star "
                                style="color: #FFD43B; font-size: 1.1em; margin-right: 0.1rem"></i>
                            <i class="fa-solid fa-star "
                                style="color: #FFD43B; font-size: 1.1em; margin-right: 0.1rem"></i>


                            {{-- <i class="fa-solid fa-star me-1" style="color: #FFD43B; font-size: 1.3em"></i> --}}
                        </div>

                        <div id="comentario">
                            <span class="d-block" style="font-size: 0.8em">Atendimento espetacular, vim de outro
                                “profissional” que não deu a atenção
                                necessária, fui
                                atendido pelo Alessandro que além de corrigir meu corte de cabelo</span>
                        </div>
                    </div>
                </div>

                <div class="opiniaoUsuario bg-white p-3 rounded-2 item shadow-sm"
                    style="font-family: 'Poppins',sans-serif; width:26.5vw; height: 40vh">
                    <div>
                        <div class="imgNomeData d-flex">
                            <img src="{{ asset('img/xj6.png') }}" alt="" srcset="" class="rounded-circle"
                                style="width: 4vw">

                            {{-- por conta da div pai ser flex, não consigo deixa-los block sem ter outra div agrupando-os --}}
                            <div class="ms-2">
                                <span class="d-block" style="font-weight: 600">Enzo Gamer W7m</span>
                                <span class="d-block" style="color:#716b6b; font-size: 0.8em">28-09-2024</span>
                            </div>
                        </div>

                        <div class="estrelas mb-1 mt-2">
                            <i class="fa-solid fa-star "
                                style="color: #FFD43B; font-size: 1.1em; margin-right: 0.1rem"></i>
                            <i class="fa-solid fa-star "
                                style="color: #FFD43B; font-size: 1.1em; margin-right: 0.1rem"></i>
                            <i class="fa-solid fa-star "
                                style="color: #FFD43B; font-size: 1.1em; margin-right: 0.1rem"></i>
                            <i class="fa-solid fa-star "
                                style="color: #FFD43B; font-size: 1.1em; margin-right: 0.1rem"></i>
                            <i class="fa-solid fa-star "
                                style="color: #FFD43B; font-size: 1.1em; margin-right: 0.1rem"></i>


                            {{-- <i class="fa-solid fa-star me-1" style="color: #FFD43B; font-size: 1.3em"></i> --}}
                        </div>

                        <div id="comentario">
                            <span class="d-block" style="font-size: 0.8em">Atendimento espetacular, vim de outro
                                “profissional” que não deu a atenção
                                necessária, fui
                                atendido pelo Alessandro que além de corrigir meu corte de cabelo</span>
                        </div>
                    </div>
                </div>

                <div class="opiniaoUsuario bg-white p-3 rounded-2 item shadow-sm"
                    style="font-family: 'Poppins',sans-serif; width:26.5vw; height: 40vh">
                    <div>
                        <div class="imgNomeData d-flex">
                            <img src="{{ asset('img/xj6.png') }}" alt="" srcset="" class="rounded-circle"
                                style="width: 4vw">

                            {{-- por conta da div pai ser flex, não consigo deixa-los block sem ter outra div agrupando-os --}}
                            <div class="ms-2">
                                <span class="d-block" style="font-weight: 600">Enzo Gamer W7m</span>
                                <span class="d-block" style="color:#716b6b; font-size: 0.8em">28-09-2024</span>
                            </div>
                        </div>

                        <div class="estrelas mb-1 mt-2">
                            <i class="fa-solid fa-star "
                                style="color: #FFD43B; font-size: 1.1em; margin-right: 0.1rem"></i>
                            <i class="fa-solid fa-star "
                                style="color: #FFD43B; font-size: 1.1em; margin-right: 0.1rem"></i>
                            <i class="fa-solid fa-star "
                                style="color: #FFD43B; font-size: 1.1em; margin-right: 0.1rem"></i>
                            <i class="fa-solid fa-star "
                                style="color: #FFD43B; font-size: 1.1em; margin-right: 0.1rem"></i>
                            <i class="fa-solid fa-star "
                                style="color: #FFD43B; font-size: 1.1em; margin-right: 0.1rem"></i>


                            {{-- <i class="fa-solid fa-star me-1" style="color: #FFD43B; font-size: 1.3em"></i> --}}
                        </div>

                        <div id="comentario">
                            <span class="d-block" style="font-size: 0.8em">Atendimento espetacular, vim de outro
                                “profissional” que não deu a atenção
                                necessária, fui
                                atendido pelo Alessandro que além de corrigir meu corte de cabelo</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <style>
            .banner img {
                /* se bugar eu coloco dnv */
                /* width: 100%; */
                height: 100vh;
                border-radius: 5px;
            }

            /* formatando cardapio */
            .containerCardapio .titulos {
                padding-top: 1.5em;
            }

            .itemCardapio {
                /* padding: 20px; */
                width: calc(100% / 1);
                /* caso coloque padding */
                /* width: calc((100% / 1) - 20px); */
            }

            .itemCardapio:hover {
                cursor: pointer;
            }

            .infoCardapio {
                background-color: #7A5232;
                transition: transform 0.5s ease;
                box-shadow: 0 1px 6px #bebcbc;
                margin-left: 1em
            }

            .infoCardapio:hover {
                transform: scale(1.05);
                transition: all linear 200ms;
            }

            .infoCardapio img {
                height: 30vh;
                padding: 0.7em
            }

            .infoCardapio p {
                border-radius: 0.1em;
                padding: 10px 0;
                background-color: #E7E7E7;
                color: #000;
            }
        </style>
    </main>
@endsection
