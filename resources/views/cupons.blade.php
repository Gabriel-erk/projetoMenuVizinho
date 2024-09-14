@extends('layouts.site')
<link rel="stylesheet" href="{{ asset('css/siteCss/cupom.css') }}">

@section('conteudo')
    <main>

        <div class="containerCupons">
            <div class="cupon">
                <div class="imgTextoCupon">

                    <div class="imgCupon">
                        <img src="{{ asset('img/cupom.webp') }}" alt="">
                    </div>

                    <div class="textoCupon">
                        <h2>R$15 para nossos novos lançamentos</h2>
                        <p>Válido para pedidos em algum dos nossos novos lançamentos</p>
                    </div>

                </div>

                <div class="regrasDuracaoCupon">
                    <a href="{{ route('site.regraCupon') }}">Regras</a>
                    <p>Acaba em 5h</p>
                </div>

            </div>

            <div class="cupon">
                <div class="imgTextoCupon">

                    <div class="imgCupon">
                        <img src="{{ asset('img/cupom.webp') }}" alt="">
                    </div>

                    <div class="textoCupon">
                        <h2>R$15 para nossos novos lançamentos</h2>
                        <p>Válido para pedidos em algum dos nossos novos lançamentos</p>
                    </div>

                </div>

                <div class="regrasDuracaoCupon">
                    <a href="{{ route('site.regraCupon') }}">Regras</a>
                    <p>Acaba em 5h</p>
                </div>

            </div>

            <div class="cupon">
                <div class="imgTextoCupon">

                    <div class="imgCupon">
                        <img src="{{ asset('img/cupom.webp') }}" alt="">
                    </div>

                    <div class="textoCupon">
                        <h2>R$15 para nossos novos lançamentos</h2>
                        <p>Válido para pedidos em algum dos nossos novos lançamentos</p>
                    </div>

                </div>

                <div class="regrasDuracaoCupon">
                    <a href="{{ route('site.regraCupon') }}">Regras</a>
                    <p>Acaba em 5h</p>
                </div>

            </div>

            <div class="cupon">
                <div class="imgTextoCupon">

                    <div class="imgCupon">
                        <img src="{{ asset('img/cupom.webp') }}" alt="">
                    </div>

                    <div class="textoCupon">
                        <h2>R$15 para nossos novos lançamentos</h2>
                        <p>Válido para pedidos em algum dos nossos novos lançamentos</p>
                    </div>

                </div>

                <div class="regrasDuracaoCupon">
                    <a href="{{ route('site.regraCupon') }}">Regras</a>
                    <p>Acaba em 5h</p>
                </div>

            </div>

            <div class="cupon">
                <div class="imgTextoCupon">

                    <div class="imgCupon">
                        <img src="{{ asset('img/cupom.webp') }}" alt="">
                    </div>

                    <div class="textoCupon">
                        <h2>R$15 para nossos novos lançamentos</h2>
                        <p>Válido para pedidos em algum dos nossos novos lançamentos</p>
                    </div>

                </div>

                <div class="regrasDuracaoCupon">
                    <a href="{{ route('site.regraCupon') }}">Regras</a>
                    <p>Acaba em 5h</p>
                </div>

            </div>
            

        </div>
    </main>
@endsection
