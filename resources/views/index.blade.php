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

    /* formatando as classes titulos, subtitulo e titulo */
    .titulos {
        font-family: 'Poppins', sans-serif;
        /* padding-top: 1.5em; */
    }

    .titulo {
        color: #000;
    }

    .subtitulo {
        color: #848384;
        font-weight: 600
    }

    .descCategoria {
        color: #848384;
        font-size: 1em;
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
        border-radius: 10px;
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

    .container {
        margin-top: 3rem
    }

    /* produtos */

    .listaProdutos {
        display: flex;
        justify-content: space-between;
        gap: 1.5em;
    }

    .produto {
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);

        border-radius: 2.2rem;
        font-family: 'Cabin', sans-serif;
        background-color: #fff;

        padding: 1.3em;
        height: 68vh;

        transition: border-color 0.3s ease-out, background-color 0.3s ease-out, transform 0.3s ease-out;
    }

    .produto:hover {
        border-color: #e9e2e2;
        background-color: #f9f9f9;
        transform: scale(1.02);
    }

    .imgProduto {
        text-align: center;
        padding-top: 0.4em;
    }

    .imgProduto img {
        width: 19vw;
        height: 30vh;
    }

    .nomeValorProduto {
        display: flex;
        justify-content: space-between;
        margin-top: 1em;
    }

    .nomeProduto {
        font-size: 1.44em
    }

    .precoProduto {
        font-size: 1em;
    }

    .descricaoProduto p {
        word-wrap: break-word;
        width: 80%;
        font-size: 0.85em;
        margin-top: 5px;
    }

    .agrupaIconeProduto {
        display: flex;
        margin-top: 1rem;
    }

    .iconeProduto {
        background-color: #8C6342;
        margin-right: 0.5em;
        padding: 0.39em;
        border-radius: 5px;
        cursor: pointer;
    }

    .iconeProduto img {
        width: 2.8vw;
        height: 6.2vh;
    }

    .imgFavoritar img {
        position: relative;
        top: 3px
    }

    /* formatando seção de avaliação de clientes */

    .cliente {
        width: 30vw;
        margin-right: 6rem;
    }

    .imgCliente img {
        background-color: #848384;
        width: 8vw;
        border-radius: 50%;
        padding-top: 0.5rem;
    }

    .infoCliente {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
    }

    .comentarioCliente {
        word-wrap: break-word;
        color: #ADACAC;
    }

    .notaCliente img {
        width: 2.2vw;

        margin-top: 0.7em;
        margin-right: 0.9em;
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

        {{-- bg-light w-100 h-25 mt-5 --}}
        <div class="cardapio bg-light mt-5" style="height: 58vh">

            <div class="containerCardapio container">
                <div class="titulos fw-bold p-2">

                    <p class="subtitulo fs-7 pb-0">Menu</p>
                    {{-- font size 5 e padding top e bottom 0 --}}
                    <p class="fs-5 py-0 fw-semibold">Nosso Cardápio</p>

                </div>

                <div class="itensCardapio d-flex text-center justify-content-between"
                    style="font-family: 'Cabin', sans-serif">

                    <div class="itemCardapio">

                        <div class="infoCardapio">
                            <a href="cardapio.html#listaLanches" class="text-decoration-none">
                                <img src="{{ asset('img/hamburguer.webp') }}" alt="">

                                <p>Lanches</p>
                            </a>

                        </div>

                    </div>

                    <div class="itemCardapio">

                        <div class="infoCardapio">

                            <a href="cardapio.html#listaAcompanhamentos" class="text-decoration-none">
                                <img src="{{ asset('img/batata-frita.webp') }}" alt="">
                                <p>Acompanhamentos</p>
                            </a>

                        </div>

                    </div>

                    <div class="itemCardapio">

                        <div class="infoCardapio">

                            <a href="cardapio.html#listaBebidas" class="text-decoration-none">
                                <img src="{{ asset('img/suco.webp') }}" alt="">
                                <p>Bebidas</p>
                            </a>

                        </div>

                    </div>

                    <div class="itemCardapio">

                        <div class="infoCardapio">

                            <a href="cardapio.html#listaSobremesas" class="text-decoration-none">
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

        <section class="maisPedidos mb-4">

            <div class="titulos">

                <p class="subtitulo">Cardápio</p>
                <p class="fs-5 py-0 fw-semibold">Lanches mais pedidos</p>
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

        <section class="listaOfertasSemana mb-4">

            <div class="titulos">

                {{-- <p class="subtitulo">Cardápio</p> --}}
                <p class="fs-5 py-0 fs-5 py-0 fw-semibold">Ofertas Da Semana</p>
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

        <div class="banner owl-carousel owl-theme mb-4">

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

        <section class="listaLancamentos mb-4">

            <div class="titulos">

                {{-- <p class="subtitulo">Cardápio</p> --}}
                <p class="fs-5 py-0 fs-5 py-0 fw-semibold">Lançamentos</p>
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
                <p class="fs-5 py-0 fs-5 py-0 fw-semibold">Feedbacks</p>

            </div>

            <div class="avaliacoesClientes">
                <div class="d-flex container">

                    <div class="cliente">

                        <div class="imgCliente">
                            <img src="img/cliente01.png" alt="" srcset="" style="">
                        </div>

                        <div class="infoCliente">
                            <h2 class="nomeCliente">Marilin Lunch</h2>

                            <p class="comentarioCliente">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Explicabo non voluptatem fuga quae repellat ducimus ut nihil iusto eaque nulla
                                exercitationem nobis molestias quibusdam labore, placeat incidunt, nesciunt, magni
                                error!</p>

                            <div class="notaCliente">
                                <img src="{{ asset('img/icon-star.png') }}" alt="" srcset="">

                                <img src="{{ asset('img/icon-star.png') }}" alt="" srcset="">

                                <img src="{{ asset('img/icon-star.png') }}" alt="" srcset="">

                                <img src="{{ asset('img/icon-star.png') }}" alt="" srcset="">

                                <img src="{{ asset('img/icon-star.png') }}" alt="" srcset="">
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
