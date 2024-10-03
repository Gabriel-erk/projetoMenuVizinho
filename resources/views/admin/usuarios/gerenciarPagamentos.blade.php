@extends('layouts.site')

@section('conteudo')
    <link rel="stylesheet" href="{{ asset('css/tituloEditUser.css') }}">

    <style>
        body {
            background-color: #fff;
            font-family: 'Poppins', sans-serif;
        }

        .tituloEditUser a {
            color: #2056E2;
        }

        .payment {
            transition: all 0.3s ease;
        }

        .payment:hover {
            background-color: #f3f3f3;
        }

        .btn-outline-primary a:hover {
            color: #fff
        }
    </style>

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

    <div class="container">
        <div class="row">
            <div class="col-12 my-4">
                <h2>Gerenciar pagamentos</h2>
                <span style="color: #716b6b">Adicione ou gerencie métodos de pagamento associados à sua Conta da xxxxxx. Veja nossa <a
                    href="{{ route('site.politica') }}">Política
                    de privacidade</a></span>
            </div>
        </div>
    </div>

    <div class="mb-4" style="border-bottom: 1px solid #c9c9c9"></div>

    <div class="container">

        <div class="w-100">
            <div class="d-flex align-items-center justify-content-between">
                <span class="py-3 fs-3" style="font-weight: 500">Meus cartões</span>
                <img src="{{ asset('img/lock.png') }}" alt="" style="width: 2.5vw; height: 5vh">
            </div>

            <div>
                @foreach ($metodosPagamentos as $metodoPagamento)
                    <div class="payment d-flex justify-content-between align-items-center mb-2 rounded-4 py-4 ps-2 pe-3"
                        style="background-color: #f8f8f8; border: 1px solid #ccc">
                        <div class="d-flex align-items-center">
                            <div class="imgPayment d-flex rounded-circle" style="background-color: #202020;padding: 1rem 0.6rem">
                                <img src="{{ asset('img/bandeiraCartao.png') }}" alt="" style="width: 3vw">
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="ms-1" style="color:#000; font-weight:500;">••{{ substr($metodoPagamento->numero_cartao, -4) }}</span>
                                <span class="ms-2" style="color: #716b6b; font-weight:500;">{{ \Carbon\Carbon::parse($metodoPagamento->data_vencimento)->format('m/Y') }}</span>
                            </div>
                        </div>
                        <a href="{{ route('usuario.editarPagamentos', ['id' => $metodoPagamento->id]) }}"
                            class="pt-1 text-decoration-none" style="color: #2056E2;">Alterar</a>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-start mt-5">
                <div class="me-1">
                    <button class="btn btn-outline-primary">
                        <a href="{{ route('usuario.minhaConta') }}" class="text-decoration-none">Voltar</a>
                    </button>
                </div>
                <div>
                    <button class="btn btn-primary">
                        <a href="{{ route('usuario.novaFormaPagamento') }}" class="text-white text-decoration-none">
                            Adicionar método de pagamento
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection