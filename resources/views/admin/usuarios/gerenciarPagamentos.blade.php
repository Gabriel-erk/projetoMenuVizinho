@extends('layouts.site')

@section('conteudo')
    <style>
        body {
            background-color: #fff;
            font-family: 'Poppins', sans-serif;
        }

        /* botão voltar */
        #botaoAlterarSalvar a:first-child {
            /* Aplica o outline no primeiro link "Voltar" */
            outline: 1px solid var(--cor-primaria);
            color: var(--cor-primaria);
        }

        #botaoAlterarSalvar a:first-child:hover {
            /* Aplica um outro estilo no segundo link "Adicionar método de pagamento" */
            background-color: var(--cor-primaria);
            color: #fff;
            outline: none;
        }

        /* botão adicionar método pagamento */
        #botaoAlterarSalvar a:nth-child(2) {
            /* Aplica um outro estilo no segundo link "Adicionar método de pagamento" */
            background-color: var(--cor-primaria);
            color: #fff;
        }

        #botaoAlterarSalvar a:nth-child(2):hover {
            /* Aplica um outro estilo no segundo link "Adicionar método de pagamento" */
            background-color: var(--cor-terciaria);
        }

        .payment,
        #botaoAlterarSalvar a:first-child,
        #botaoAlterarSalvar a:nth-child(2) {
            transition: all 0.3s ease;
        }

        .payment:hover {
            background-color: #f3f3f3;
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
                <span style="color: #716b6b">Adicione ou gerencie métodos de pagamento associados à sua Conta da xxxxxx. Veja
                    nossa <a href="{{ route('loja.politica') }}">Política
                        de privacidade</a></span>
            </div>
        </div>
    </div>

    <div class="mb-4" style="border-bottom: 1px solid #c9c9c9"></div>

    <div class="container">

        <div class="w-100">
            {{-- justify-content-between --}}
            <div class="d-flex align-items-center">
                <span class="py-3 fs-3" style="font-weight: 500">Meus cartões</span>
                {{-- <img src="{{ asset('img/lock.png') }}" alt="" style="width: 2.5vw; height: 5vh"> --}}
            </div>

            <div>
                @foreach ($metodosPagamentos as $metodoPagamento)
                    <div class="payment d-flex justify-content-between align-items-center mb-2 rounded-4 py-4 ps-2 pe-3"
                        style="background-color: #f8f8f8; border: 1px solid #ccc">
                        <div class="d-flex align-items-center">
                            <div class="imgPayment d-flex rounded-circle"
                                style="background-color: #202020;padding: 1rem 0.6rem">
                                <img src="{{ asset('img/bandeiraCartao.png') }}" alt="" style="width: 3vw">
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="ms-1"
                                    style="color:#000; font-weight:500;">••{{ substr($metodoPagamento->numero_cartao, -4) }}</span>
                                <span class="ms-2"
                                    style="color: #716b6b; font-weight:500;">{{ \Carbon\Carbon::parse($metodoPagamento->data_vencimento)->format('m/Y') }}</span>
                            </div>
                        </div>
                        <a href="{{ route('usuario.editarPagamentos', ['id' => $metodoPagamento->id]) }}"
                            class="pt-1 text-decoration-none" style="color: var(--cor-primaria);">Alterar</a>
                    </div>
                @endforeach
            </div>

            <div id="botaoAlterarSalvar" class="d-flex justify-content-between mt-5">

                <a href="{{ route('usuario.minhaConta') }}" class="me-1 text-decoration-none p-2 rounded-3">
                    Voltar
                </a>

                <a href="{{ route('usuario.novaFormaPagamento') }}" class=" text-decoration-none p-2 rounded-3">
                    Adicionar método de pagamento
                </a>

            </div>
        </div>
    </div>
@endsection
