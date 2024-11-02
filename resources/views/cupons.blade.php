@extends('layouts.site')

<style>
    .cupon {
        transition: background-color ease 0.3s;
    }

    .cupon:hover {
        background-color: #f7f7f1;
    }
</style>

@section('conteudo')
    <main style="font-family: 'Poppins', sans-serif">


        @if ($cupons->isNotEmpty())
            @foreach ($cupons as $cupom)
                <div class="px-4 mt-3">
                    <div class="cupon bg-light rounded p-4 shadow mb-4">
                        <div class="d-flex">

                            <div class="me-3">
                                <img src="{{ asset('img/cupom-carrinho.png') }}" alt="" style="max-width: 4.5em">
                            </div>

                            <div class="pt-1">
                                <h2 class="fw-semibold" style="color: #8c6342">{{ $cupom->nome_cupom }}</h2>
                                <p>{{ $cupom->descricao_cupom }}</p>
                            </div>

                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('loja.regras') }}" class="text-decoration-none"
                                style="color:#8c6342">Regras</a>
                            <p>Acaba em 5h</p>
                        </div>

                    </div>
                </div>
            @endforeach
        @else
            <style>
                #rodape {
                    margin-top: 0;
                }
            </style>
            <div class="d-flex justify-content-center align-items-center h-50 ">
                <h2>Você não possui cupons dísponiveis</h2>
            </div>
        @endif

    </main>
@endsection
