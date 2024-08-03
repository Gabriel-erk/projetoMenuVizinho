@extends('layouts.site')

@section('conteudo')
    <main>
        <style>

            body {
                font-family: 'Poppins', sans-serif;
            }

            /* formatação da caixa pai do cupon */
            
            .containerCupons {
                padding: 30px
            }

            /* formatação do cupon  */

            .cupon {
                background-color:#fff;
                border-radius: 20px;
                padding: 20px; 

                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adiciona uma sombra ao elemento */
                transition: background-color ease 0.3s;

                margin-bottom: 20px
            }

            .cupon:hover {
                background-color: #f7f7f1;
                cursor: pointer;
            }

            /* formatando texto e imagem do cupon */

            .imgTextoCupon {
                display: flex;
            }

            .imgTextoCupon img {
                max-width: 70px;
            }

            .imgCupon {
                margin-right: 10px
            }

            .textoCupon {
                padding-top: 4px;
            }

            .textoCupon h2 {
               font-weight: 500;
               color:#8C6342;     
            }

            /* formatação de regras e duração do cupon */

            .regrasDuracaoCupon {
                display: flex;
                justify-content: space-between;

                /* margin-top: 15px  */
            }

            .regrasDuracaoCupon a {
                color: #8C6342
            }

            #rodape {
                margin-top: 0;
            }
        </style>

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
