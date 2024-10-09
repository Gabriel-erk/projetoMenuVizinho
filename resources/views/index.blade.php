@extends('layouts.site')

<link rel="stylesheet" href="{{ asset('css/siteCss/products.css') }}">
<link rel="stylesheet" href="{{ asset('css/siteCss/titleProducts.css') }}">

@section('conteudo')
    @if (session('sucesso'))
        <script>
            window.onload = function() {
                alert('{{ session('sucesso') }}');
            };
        </script>
    @endif

    @if (session('error'))
        <script>
            window.onload = function() {
                alert('{{ session('error') }}');
            };
        </script>
    @endif

    <style>
        body {
            font-family: 'Poppins', sans-serif
        }

        #rodape {
            margin-top: 0
        }
    </style>

    <main>
        <!-- Seção principal -->
        <div class="d-flex justify-content-around" style="background-color: var(--cor-primaria);">
            <div class="me-5" style="color: var(--cor-secundaria); width: 30%">
                <span class="d-block fs-1 fw-bold">Nós Convidamos você ao nosso restaurante</span>
                <span class="d-block mb-5">Com pães macios, molhos especiais e acompanhamentos crocantes.</span>
                <a href="{{ route('site.cardapio') }}" class="text-decoration-none px-4 rounded-5 fw-bold"
                    style="padding-top: 0.8rem; padding-bottom: 0.8rem; color: var(--cor-primaria); background-color: var(--cor-secundaria)">Ver
                    opções</a>
            </div>

            <div class="mb-3">
                <img src="{{ asset('img/img-index.png') }}" alt="" srcset="">
            </div>
        </div>

        <!-- Seção sobre nós -->
        <div class="d-flex pt-5 pb-5 px-5 justify-content-evenly"
            style="background-color: var(--cor-secundaria); color:var(cor-quartenaria)">
            <div style="width: 35%">
                <span class="d-block fw-semibold">Sobre nós</span>
                <span class="d-block fs-2 fw-bold mb-3">Bem vindo ao Mr.Burger</span>
                <span class="d-block mb-3" style="font-weight: 500;">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore ipsum saepe voluptatum. Eos laboriosam
                    aperiam enim neque autem a, dolorem facilis est hic dignissimos! Nihil quibusdam quod nulla deleniti
                    nisi!
                </span>
                <span class="d-block mb-3" style="font-weight: 500;">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore ipsum saepe voluptatum. Eos laboriosam
                    aperiam enim neque autem a, dolorem facilis est hic dignissimos! Nihil quibusdam quod nulla deleniti
                    nisi!
                </span>
                <span class="d-block mb-3" style="font-weight: 500;">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore ipsum saepe voluptatum. Eos laboriosam
                    aperiam enim neque autem a, dolorem facilis est hic dignissimos! Nihil quibusdam quod nulla deleniti
                    nisi!
                </span>
                <span class="d-block mb-3" style="font-weight: 500;">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore ipsum saepe voluptatum. Eos laboriosam
                    aperiam enim neque autem a, dolorem.
                </span>
            </div>

            <div class="d-flex">
                <img src="{{ asset('img/room-index.jpg') }}" alt="" class="me-3"
                    style="width: 25vw; height: 75vh; margin-top:8rem">
                <img src="{{ asset('img/chef-index.jpg') }}" alt="" class="d-block"
                    style="width: 25vw; height: 75vh; align-self: flex-start;">
            </div>
        </div>

        <!-- Seção Pratos Populares -->
        <div class="py-5" style="color: var(--cor-secundaria); background-color: var(--cor-primaria)">
            <div class="text-center mb-5">
                <span class="d-block fs-2 fw-semibold">Pratos populares</span>
                {{-- largura maxima de 600px, se ultrapassar essa largura o word-wrap quebra a frase, mandando p linha debaixo, margin centraliza horizontalmente se a largura for menor q a largura máxima --}}
                <span class="d-block" style="max-width: 600px; word-wrap: break-word; margin: 0 auto;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula vestibulum ullamcorper
                    vel eget libero.
                </span>
            </div>

            <div class="d-flex justify-content-evenly">
                <div class="text-center">
                    <img src="{{ asset('img/testez.jpg') }}" alt="" class="rounded-circle mb-2" style="width: 20vw">
                    <span class="d-block fw-bold fs-5">MR.KING</span>
                    <span class="d-block" style="max-width: 250px; word-wrap: break-word; margin: 0 auto;">Lorem ipsum dolor
                        sit amet, consectetur adipiscing elit.</span>
                </div>

                <div class="text-center">
                    <img src="{{ asset('img/testez.jpg') }}" alt="" class="rounded-circle mb-2" style="width: 20vw">
                    <span class="d-block fw-bold fs-5">MR.KING</span>
                    <span class="d-block" style="max-width: 250px; word-wrap: break-word; margin: 0 auto;">Lorem ipsum dolor
                        sit amet, consectetur adipiscing elit.</span>
                </div>

                <div class="text-center">
                    <img src="{{ asset('img/testez.jpg') }}" alt="" class="rounded-circle mb-2"
                        style="width: 20vw">
                    <span class="d-block fw-bold fs-5">MR.KING</span>
                    <span class="d-block" style="max-width: 250px; word-wrap: break-word; margin: 0 auto;">Lorem ipsum dolor
                        sit amet, consectetur adipiscing elit.</span>
                </div>
            </div>
        </div>

        {{-- Seção Comida Para Todos --}}
        <div class="d-flex py-5"
            style="background-color: var(--cor-secundaria); padding-left: 4.5rem; padding-right: 4.5rem">
            <div class="me-5">
                <img src="{{ asset('img/anotherLuch.png') }}" alt="" style="width: 45vw; height: 55vh">
            </div>

            <div>
                <span class="d-block fs-2 fw-bold" style="color: var(--cor-terciaria)">Comida saudável e fresca para
                    você</span>
                <span class="d-block mb-5" style="color: var(cor-quartenaria); font-weight:500">Lorem ipsum dolor sit amet
                    consectetur adipisicing elit. Recusandae corrupti quos quidem ipsam quisquam facere officiis deserunt
                    dolorem, exercitationem ipsum obcaecati perspiciatis, eos molestiae corporis, doloribus laborum eaque
                    sint id.</span>

                <a href="{{ route('site.cardapio') }}" class="fw-bold text-decoration-none rounded-3"
                    style="color: var(--cor-secundaria); background-color: var(--cor-primaria); padding-top: 0.6rem; padding-bottom: 0.6rem; padding-left: 2rem; padding-right: 2rem">Ver
                    Tudo</a>
            </div>
        </div>

        {{-- Seção o que nossos clientes dizem --}}
        <div class="avaliacoes pt-5 px-5" style="background-color: var(--cor-primaria);">
            <span class="d-block fs-2 fw-bold" style="width:30%; color: var(--cor-secundaria);">O que nossos clientes
                dizem?</span>

            {{-- owl-carousel --}}
            <div class="d-flex justify-content-around h-100" style="margin-top: 5rem">
                {{-- deixando a posição da div pai relativa, para poder manipular a imagem dentro dela com posição absoluta (terá sua posição absoluta em relação a div pai) --}}
                <div class="text-center px-4 py-2 bg-white rounded-4 item"
                    style="position: relative; width: 23vw; height: 36%; border: 6px solid var(--cor-secundaria)">

                    <div style="position: absolute; top: -60px; left: 50%; transform: translateX(-50%);">
                        {{-- left e transform centralizam a imagem horizontalmente em relação a div pai --}}
                        <img src="{{ asset('img/kendrickCLiente.jpg') }}" alt="" class="rounded-circle"
                            style="width: 8vw;">
                    </div>

                    <span class="d-block mb-3" style="margin-top: 8.5vh; font-size: 1.1em">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Perferendis
                        quo expedita tempore. Explicabo quod, possimus, velit praesentium.</span>
                    <span class="d-block mb-1">-Eric tchola dms</span>

                    <div class="d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-star me-1" style="color: #ffd12c; font-size: 1.3rem"></i>
                        <span class="d-block" style="color:#909090">5/5</span>
                    </div>
                </div>

                <div class="text-center px-4 py-2 bg-white rounded-4 item"
                    style="position: relative; width: 23vw; height: 36%; border: 6px solid var(--cor-secundaria)">

                    <div style="position: absolute; top: -60px; left: 50%; transform: translateX(-50%);">
                        {{-- left e transform centralizam a imagem horizontalmente em relação a div pai --}}
                        <img src="{{ asset('img/kendrickCLiente.jpg') }}" alt="" class="rounded-circle"
                            style="width: 8vw;">
                    </div>

                    <span class="d-block mb-3" style="margin-top: 8.5vh; font-size: 1.1em">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Perferendis
                        quo expedita tempore. Explicabo quod, possimus, velit praesentium.</span>
                    <span class="d-block mb-1">-Eric tchola dms</span>

                    <div class="d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-star me-1" style="color: #ffd12c; font-size: 1.3rem"></i>
                        <span class="d-block" style="color:#909090">5/5</span>
                    </div>
                </div>

                <div class="text-center px-4 py-2 bg-white rounded-4 item"
                    style="position: relative; width: 23vw; height: 36%; border: 6px solid var(--cor-secundaria)">

                    <div style="position: absolute; top: -60px; left: 50%; transform: translateX(-50%);">
                        {{-- left e transform centralizam a imagem horizontalmente em relação a div pai --}}
                        <img src="{{ asset('img/kendrickCLiente.jpg') }}" alt="" class="rounded-circle"
                            style="width: 8vw;">
                    </div>

                    <span class="d-block mb-3" style="margin-top: 8.5vh; font-size: 1.1em">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Perferendis
                        quo expedita tempore. Explicabo quod, possimus, velit praesentium.</span>
                    <span class="d-block mb-1">-Eric tchola dms</span>

                    <div class="d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-star me-1" style="color: #ffd12c; font-size: 1.3rem"></i>
                        <span class="d-block" style="color:#909090">5/5</span>
                    </div>
                </div>
            </div>  
        </div>
    </main>
@endsection
