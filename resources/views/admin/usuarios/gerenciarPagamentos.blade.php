@extends('layouts.site')

@section('conteudo')
    <link rel="stylesheet" href="{{ asset('css/usuariosCss/gerenciarPagamentos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tituloEditUser.css') }}">
    <style>
        body {
            background-color: #fff;
            font-family: 'Poppins', sans-serif;
        }

        .tituloEditUser a {
            color: #2056E2
        }

        .payment {
            transition: all 0.3s ease;
        }

        .payment:hover {
            background-color: #f3f3f3;
        }

        .botaoAdicionar {
            transition: all 0.3s ease;
        }

        .botaoAdicionar:hover {
            background-color: #1e59b3;
        }
    </style>

    @if (session('sucesso'))
        <script>
            // mostra a mensagem depois de carregar o site primeiro
            window.onload = function() {
                alert('{{ session('sucesso') }}');
            };
        </script>
    @endif

    @if (session('error'))
        <script>
            // mostra a mensagem depois de carregar o site primeiro
            window.onload = function() {
                alert('{{ session('error') }}');
            };
        </script>
    @endif

    <div class="tituloEditUser">
        <h2>Gerenciar pagamentos</h2>
        <p>Adicione ou gerencie métodos de pagamento associados à sua Conta da xxxxxx. Veja nossa <a
                href="{{ route('site.politica') }}">Política
                de privacidade</a></p>
        {{-- <p>Veja ou adicione métodos de pagamento na sua conta.</p> --}}
    </div>

    <div>
        {{-- caso mude de ideia width: 530px --}}
        <div class="w-50" style="padding-left: 2rem">
            <div class="d-flex align-items-center justify-content-between">

                <span class="py-3 fs-3" style="font-weight: 500">Meus cartões</span>
                <img src="{{ asset('img/lock.png') }}" alt="" srcset="" style="width: 2.5vw; height: 5vh">
            </div>

            <div class="">

                @foreach ($metodosPagamentos as $metodoPagamento)
                    <div class="payment d-flex justify-content-between align-items-center mb-2 rounded-4 py-4 ps-2 pe-3"
                        style="background-color: #f8f8f8; border: 1px solid #ccc">
                        <div class="d-flex align-items-center">

                            <div class="imgPayment d-flex rounded-circle"
                                style="background-color: #202020;padding: 1rem 0.6rem">
                                <img src="{{ asset('img/bandeiraCartao.png') }}" alt="" style="width: 3vw">
                            </div>

                            <div class="d-flex justify-content-between">
                                {{-- pega os ultimos 4 digitos do cartão --}}
                                <span class="ms-1"
                                    style="color:#000; font-weight:500;">••{{ substr($metodoPagamento->numero_cartao, -4) }}</span>
                                {{-- método que formata a data para mostrar apenas o mes e o ano --}}
                                <span class="ms-2"
                                    style="color: #716b6b; font-weight:500;">{{ \Carbon\Carbon::parse($metodoPagamento->data_vencimento)->format('m/Y') }}</span>
                            </div>
                        </div>

                        {{-- passando o id do cartão já que quero editar/deletar ele --}}
                        <a href="{{ route('usuario.editarPagamentos', ['id' => $metodoPagamento->id]) }}"
                            class="pt-1 text-decoration-none" style="color: #2056E2;">Alterar</a>
                    </div>
                @endforeach

            </div>

            <div class="d-flex justify-content-end mt-4" style="font-family: 'Poppins', sans-serif;">
                <button class="bg-primary rounded-2 p-2" style="border:none;"><a
                        href="{{ route('usuario.novaFormaPagamento') }}" class="text-white text-decoration-none">Adicionar método de
                        pagamento</a></button>
            </div>
        </div>
    </div>
@endsection
