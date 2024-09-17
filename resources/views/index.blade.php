@extends('layouts.site')

{{-- <link rel="stylesheet" href="{{ asset('css/siteCss/main2.css') }}"> --}}

<style>
    .banner img {
        /* se bugar eu coloco dnv */
        /* width: 100%; */
        height: 100vh;
        border-radius: 5px;
    }

    /* ver se dá p consertar */
    .containerCardapio .titulos {
        padding-top: 15px;
    }

    .titulos {
        font-family: 'Poppins', sans-serif;
    }

    .titulo {
        color: #000;
    }

    .subtitulo {
        color: #848384;
    }
</style>

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

        <div class="cardapio">

            <div class="containerCardapio container">
                <div class="titulos fw-bold p-2">

                    <p class="subtitulo fs-6">Menu</p>
                    {{-- font size 5 e padding top e bottom 0 --}}
                    <p class="fs-5 py-0">Nosso Cardápio</p>

                </div>

                <div class="itensCardapio">

                    <div class="itemCardapio">

                        <div class="infoCardapio">
                            <a href="cardapio.html#listaLanches">
                                <img src="{{ asset('img/hamburguer.webp') }}" alt="">

                                <p>Lanches</p>
                            </a>

                        </div>

                    </div>

                    <div class="itemCardapio">

                        <div class="infoCardapio">

                            <a href="cardapio.html#listaAcompanhamentos">
                                <img src="{{ asset('img/batata-frita.webp') }}" alt="">
                                <p>Acompanhamentos</p>
                            </a>

                        </div>

                    </div>

                    <div class="itemCardapio">

                        <div class="infoCardapio">

                            <a href="cardapio.html#listaBebidas">
                                <img src="{{ asset('img/suco.webp') }}" alt="">
                                <p>Bebidas</p>
                            </a>

                        </div>

                    </div>

                    <div class="itemCardapio">

                        <div class="infoCardapio">

                            <a href="cardapio.html#listaSobremesas">
                                <img src="{{ asset('img/sorveteChocolate.png') }}" alt="">
                            </a>

                            <p>Sobremesas</p>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </section>

    <main class="container">

        <section class="maisPedidos">

            <div class="titulos">

                <p class="subtitulo">Cardápio</p>
                <p class="fs-5 py-0">Lanches mais pedidos</p>
                <p class="descCategoria">Aproveite o melhor dos nossos lanches.</p>

            </div>

            <div class="listaProdutos">

                <div class="produto">
                    <a href="{{ route('site.produto') }}">
                        <div class="imgProduto">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" alt="" srcset="">
                        </div>
                    </a>

                    <div class="nomeValorProduto">
                        <h2 class="nomeProduto">X-salada</h2>

                        <p class="precoProduto">$15.90</p>
                    </div>

                    <div class="descricaoProduto">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula vestibulum
                            ullamcorper vel eget libero.</p>
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

                <div class="produto">
                    <a href="{{ route('site.produto') }}">
                        <div class="imgProduto">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" alt="" srcset="">
                        </div>
                    </a>

                    <div class="nomeValorProduto">
                        <h2 class="nomeProduto">X-salada</h2>

                        <p class="precoProduto">$15.90</p>
                    </div>

                    <div class="descricaoProduto">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula vestibulum
                            ullamcorper vel eget libero.</p>
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

                <div class="produto">
                    <a href="{{ route('site.produto') }}">
                        <div class="imgProduto">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" alt="" srcset="">
                        </div>
                    </a>

                    <div class="nomeValorProduto">
                        <h2 class="nomeProduto">X-salada</h2>

                        <p class="precoProduto">$15.90</p>
                    </div>

                    <div class="descricaoProduto">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula vestibulum
                            ullamcorper vel eget libero.</p>
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

            </div>
        </section>

        <section class="listaOfertasSemana">

            <div class="titulos">

                {{-- <p class="subtitulo">Cardápio</p> --}}
                <p class="fs-5 py-0">Ofertas Da Semana</p>
                <p class="descCategoria">Aproveite o melhor dos nossos lanches.</p>

            </div>

            <div class="listaProdutos">

                <div class="produto">
                    <a href="{{ route('site.produto') }}">
                        <div class="imgProduto">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" alt="" srcset="">
                        </div>
                    </a>

                    <div class="nomeValorProduto">
                        <h2 class="nomeProduto">X-salada</h2>

                        <p class="precoProduto">$15.90</p>
                    </div>

                    <div class="descricaoProduto">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula vestibulum
                            ullamcorper vel eget libero.</p>
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

                <div class="produto">
                    <a href="{{ route('site.produto') }}">
                        <div class="imgProduto">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" alt="" srcset="">
                        </div>
                    </a>

                    <div class="nomeValorProduto">
                        <h2 class="nomeProduto">X-salada</h2>

                        <p class="precoProduto">$15.90</p>
                    </div>

                    <div class="descricaoProduto">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula vestibulum
                            ullamcorper vel eget libero.</p>
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

                <div class="produto">
                    <a href="{{ route('site.produto') }}">
                        <div class="imgProduto">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" alt="" srcset="">
                        </div>
                    </a>

                    <div class="nomeValorProduto">
                        <h2 class="nomeProduto">X-salada</h2>

                        <p class="precoProduto">$15.90</p>
                    </div>

                    <div class="descricaoProduto">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula vestibulum
                            ullamcorper vel eget libero.</p>
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
            </div>

        </section>

        <div class="banner owl-carousel owl-theme">

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

        <section class="listaLancamentos">

            <div class="titulos">

                {{-- <p class="subtitulo">Cardápio</p> --}}
                <p class="fs-5 py-0">Lançamentos</p>
                <p class="descCategoria">Aproveite o melhor dos nossos lanches.</p>

            </div>

            <div class="listaProdutos">

                <div class="produto">
                    <a href="{{ route('site.produto') }}">
                        <div class="imgProduto">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" alt="" srcset="">
                        </div>
                    </a>

                    <div class="nomeValorProduto">
                        <h2 class="nomeProduto">X-salada</h2>

                        <p class="precoProduto">$15.90</p>
                    </div>

                    <div class="descricaoProduto">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula vestibulum
                            ullamcorper vel eget libero.</p>
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

                <div class="produto">
                    <a href="{{ route('site.produto') }}">
                        <div class="imgProduto">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" alt="" srcset="">
                        </div>
                    </a>

                    <div class="nomeValorProduto">
                        <h2 class="nomeProduto">X-salada</h2>

                        <p class="precoProduto">$15.90</p>
                    </div>

                    <div class="descricaoProduto">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula vestibulum
                            ullamcorper vel eget libero.</p>
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

                <div class="produto">
                    <a href="{{ route('site.produto') }}">
                        <div class="imgProduto">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" alt="" srcset="">
                        </div>
                    </a>

                    <div class="nomeValorProduto">
                        <h2 class="nomeProduto">X-salada</h2>

                        <p class="precoProduto">$15.90</p>
                    </div>

                    <div class="descricaoProduto">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula vestibulum
                            ullamcorper vel eget libero.</p>
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
            </div>

        </section>

        <section id="listaClientes">
            <div class="titulos">

                <p class="subtitulo">Clientes</p>
                <p class="fs-5 py-0">Feedbacks</p>

            </div>

            <div class="avaliacoesClientes">
                <div id="clientes">

                    <div class="cliente">

                        <div class="imgCliente">
                            <img src="img/cliente01.png" alt="" srcset="">
                        </div>

                        <div class="infoCliente">
                            <h2 class="nomeCliente">Marilin Lunch</h2>

                            <p class="comentarioCliente">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Explicabo non voluptatem fuga quae repellat ducimus ut nihil iusto eaque nulla
                                exercitationem nobis molestias quibusdam labore, placeat incidunt, nesciunt, magni
                                error!</p>

                            <div class="notaCliente">
                                <img src="img/icon-star.png" alt="" srcset="" width="30">

                                <img src="img/icon-star.png" alt="" srcset="" width="30">

                                <img src="img/icon-star.png" alt="" srcset="" width="30">

                                <img src="img/icon-star.png" alt="" srcset="" width="30">

                                <img src="img/icon-star.png" alt="" srcset="" width="30">
                            </div>
                        </div>

                    </div>

                    <div class="cliente">

                        <div class="imgCliente">
                            <img src="img/cliente01.png" alt="" srcset="">
                        </div>

                        <div class="infoCliente">
                            <h2 class="nomeCliente">Marilin Lunch</h2>

                            <p class="comentarioCliente">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Explicabo non voluptatem fuga quae repellat ducimus ut nihil iusto eaque nulla
                                exercitationem nobis molestias quibusdam labore, placeat incidunt, nesciunt, magni
                                error!</p>

                            <div class="notaCliente">
                                <img src="img/icon-star.png" alt="" srcset="">

                                <img src="img/icon-star.png" alt="" srcset="">

                                <img src="img/icon-star.png" alt="" srcset="">

                                <img src="img/icon-star.png" alt="" srcset="">

                                <img src="img/icon-star.png" alt="" srcset="">
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
