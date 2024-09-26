@extends('layouts.site')

{{-- <link rel="stylesheet" href="./css/carrinho2.css"> --}}
<link rel="stylesheet" href="{{ asset('css/siteCss/carrinho2.css') }}">

<!-- adicionando fonte 4 (Titan One) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Signika+Negative:wght@300..700&family=Titan+One&display=swap"
    rel="stylesheet">

<!-- adicionando fonte 5 (baloo bhai) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@400..800&display=swap" rel="stylesheet">

@section('conteudo')
    <style>
        body {
            background-color: #F3F3F3;
        }

        #limpaCarrinho {
            /* caso queira voltar */
            /* right: 35px; */

            transition: transform 0.5s ease;
        }

        #limpaCarrinho:hover {
            cursor: pointer;
            transform: scale(1.02);
            transition: all linear 200ms;

            color: #F9EED9;
        }

        /* icones */
        .fa-solid:hover {
            cursor: pointer;
        }

        /* produto lista aproveite também - da p refazer com bootstrap */
        .produtoListaAproveiteTambem {
            background-color: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.06);
            border-radius: 7px;
            font-family: 'Cabin', sans-serif;
            padding: 5%;
            height: 80%;
            width: 23vw;

            margin-top: 2rem;
            margin-bottom: 5rem;
            margin-left: 2rem;
            transition: border-color 0.3s ease-out, background-color 0.3s ease-out, transform 0.3s ease-out;
        }

        .produtoListaAproveiteTambem:hover {
            border-color: #e9e2e2;
            background-color: #f9f9f9;
            transform: scale(1.02);
        }

        #botaoAlterar,
        #botaoAdicionar {
            color: #8C6342;
            transition: transform 0.5s ease;
        }

        #botaoAlterar:hover,
        #botaoAdicionar:hover {
            color: #643c1c;
            transition: all linear 200ms;
        }

        .finaliza button {
            transition: transform 0.5s ease;
        }

        .finaliza button:hover {
            cursor: pointer;
            transform: scale(1.05);
            transition: all linear 200ms;
        }
    </style>
    <main>
        {{-- antes: .listaCarrinho --}}
        <div style="background-color: #f9eed9">

            <button id="limpaCarrinho" class="rounded mt-2 position-absolute"
                style="font-family: 'Cabin', sans-serif; background-color:#8C6342; color:#ffffff; border:none; padding: 0.5em 1.9em; right:2em">Limpar</button>

            <div class="d-flex align-items-center pb-3">
                <img src="./img/cheeseburguer.png" style="height: 23vh; width: 15vw">

                <div class="ps-2">
                    <h2 class="fs-2" style="color:#8C6342; font-family: 'Titan One', sans-serif; fw-normal">Mrs. King
                        Cheddar Extra</h2>
                    <p class="fw-normal" style="color: #979797; font-family:'Signika Negative', sans-serif;">Um hambúrguer
                        com duas carnes bovinas grelhad...</p>
                    <p class="fw-semibold fs-3" style="font-family: 'Poppins', sans-serif;">R$ 39,99</p>
                </div>

                <div style="width: 30%; font-family:'Poppins',sans-serif">
                    <div class="d-flex justify-content-between align-items-center py-1 px-2"
                        style="margin-left: 40%; width: 9vw; background-color: #d9d9d9; border-radius: 12px">
                        <i class="fa-solid fa-minus" style="color: #8C6342;"></i>
                        <strong>0</strong>
                        <i class="fa-solid fa-plus" style="color: #8C6342;"></i>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center pb-3">
                <img src="./img/cheeseburguer.png" style="height: 23vh; width: 15vw">

                <div class="ps-2">
                    <h2 class="fs-2" style="color:#8C6342; font-family: 'Titan One', sans-serif; fw-normal">Mrs. King
                        Cheddar Extra</h2>
                    <p class="fw-normal" style="color: #979797; font-family:'Signika Negative', sans-serif;">Um hambúrguer
                        com duas carnes bovinas grelhad...</p>
                    <p class="fw-semibold fs-3" style="font-family: 'Poppins', sans-serif;">R$ 39,99</p>
                </div>

                <div style="width: 30%; font-family:'Poppins',sans-serif">
                    <div class="d-flex justify-content-between align-items-center py-1 px-2"
                        style="margin-left: 40%; width: 9vw; background-color: #d9d9d9; border-radius: 12px">
                        <i class="fa-solid fa-minus" style="color: #8C6342;"></i>
                        <strong>0</strong>
                        <i class="fa-solid fa-plus" style="color: #8C6342;"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="aproveiteTambem" style="border-top: 2px solid #ccc; border-bottom: 2px solid #ccc">
            <h2 class="fw-medium ps-3 pt-3" style="font-family: 'Poppins', sans-serif;">Aproveite Também</h2>
            <div class="d-flex owl-carousel">

                <div class="produtoListaAproveiteTambem item">
                    <div class="imgProdutoAproveiteTambem position-relative">

                        <a href="{{ route('site.produto') }}">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" class="p-3"
                                style="height: 58%">
                        </a>

                        <div class="position-absolute rounded-circle"
                            style="bottom: 0.4rem; right: 1rem; padding: 0.75rem 0.95rem; background-color: #8c6342">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </div>
                    </div>

                    <div class="informacoesProdutoAproveiteTambem">
                        <div class="tituloValorAproveiteTambem d-flex justify-content-between mt-3">
                            <h3 class="fs-5">Combo Mrs.Duplo Cheddar</h3>
                            <span class="fs-6">$15.90</span>
                        </div>

                        <div>
                            <span class="mt-2 text-break" style="width: 70%">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Sed nec velit eu ligula
                                vestibulum ullamcorper vel eget libero.</span>
                        </div>
                    </div>
                </div>

                <div class="produtoListaAproveiteTambem item">
                    <div class="imgProdutoAproveiteTambem position-relative">

                        <a href="{{ route('site.produto') }}">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" class="p-3"
                                style="height: 58%">
                        </a>

                        <div class="position-absolute rounded-circle"
                            style="bottom: 0.4rem; right: 1rem; padding: 0.75rem 0.95rem; background-color: #8c6342">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </div>
                    </div>

                    <div class="informacoesProdutoAproveiteTambem">
                        <div class="tituloValorAproveiteTambem d-flex justify-content-between mt-3">
                            <h3 class="fs-5">Combo Mrs.Duplo Cheddar</h3>
                            <span class="fs-6">$15.90</span>
                        </div>

                        <div>
                            <span class="mt-2 text-break" style="width: 70%">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Sed nec velit eu ligula
                                vestibulum ullamcorper vel eget libero.</span>
                        </div>
                    </div>
                </div>

                <div class="produtoListaAproveiteTambem item">
                    <div class="imgProdutoAproveiteTambem position-relative">

                        <a href="{{ route('site.produto') }}">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" class="p-3"
                                style="height: 58%">
                        </a>

                        <div class="position-absolute rounded-circle"
                            style="bottom: 0.4rem; right: 1rem; padding: 0.75rem 0.95rem; background-color: #8c6342">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </div>
                    </div>

                    <div class="informacoesProdutoAproveiteTambem">
                        <div class="tituloValorAproveiteTambem d-flex justify-content-between mt-3">
                            <h3 class="fs-5">Combo Mrs.Duplo Cheddar</h3>
                            <span class="fs-6">$15.90</span>
                        </div>

                        <div>
                            <span class="mt-2 text-break" style="width: 70%">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Sed nec velit eu ligula
                                vestibulum ullamcorper vel eget libero.</span>
                        </div>
                    </div>
                </div>

                <div class="produtoListaAproveiteTambem item">
                    <div class="imgProdutoAproveiteTambem position-relative">

                        <a href="{{ route('site.produto') }}">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" class="p-3"
                                style="height: 58%">
                        </a>

                        <div class="position-absolute rounded-circle"
                            style="bottom: 0.4rem; right: 1rem; padding: 0.75rem 0.95rem; background-color: #8c6342">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </div>
                    </div>

                    <div class="informacoesProdutoAproveiteTambem">
                        <div class="tituloValorAproveiteTambem d-flex justify-content-between mt-3">
                            <h3 class="fs-5">Combo Mrs.Duplo Cheddar</h3>
                            <span class="fs-6">$15.90</span>
                        </div>

                        <div>
                            <span class="mt-2 text-break" style="width: 70%">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Sed nec velit eu ligula
                                vestibulum ullamcorper vel eget libero.</span>
                        </div>
                    </div>
                </div>

                <div class="produtoListaAproveiteTambem item">
                    <div class="imgProdutoAproveiteTambem position-relative">

                        <a href="{{ route('site.produto') }}">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" class="p-3"
                                style="height: 58%">
                        </a>

                        <div class="position-absolute rounded-circle"
                            style="bottom: 0.4rem; right: 1rem; padding: 0.75rem 0.95rem; background-color: #8c6342">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </div>
                    </div>

                    <div class="informacoesProdutoAproveiteTambem">
                        <div class="tituloValorAproveiteTambem d-flex justify-content-between mt-3">
                            <h3 class="fs-5">Combo Mrs.Duplo Cheddar</h3>
                            <span class="fs-6">$15.90</span>
                        </div>

                        <div>
                            <span class="mt-2 text-break" style="width: 70%">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Sed nec velit eu ligula
                                vestibulum ullamcorper vel eget libero.</span>
                        </div>
                    </div>
                </div>

                <div class="produtoListaAproveiteTambem item">
                    <div class="imgProdutoAproveiteTambem position-relative">

                        <a href="{{ route('site.produto') }}">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" class="p-3"
                                style="height: 58%">
                        </a>

                        <div class="position-absolute rounded-circle"
                            style="bottom: 0.4rem; right: 1rem; padding: 0.75rem 0.95rem; background-color: #8c6342">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </div>
                    </div>

                    <div class="informacoesProdutoAproveiteTambem">
                        <div class="tituloValorAproveiteTambem d-flex justify-content-between mt-3">
                            <h3 class="fs-5">Combo Mrs.Duplo Cheddar</h3>
                            <span class="fs-6">$15.90</span>
                        </div>

                        <div>
                            <span class="mt-2 text-break" style="width: 70%">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Sed nec velit eu ligula
                                vestibulum ullamcorper vel eget libero.</span>
                        </div>
                    </div>
                </div>

                <div class="produtoListaAproveiteTambem item">
                    <div class="imgProdutoAproveiteTambem position-relative">

                        <a href="{{ route('site.produto') }}">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" class="p-3"
                                style="height: 58%">
                        </a>

                        <div class="position-absolute rounded-circle"
                            style="bottom: 0.4rem; right: 1rem; padding: 0.75rem 0.95rem; background-color: #8c6342">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </div>
                    </div>

                    <div class="informacoesProdutoAproveiteTambem">
                        <div class="tituloValorAproveiteTambem d-flex justify-content-between mt-3">
                            <h3 class="fs-5">Combo Mrs.Duplo Cheddar</h3>
                            <span class="fs-6">$15.90</span>
                        </div>

                        <div>
                            <span class="mt-2 text-break" style="width: 70%">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Sed nec velit eu ligula
                                vestibulum ullamcorper vel eget libero.</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="pagamento-e-cupom py-4 px-4"
            style="font-family: 'Poppins', sans-serif; border-bottom: 2px solid #ccc">
            <h3 class="mb-4">Pagamento pelo site</h3>
            <div class="pagamento d-flex align-items-center justify-content-between mb-2">

                <div class="d-flex">

                    <div class="rounded-circle text-center d-flex justify-content-center align-items-center"
                        style="background-color: #202020; height:10vh; width:5vw">
                        <img src="{{ asset('img/bandeiraCartao.png') }}" style="height: 5vh">
                        {{-- <img src="./img/credit-card.png" style="height: 7vh"> --}}
                    </div>

                    <div class="ms-2">
                        <h4>Crédito</h4>
                        <p style="color:#9b9999" class="fw-semibold">Mastercard ****5090</p>
                    </div>

                </div>

                <a href="#" id="botaoAlterar" class="fw-bold text-decoration-none">Alterar</a>
            </div>

            <div class="cupom pagamento d-flex align-items-center justify-content-between mb-2">

                <div class="d-flex">

                    <div class="rounded-circle text-center d-flex justify-content-center align-items-center"
                        style="background-color: #202020; height:10vh; width:5vw">
                        <img src="./img/cupom-carrinho.png" style="height: 7vh">
                    </div>

                    <div class="ms-2">
                        <h4>Cupom</h4>
                        <p style="color:#9b9999" class="fw-semibold">3 cupons disponiveis para compra</p>
                    </div>

                </div>

                <button id="botaoAdicionar" class="fw-bold" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Adicionar</button>
            </div>
        </div>

        <div class="fw-normal py-4 px-4" style="font-family: 'Poppins', sans-serif;">
            <h2>Resumo dos valores</h2>
            {{-- se der vontade, esse comando: color:#9b9999 --}}
            <span class="d-block pb-1">- Taxa de entrega: R$ 50,90</span>
            <span class="d-block">- Cupom Aplicado: R$ -50,90</span>
            <h3 class="fw-semibold" style="margin-top: 2%; color: #9B9999; ">Total: R$ 20,90</h3>

            <div class="text-center" style="margin-top: 8%">
                <button class="fw-bold d-inline-block text-white rounded-3"
                    style="font-family: 'Poppins', sans-serif; font-size: 1.1em; background-color:#8C6342; border: none; padding: 1rem 3rem">Finalizar
                    Compra</button>
            </div>
        </div>
    </main>
@endsection

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cupons</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
