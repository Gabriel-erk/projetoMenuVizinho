@extends('layouts.site')

@section('conteudo')
    <style>
        body {
            background-color: #fff;
        }
    </style>
    <main class="px-4 pt-4" style="font-family: 'Poppins', sans-serif">
        <section id="pedidos">
            <h1>Meus Pedidos</h1>
            <p style="color: #7a7979" class="fw-normal">Dom, 04 agosto 2024</p>

            <div id="pedido">
                <div id="imgInfoPedido" class="d-flex">
                    <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" class="w-25" alt="" srcset="">

                    <span class="bg-secondary d-flex justify-content-center align-items-center text-white rounded" style="width: 1.8vw; height: 4.0vh">1</span>

                    <p  class="" style="color:#7a7979">MRS. King Extra Bacon</p>
                </div>
            </div>
        </section>
    </main>
@endsection
