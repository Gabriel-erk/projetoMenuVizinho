@extends('layouts.site')

<link rel="stylesheet" href="{{ asset('css/produtos.css') }}">

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
    <style>
        .listaCombos {
            padding-top: 30px;
        }

        .listaProdutos {
            margin-bottom: 30px;
        }
    </style>

    <main class="container">
        <section class="listaCombos">

            <div class="listaProdutos">

                <div class="produto">

                    <a href="produto.html">
                        <div class="imgProduto">
                            <img src="./img/img-corrigida/mr.bacon.png" alt="" srcset="">
                        </div>
                    </a>

                    <div class="nomeValorProduto">
                        <h2 class="nomeProduto">Mr.Bacon</h2>

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

                    <a href="produto.html">
                        <div class="imgProduto">
                            <img src="./img/img-corrigida/mr-king.png" alt="" srcset="">
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
                    <a href="produto.html">
                        <div class="imgProduto">
                            <img src="./img/img-corrigida/duplo-cheddar.png" alt="" srcset="">
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

            <div class="listaProdutos">

                <div class="produto">

                    <a href="produto.html">
                        <div class="imgProduto">
                            <img src="./img/img-corrigida/duplo-cheddar.png" alt="" srcset="">
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
                    <a href="produto.html">
                        <div class="imgProduto">
                            <img src="./img/img-corrigida/duplo-cheddar.png" alt="" srcset="">
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
                    <a href="produto.html">
                        <div class="imgProduto">
                            <img src="./img/img-corrigida/duplo-cheddar.png" alt="" srcset="">
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

            <div class="listaProdutos">

                <div class="produto">

                    <a href="produto.html">
                        <div class="imgProduto">
                            <img src="./img/img-corrigida/duplo-cheddar.png" alt="" srcset="">
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
                    <a href="produto.html">
                        <div class="imgProduto">
                            <img src="./img/img-corrigida/duplo-cheddar.png" alt="" srcset="">
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
                    <a href="produto.html">
                        <div class="imgProduto">
                            <img src="./img/img-corrigida/duplo-cheddar.png" alt="" srcset="">
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
    </main>
@endsection
