@extends('layouts.site')
<link rel="stylesheet" href="{{ asset('css/parceirosCss/cadastroBanner.css') }}">

@section('conteudo')
    <main>

        <div class="tituloDesc">
            <h1>Banners do Restaurante</h1>
            <p>banners que aparecerão na tela inicial e combos (1096x650)</p>
        </div>

        <div class="agrupaBanner ">

            <div class="tituloBanner">
                <h2>Banners -<span> Ínicio</span></h2>
            </div>

            <div class="owl-carousel">

                <div class="banner">

                    <div class="fundoBanner">
                        <button type="submit" class="botaoImg"><i class="fa-solid fa-plus"
                                style="color: #000000;"></i></button>
                    </div>

                </div>

                <div class="banner">

                    <div class="fundoBanner">
                        <button type="submit" class="botaoImg"><i class="fa-solid fa-plus"
                                style="color: #000000;"></i></button>
                    </div>

                </div>

                <div class="banner">

                    <div class="fundoBanner">
                        <button type="submit" class="botaoImg"><i class="fa-solid fa-plus"
                                style="color: #000000;"></i></button>
                    </div>

                </div>

            </div>

        </div>

        <div class="agrupaBanner ">

            <div class="tituloBanner">
                <h2>Banners -<span> Combos</span></h2>
            </div>

            <div class="owl-carousel">

                <div class="banner">

                    <div class="fundoBanner">
                        <button type="submit" class="botaoImg"><i class="fa-solid fa-plus"
                                style="color: #000000;"></i></button>
                    </div>

                </div>

                <div class="banner">

                    <div class="fundoBanner">
                        <button type="submit" class="botaoImg"><i class="fa-solid fa-plus"
                                style="color: #000000;"></i></button>
                    </div>

                </div>

                <div class="banner">

                    <div class="fundoBanner">
                        <button type="submit" class="botaoImg"><i class="fa-solid fa-plus"
                                style="color: #000000;"></i></button>
                    </div>

                </div>

            </div>

        </div>

        <div class="agrupaBotoes">

            <div class="botoes">

                <a href="cadastroRestaurante">Voltar</a>

            </div>

            <div class="botoes">

                <a href="#">Salvar</a>

            </div>

        </div>

    </main>
@endsection
