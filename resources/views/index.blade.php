@extends('layouts.site')

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
    <style>
        body {
            background-color: #F9EED9;
            /* background-color: #ffff; */
        }

        .listaProdutos {
            display: flex;
            justify-content: space-between;
            gap: 25px;
        }

        .titulos {
            padding-bottom: 20px;
        }

        .titulo {
            padding-bottom: 0
        }

        .subtitulo {
            /* color: #CCCCCC; */

            color: #848384
        }

        .descCategoria {
            color: #848384;
            /* color: #ADACAC; */
            /* color: #cccccc; */
            font-weight: 500;
            font-size: 14px;
        }

        .zao {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);

            border-radius: 35px;
            font-family: 'Cabin', sans-serif;
            background-color: #fff;

            padding: 20px;
            height: 410px;

            transition: border-color 0.3s ease-out, background-color 0.3s ease-out, transform 0.3s ease-out;
        }

        .zao:hover {
            border-color: #e9e2e2;
            background-color: #f9f9f9;
            transform: scale(1.02);
        }

        .imgZao {
            /* background-color: #f1f1f1; */
            text-align: center;
            border-radius: 5px;
            padding-top: 15px;
            /* padding-bottom: 5px; */
        }

        .imgZao img {
            width: 230px;
            height: 180px;
        }

        .nomeValorZao {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .nomeZao {
            font-size: 22px
        }

        .precoZao {
            font-size: 16px
        }

        .descricaoZao p {
            word-wrap: break-word;
            width: 80%;
            font-size: 13px;
            margin-top: 5px;
        }

        .agrupaIconeProduto {
            display: flex;
            margin-top: 20px;
        }

        .iconeProduto {
            background-color: #8C6342;
            margin-right: 10px;
            padding: 6px;
            border-radius: 5px;
            cursor: pointer;
        }

        .iconeProduto img {
            width: 35px;
            height: 35px;
        }

        .imgFavoritar img {
            position: relative;
            top: 3px
        }
    </style>

    <section id="lista-cardapio">

        <div class="cardapio">

            <div class="containerCardapio">
                <div class="titulos">

                    <p class="subtitulo">Menu</p>
                    <p class="titulo"> Nosso Cardápio</p>

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
                <p class="titulo">Lanches mais pedidos</p>
                <p class="descCategoria">Each Box Comes With Hummus, Pita Chips & Fattoush Salad.</p>

            </div>

            <div class="listaProdutos">


                <div class="zao">
                    <a href="{{ route('site.produto') }}">
                        <div class="imgZao">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" alt="" srcset="">
                        </div>
                    </a>

                    <div class="nomeValorZao">
                        <h2 class="nomeZao">X-salada</h2>

                        <p class="precoZao">$15.90</p>
                    </div>

                    <div class="descricaoZao">
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

                <div class="zao">
                    <a href="{{ route('site.produto') }}">
                        <div class="imgZao">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" alt="" srcset="">
                        </div>
                    </a>

                    <div class="nomeValorZao">
                        <h2 class="nomeZao">X-salada</h2>

                        <p class="precoZao">$15.90</p>
                    </div>

                    <div class="descricaoZao">
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


                <div class="zao">
                    <a href="{{ route('site.produto') }}">
                        <div class="imgZao">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" alt="" srcset="">
                        </div>
                    </a>

                    <div class="nomeValorZao">
                        <h2 class="nomeZao">X-salada</h2>

                        <p class="precoZao">$15.90</p>
                    </div>

                    <div class="descricaoZao">
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

                <p class="subtitulo">Cardápio</p>
                <p class="titulo">Ofertas Da Semana</p>

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

                    <div class="addCart">
                        <button class="botaoAddCart">Add to Cart</button>
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

                    <div class="addCart">
                        <button class="botaoAddCart">Add to Cart</button>
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

                    <div class="addCart">
                        <button class="botaoAddCart">Add to Cart</button>
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

                <p class="subtitulo">Cardápio</p>
                <p class="titulo">Lançamentos</p>

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

                    <div class="addCart">
                        <button class="botaoAddCart">Add to Cart</button>
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

                    <div class="addCart">
                        <button class="botaoAddCart">Add to Cart</button>
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

                    <div class="addCart">
                        <button class="botaoAddCart">Add to Cart</button>
                    </div>
                </div>
            </div>

        </section>

        <section id="listaClientes">
            <div class="titulos">

                <p class="subtitulo">Clientes</p>
                <p class="titulo">Feedbacks</p>

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
