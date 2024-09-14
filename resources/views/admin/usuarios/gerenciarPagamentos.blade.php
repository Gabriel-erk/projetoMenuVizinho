@extends('layouts.site')

@section('conteudo')
    <link rel="stylesheet" href="{{ asset('css/usuariosCss/gerenciarPagamentos.css') }}">
    <style>
        body{
            background-color: #fff
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

    <div class="agrupaPagamentos">

        <div class="blocoPagamentos">
            <div class="agrupaTituloCadeado">

                <p class="tituloPagamentos">Meus cartões</p>
                <img src="{{ asset('img/lock.png') }}" alt="" srcset="">
            </div>

            <div class="meusPagamentos">

                @foreach ($metodosPagamentos as $metodoPagamento)
                    <div class="payment">

                        <div class="logoNome">

                            <div class="imgPayment">
                                <img src="{{ asset('img/bandeiraCartao.png') }}" alt="">
                            </div>

                            <div class="numeroDataCartao">
                                {{-- pega os ultimos 4 digitos do cartão --}}
                                <p style="color:#000">••{{ substr($metodoPagamento->numero_cartao, -4) }}</p>
                                {{-- método que formata a data para mostrar apenas o mes e o ano --}}
                                <p>{{ \Carbon\Carbon::parse($metodoPagamento->data_vencimento)->format('m/Y') }}</p>
                            </div>

                        </div>

                        {{-- passando o id do cartão já que quero editar/deletar ele --}}
                        <a href="{{ route('usuario.editarPagamentos', ['id' => $metodoPagamento->id]) }}">Alterar</a>

                    </div>
                @endforeach

            </div>

            <div class="divDoBotao">
                <button class="botaoAdicionar"><a href="{{ route('usuario.novaFormaPagamento') }}">Adicionar método de
                        pagamento</a></button>
            </div>
        </div>
    </div>
@endsection
