@extends('layouts.site')
<link rel="stylesheet" href="{{ asset('css/siteCss/cupom.css') }}">

<style>
    .cupon {
        /* caso mude de ideia */
        /* border-radius: 20px; */
        /* padding: 20px;  */

        transition: background-color ease 0.3s;
    }

    .cupon:hover {
        background-color: #f7f7f1;
        /* cursor: pointer; */
    }
</style>

@section('conteudo')
    <main style="font-family: 'Poppins', sans-serif">

        <div class="px-4 mt-3">
            <div class="cupon bg-light rounded p-4 shadow mb-4">
                <div class="d-flex">

                    <div class="me-3">
                        <img src="{{ asset('img/cupom.webp') }}" alt="" style="max-width: 4.5em">
                    </div>

                    <div class="pt-1">
                        <h2 class="fw-semibold" style="color: #8c6342">R$15 para nossos novos lançamentos</h2>
                        <p>Válido para pedidos em algum dos nossos novos lançamentos</p>
                    </div>

                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('site.regraCupon') }}" class="text-decoration-none" style="color:#8c6342">Regras</a>
                    <p>Acaba em 5h</p>
                </div>

            </div>
        </div>

        <div class="px-4 mt-3">
            <div class="cupon bg-light rounded p-4 shadow mb-4">
                <div class="d-flex">

                    <div class="me-3">
                        <img src="{{ asset('img/cupom.webp') }}" alt="" style="max-width: 4.5em">
                    </div>

                    <div class="pt-1">
                        <h2 class="fw-semibold" style="color: #8c6342">R$15 para nossos novos lançamentos</h2>
                        <p>Válido para pedidos em algum dos nossos novos lançamentos</p>
                    </div>

                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('site.regraCupon') }}" class="text-decoration-none" style="color:#8c6342">Regras</a>
                    <p>Acaba em 5h</p>
                </div>

            </div>
        </div>

        <div class="px-4 mt-3">
            <div class="cupon bg-light rounded p-4 shadow mb-4">
                <div class="d-flex">

                    <div class="me-3">
                        <img src="{{ asset('img/cupom.webp') }}" alt="" style="max-width: 4.5em">
                    </div>

                    <div class="pt-1">
                        <h2 class="fw-semibold" style="color: #8c6342">R$15 para nossos novos lançamentos</h2>
                        <p>Válido para pedidos em algum dos nossos novos lançamentos</p>
                    </div>

                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('site.regraCupon') }}" class="text-decoration-none" style="color:#8c6342">Regras</a>
                    <p>Acaba em 5h</p>
                </div>

            </div>
        </div>

        <div class="px-4 mt-3">
            <div class="cupon bg-light rounded p-4 shadow mb-4">
                <div class="d-flex">

                    <div class="me-3">
                        <img src="{{ asset('img/cupom.webp') }}" alt="" style="max-width: 4.5em">
                    </div>

                    <div class="pt-1">
                        <h2 class="fw-semibold" style="color: #8c6342">R$15 para nossos novos lançamentos</h2>
                        <p>Válido para pedidos em algum dos nossos novos lançamentos</p>
                    </div>

                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('site.regraCupon') }}" class="text-decoration-none" style="color:#8c6342">Regras</a>
                    <p>Acaba em 5h</p>
                </div>

            </div>
        </div>

        <div class="px-4 mt-3">
            <div class="cupon bg-light rounded p-4 shadow mb-4">
                <div class="d-flex">

                    <div class="me-3">
                        <img src="{{ asset('img/cupom.webp') }}" alt="" style="max-width: 4.5em">
                    </div>

                    <div class="pt-1">
                        <h2 class="fw-semibold" style="color: #8c6342">R$15 para nossos novos lançamentos</h2>
                        <p>Válido para pedidos em algum dos nossos novos lançamentos</p>
                    </div>

                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('site.regraCupon') }}" class="text-decoration-none" style="color:#8c6342">Regras</a>
                    <p>Acaba em 5h</p>
                </div>

            </div>
        </div>
    </main>
@endsection
