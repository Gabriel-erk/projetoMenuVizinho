@extends('layouts.site')

@section('conteudo')
    <style>
        body {
            background-color: #fff;
        }

        .botaoSuporteDetalhes:hover {
            background-color: #eeeded;
            cursor: pointer;
        }
    </style>
    <main class="px-4 pt-4" style="font-family: 'Poppins', sans-serif">
        <section id="pedidos">
            <h1 class="pb-3">Meus Pedidos</h1>

            <div id="pedido" class="pb-4">
                <span style="color: #7a7979" class="fw-normal">Dom, 04 agosto 2024</span>
                <div id="organiza-pedido" class="bg-light rounded shadow-sm" style="border: 1px solid #ccc">
                    <div id="imgInfoPedido" class="d-flex pt-2 pb-3 px-2" style="border-bottom: 1px solid #ccc">
                        <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}"
                            style="width: 12vw; background-color:#FBE7CA" class="p-2 rounded" alt="" srcset="">

                        <div class="d-flex align-items-center">
                            <span
                                class="ms-3 bg-secondary d-flex justify-content-center align-items-center text-white rounded"
                                style="width: 1.8vw; height: 4.0vh">1</span>
                            <span class="ps-2" style="color:#7a7979">MRS. King Extra Bacon</span>
                        </div>
                    </div>

                    <div class="mt-3 fw-semibold pb-3">
                        <span class="px-2 d-block">Pedido concluído</span>
                        <span class="px-2 d-block">Total: R$ 200,00</span>
                    </div>

                    <div class="d-flex text-center" style="border-top: 1px solid #ccc">

                        <div class="botaoSuporteDetalhes w-50 py-3" style="border-right: 1px solid #ccc">
                            <span style="color: #8C6342">Suporte</span>
                        </div>

                        <div class="botaoSuporteDetalhes w-50 py-3">
                            <span style="color: #8C6342">Detalhes</span>
                        </div>
                    </div>

                </div>

            </div>

            <div id="pedido" class="pb-4">
                <span style="color: #7a7979" class="fw-normal">Dom, 04 agosto 2024</span>
                <div id="organiza-pedido" class="bg-light rounded shadow-sm" style="border: 1px solid #ccc">
                    <div id="imgInfoPedido" class="d-flex pt-2 pb-3 px-2" style="border-bottom: 1px solid #ccc">
                        <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}"
                            style="width: 12vw; background-color:#FBE7CA" class="p-2 rounded" alt="" srcset="">

                        <div class="d-flex align-items-center">
                            <span
                                class="ms-3 bg-secondary d-flex justify-content-center align-items-center text-white rounded"
                                style="width: 1.8vw; height: 4.0vh">1</span>
                            <span class="ps-2" style="color:#7a7979">MRS. King Extra Bacon</span>
                        </div>
                    </div>

                    <div class="mt-3 fw-semibold pb-3">
                        <span class="px-2 d-block">Pedido concluído</span>
                        <span class="px-2 d-block">Mr.burger</span>
                    </div>

                    <div class="d-flex text-center" style="border-top: 1px solid #ccc">

                        <div class="botaoSuporteDetalhes w-50 py-3" style="border-right: 1px solid #ccc">
                            <span style="color: #8C6342">Suporte</span>
                        </div>

                        <div class="botaoSuporteDetalhes w-50 py-3">
                            <span style="color: #8C6342">Detalhes</span>
                        </div>
                    </div>

                </div>

            </div>

            <div id="pedido" class="pb-4">
                <span style="color: #7a7979" class="fw-normal">Dom, 04 agosto 2024</span>
                <div id="organiza-pedido" class="bg-light rounded shadow-sm" style="border: 1px solid #ccc">
                    <div id="imgInfoPedido" class="d-flex pt-2 pb-3 px-2" style="border-bottom: 1px solid #ccc">
                        <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}"
                            style="width: 12vw; background-color:#FBE7CA" class="p-2 rounded" alt="" srcset="">

                        <div class="d-flex align-items-center">
                            <span
                                class="ms-3 bg-secondary d-flex justify-content-center align-items-center text-white rounded"
                                style="width: 1.8vw; height: 4.0vh">1</span>
                            <span class="ps-2" style="color:#7a7979">MRS. King Extra Bacon</span>
                        </div>
                    </div>

                    <div class="mt-3 fw-semibold pb-3">
                        <span class="px-2 d-block">Pedido concluído</span>
                        <span class="px-2 d-block">Mr.burger</span>
                    </div>

                    <div class="d-flex text-center" style="border-top: 1px solid #ccc">

                        <div class="botaoSuporteDetalhes w-50 py-3" style="border-right: 1px solid #ccc">
                            <span style="color: #8C6342">Suporte</span>
                        </div>

                        <div class="botaoSuporteDetalhes w-50 py-3">
                            <span style="color: #8C6342">Detalhes</span>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </main>
@endsection
