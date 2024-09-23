@extends('layouts.site')

<link rel="stylesheet" href="{{ asset('css/siteCss/products.css') }}">

@section('banner')
    <div class="banner owl-carousel owl-theme">
        <div class="img-banner">
            <img src="img/banner-oferta.png" alt="">
        </div>

        <div class="img-banner">
            <img src="img/banner 3.png" alt="">
        </div>
    </div>
@endsection

@section('conteudo')

    <main class="container">
        <section class="mt-5">

            <div class="listaProdutos pb-4">

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

            <div class="listaProdutos pb-4">

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

            <div class="listaProdutos pb-4">

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
    </main>
@endsection
