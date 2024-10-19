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

        @media (min-width: 768px) and (max-width: 1366px) {

            /* principal */
            .texto-sec-principal {
                width: 30%;
            }

            .titulo-principal {
                font-size: 2.2rem
            }

            .botao-opcoes-principal {
                padding-top: 0.8rem;
                padding-bottom: 0.8rem;
                padding-left: 1rem;
                padding-right: 1rem
            }

            /* sobre nos */
            .titulo-sobre-nos,
            .titulo-para-todos,
            .titulo-populares {
                font-size: 2rem
            }

            .texto-sobre-nos {
                width: 35%;
            }

            .img-sobre-nos img {
                width: 25vw;
                height: 75vh;
            }

            /* populares */

            .sec-populares{
                padding-top: 2rem;
                padding-bottom: 3.5rem;
            }
            .img-populares {
                width: 20vw
            }

            .desc-populares {
                max-width: 600px;
            }

            .desc-prod-populares {
                max-width: 250px;
            }

            /* comida para todos */
            .texto-para-todos {
                width: 80%
            }

            .titulo-para-todos {
                font-size: 1.9rem
            }

            .desc-para-todos {
                font-size: 1.1rem;
                font-weight: 500;
            }

            .botao-para-todos {
                padding-top: 0.6rem;
                padding-bottom: 0.6rem;
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (min-width: 1367px) {
            .texto-sec-principal {
                width: 32%;
            }

            .titulo-principal {
                font-size: 2.5rem
            }

            .desc-principal {
                font-size: 1.5rem;
                font-weight: 400
            }

            .botao-opcoes-principal {
                padding-top: 1.1rem;
                padding-bottom: 1.1rem;
                padding-left: 1.4rem;
                padding-right: 1.4rem;
                font-size: 1.3rem
            }

            .img-principal {
                width: 35vw;
                height: 39vh;
            }

            /* sobre nós */
            .texto-sobre-nos {
                width: 35%;
            }

            .subtitulo-sobre-nos {
                font-size: 1.3rem
            }

            .titulo-sobre-nos,
            .titulo-populares {
                font-size: 2.3rem
            }

            .img-sobre-nos img {
                width: 25vw;
                height: 80vh;
            }

            .desc-sobre-nos {
                font-size: 1.5rem;
                font-weight: 400
            }

            /* pratos populares */
            .sec-populares {
                padding-top: 3rem;
                padding-bottom: 4rem; 
            }

            .desc-populares {
                font-size: 1.1rem;
                max-width: 700px;
            }

            .img-populares {
                width: 22vw;
            }

            .titulo-prod-populares {
                font-size: 1.5rem
            }

            .desc-prod-populares {
                font-size: 1.1rem;
                max-width: 390px;
            }

            /* comida para todos */
            .texto-para-todos {
                width: 95%
            }

            .titulo-para-todos {
                font-size: 2.5rem
            }

            .desc-para-todos {
                font-size: 1.5rem;
                width: 80%
            }

            .botao-para-todos {
                font-size: 1.5rem;
                padding-top: 0.8rem;
                padding-bottom: 0.8rem;
                padding-left: 2.2rem;
                padding-right: 2.2rem
            }
        }
    </style>

    <main>
        <!-- Seção principal -->
        <div class="d-flex justify-content-around" style="background-color: var(--cor-primaria);">
            <div class="me-5 texto-sec-principal" style="color: var(--cor-secundaria);">
                <span class="d-block fw-bold titulo-principal">Nós Convidamos você ao nosso restaurante</span>
                <span class="d-block mb-5 desc-principal">Com pães macios, molhos especiais e acompanhamentos
                    crocantes.</span>
                <a href="{{ route('site.cardapio') }}" class="botao-opcoes-principal text-decoration-none rounded-5 fw-bold"
                    style="color: var(--cor-primaria); background-color: var(--cor-secundaria)">Ver
                    opções</a>
            </div>

            <div class="mb-3">
                <img src="{{ asset('img/img-index.png') }}" class="img-principal" alt="" srcset="">
            </div>
        </div>

        <!-- Seção sobre nós -->
        <div class="d-flex pt-5 pb-5 px-5 justify-content-evenly"
            style="background-color: var(--cor-secundaria); color:var(cor-quartenaria)">
            <div class="texto-sobre-nos">
                <span class="d-block fw-semibold subtitulo-sobre-nos">Sobre nós</span>
                <span class="d-block fw-bold mb-3 titulo-sobre-nos">Bem vindo ao Mr.Burger</span>
                <span class="d-block mb-3 desc-sobre-nos">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore ipsum saepe voluptatum. Eos laboriosam
                    aperiam enim neque autem a, dolorem facilis est hic dignissimos! Nihil quibusdam quod nulla deleniti
                    nisi!
                </span>
                <span class="d-block mb-3 desc-sobre-nos">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore ipsum saepe voluptatum. Eos laboriosam
                    aperiam enim neque autem a, dolorem facilis est hic dignissimos! Nihil quibusdam quod nulla deleniti
                    nisi!
                </span>
                <span class="d-block mb-3 desc-sobre-nos">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore ipsum saepe voluptatum. Eos laboriosam
                    aperiam enim neque autem a, dolorem facilis est hic dignissimos! Nihil quibusdam quod nulla deleniti
                    nisi!
                </span>
                <span class="d-block mb-3 desc-sobre-nos">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore ipsum saepe voluptatum. Eos laboriosam
                    aperiam enim neque autem a, dolorem.
                </span>
            </div>

            <div class="img-sobre-nos d-flex">
                <img src="{{ asset('img/room-index.jpg') }}" alt="" class="me-3" style="margin-top:8rem">
                <img src="{{ asset('img/chef-index.jpg') }}" alt="" class="d-block" style="align-self: flex-start;">
            </div>
        </div>

        <!-- Seção Pratos Populares -->
        <div class="sec-populares" style="color: var(--cor-secundaria); background-color: var(--cor-primaria)">
            <div class="text-center mb-5">
                <span class="d-block fw-semibold titulo-populares">Pratos populares</span>
                {{-- largura maxima de 600px, se ultrapassar essa largura o word-wrap quebra a frase, mandando p linha debaixo, margin centraliza horizontalmente se a largura for menor q a largura máxima --}}
                <span class="d-block desc-populares" style="word-wrap: break-word; margin: 0 auto;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula vestibulum ullamcorper
                    vel eget libero.
                </span>
            </div>

            <div class="d-flex justify-content-evenly">
                <div class="text-center">
                    <img src="{{ asset('img/testez.jpg') }}" alt="" class="rounded-circle mb-2 img-populares">
                    <span class="d-block fw-bold titulo-prod-populares">MR.KING</span>
                    <span class="d-block desc-prod-populares" style="word-wrap: break-word; margin: 0 auto;">Lorem ipsum dolor
                        sit amet, consectetur adipiscing elit.</span>
                </div>

                <div class="text-center">
                    <img src="{{ asset('img/testez.jpg') }}" alt="" class="rounded-circle mb-2 img-populares">
                    <span class="d-block fw-bold titulo-prod-populares">MR.KING</span>
                    <span class="d-block desc-prod-populares" style="word-wrap: break-word; margin: 0 auto;">Lorem ipsum dolor
                        sit amet, consectetur adipiscing elit.</span>
                </div>

                <div class="text-center">
                    <img src="{{ asset('img/testez.jpg') }}" alt="" class="rounded-circle mb-2 img-populares">
                    <span class="d-block fw-bold titulo-prod-populares">MR.KING</span>
                    <span class="d-block desc-prod-populares" style="word-wrap: break-word; margin: 0 auto;">Lorem ipsum dolor
                        sit amet, consectetur adipiscing elit.</span>
                </div>

                
            </div>
        </div>

        {{-- Seção Comida Para Todos--}}
        <div class="d-flex"
            style="background-color: var(--cor-secundaria);">
            {{-- me-2 --}}
            <div class="">
                <img src="{{ asset('img/meal.jpg') }}" alt=""
                    style="width: 50vw;
                height: 80vh">
                {{-- <img src="{{ asset('img/anotherLuch.png') }}" alt="" style="width: 45vw; height: 55vh"> --}}
            </div>

            <div class="ms-4 d-flex align-items-center">
                <div class="texto-para-todos">
                    <span class="d-block fw-bold titulo-para-todos" style="color: var(--cor-primaria)">Comida saudável e
                        fresca para
                        você</span>
                    <span class="d-block mb-5 desc-para-todos" style="color: var(cor-quartenaria);">Lorem ipsum dolor sit amet
                        consectetur adipisicing elit. Recusandae corrupti quos quidem ipsam quisquam facere officiis deserunt
                        dolorem, exercitationem ipsum obcaecati perspiciatis, eos molestiae corporis, doloribus laborum eaque
                        sint id.</span>
    
                    <a href="{{ route('site.cardapio') }}" class="botao-para-todos fw-bold text-decoration-none rounded-3"
                        style="color: var(--cor-secundaria); background-color: var(--cor-primaria);">Ver
                        Tudo</a>
                </div>
            </div>
        </div>

        <style>
            @media (min-width: 768px) and (max-width: 1366px) {
                .clientes {
                    height: 50%;
                }

                .cliente {
                    height: 80%;
                    width: 23vw;
                    /* alterar */
                    padding-left: 1rem;
                    padding-right: 1rem
                }

                .cliente-desc,
                .nome-cliente {
                    font-size: 1.1em
                }

                .icone-estrela {
                    font-size: 1.3rem;
                }

                .nota-cliente {
                    font-size: 1.1rem
                }
            }

            @media (min-width: 1367px) {
                .clientes {
                    height: 40%;
                }

                .cliente {
                    height: 80%;
                    width: 26vw;
                    padding-left: 1rem;
                    padding-right: 1rem
                }

                .cliente-desc,
                .nome-cliente {
                    font-size: 1.3em
                }

                .icone-estrela {
                    font-size: 1.5rem
                }

                .nota-cliente {
                    font-size: 1.2rem
                }
            }
        </style>

        {{-- Seção o que nossos clientes dizem --}}
        <div class="avaliacoes pt-5 px-5" style="background-color: var(--cor-primaria);">
            <span class="d-block fs-2 fw-bold" style="width:30%; color: var(--cor-secundaria);">O que nossos clientes
                dizem?</span>

            {{-- owl-carousel --}}
            <div class="clientes d-flex justify-content-around" style="margin-top: 5rem">
                {{-- deixando a posição da div pai relativa, para poder manipular a imagem dentro dela com posição absoluta (terá sua posição absoluta em relação a div pai) --}}
                <div class="cliente text-center py-2 bg-white rounded-4 item"
                    style="position: relative; border: 6px solid var(--cor-secundaria)">

                    <div style="position: absolute; top: -60px; left: 50%; transform: translateX(-50%);">
                        {{-- left e transform centralizam a imagem horizontalmente em relação a div pai --}}
                        <img src="{{ asset('img/kendrickCLiente.jpg') }}" alt="" class="rounded-circle"
                            style="width: 8vw;">
                    </div>

                    <span class="d-block mb-3 cliente-desc" style="margin-top: 8.5vh;">Lorem ipsum dolor, sit amet
                        consectetur adipisicing elit.

                        quo expedita tempore.</span>
                    <span class="d-block mb-1 nome-cliente">-Eric tchola dms</span>

                    <div class="d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-star me-1 icone-estrela" style="color: #ffd12c;"></i>
                        <span class="d-block nota-cliente" style="color:#909090">5/5</span>
                    </div>
                </div>

                <div class="cliente text-center py-2 bg-white rounded-4 item"
                    style="position: relative; border: 6px solid var(--cor-secundaria)">

                    <div style="position: absolute; top: -60px; left: 50%; transform: translateX(-50%);">
                        {{-- left e transform centralizam a imagem horizontalmente em relação a div pai --}}
                        <img src="{{ asset('img/kendrickCLiente.jpg') }}" alt="" class="rounded-circle"
                            style="width: 8vw;">
                    </div>

                    <span class="d-block mb-3 cliente-desc" style="margin-top: 8.5vh;">Lorem ipsum dolor, sit amet
                        consectetur adipisicing elit.

                        quo expedita tempore.</span>
                    <span class="d-block mb-1 nome-cliente">-Eric tchola dms</span>

                    <div class="d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-star me-1 icone-estrela" style="color: #ffd12c;"></i>
                        <span class="d-block nota-cliente" style="color:#909090">5/5</span>
                    </div>
                </div>

                <div class="cliente text-center py-2 bg-white rounded-4 item"
                    style="position: relative; border: 6px solid var(--cor-secundaria)">

                    <div style="position: absolute; top: -60px; left: 50%; transform: translateX(-50%);">
                        {{-- left e transform centralizam a imagem horizontalmente em relação a div pai --}}
                        <img src="{{ asset('img/kendrickCLiente.jpg') }}" alt="" class="rounded-circle"
                            style="width: 8vw;">
                    </div>

                    <span class="d-block mb-3 cliente-desc" style="margin-top: 8.5vh;">Lorem ipsum dolor, sit amet
                        consectetur adipisicing elit.

                        quo expedita tempore.</span>
                    <span class="d-block mb-1 nome-cliente">-Eric tchola dms</span>

                    <div class="d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-star me-1 icone-estrela" style="color: #ffd12c;"></i>
                        <span class="d-block nota-cliente" style="color:#909090">5/5</span>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection