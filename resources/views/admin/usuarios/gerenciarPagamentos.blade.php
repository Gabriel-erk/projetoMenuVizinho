@extends('layouts.site')

@section('conteudo')
    <style>
        body {
            background-color: #fff;
            font-family: 'Poppins', sans-serif;
        }

        .tituloEditUser {

            padding: 30px;
            border-bottom: 1px solid #CCCCCC;

        }

        .tituloEditUser h2 {
            font-weight: 500;
        }

        .tituloEditUser p {
            padding-top: 5px;
            font-size: 0.9rem;
            color: #716B6B;
            /* font-weight: 500; */

            width: 35%
        }

        .tituloEditUser a {
            color: #2056E2
        }

        .blocoPagamentos {
            padding-left: 30px;
            width: 530px;
        }

        .agrupaTituloCadeado {
            display: flex;
            align-items: center;
            justify-content: space-between
        }

        .agrupaTituloCadeado img {
            width: 30px;
            height: 30px
        }

        .tituloPagamentos {
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 25px;
            font-weight: 500
        }

        /* formatando adição de pagamento */
        .adicionarPagamento {

            display: flex;
            justify-content: center;

            padding-bottom: 40px
        }

        .novoPagamento {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 800px;
            height: 60px;
            margin-top: 20px;

            background-color: #F8F8F8;
            border: 1px solid #C5C5C5;
            border-radius: 6px;

            transition: all 0.3s ease;
        }

        .novoPagamento:hover {
            background-color: #f2f4f7;
        }

        .novoPagamento i {
            background-color: #fff;
            padding: 4px;
            border: solid 1px #efefee;
            border-radius: 4px;

            transition: all 0.3s ease;
        }

        .novoPagamento i:hover {
            cursor: pointer;

            background-color: #e9ecef;
        }

        /* formatando pagamentos salvos */
        .payment {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 8px;
            /* width: 500px; */

            background-color: #F8F8F8;
            border: 1px solid #CCCCCC;
            border-radius: 10px;
            transition: all 0.3s ease;

            padding-top: 18px;
            padding-bottom: 18px;

            padding-left: 10px;
            padding-right: 15px;
        }

        .payment:hover {
            background-color: #f3f3f3;
        }

        .payment a {
            color: #2056E2;
            padding-top: 5px
        }

        .logoNome {
            display: flex;
            align-items: center;
        }

        .logoNome p {
            color: #716B6B;
            font-weight: 500;
            padding-top: 5px;
            /* padding-left: 10px */
        }

        .numeroDataCartao {
            display: flex;
            justify-content: space-between;
        }

        .numeroDataCartao p {
            margin-left: 5px;
        }

        .imgPayment {
            display: flex;
            /* align-items: center; */
            background-color: #202020;
            padding: 1rem 0.6rem;
            border-radius: 50%
        }

        .imgPayment img {
            width: 40px
        }

        .divDoBotao {
            display: flex;
            justify-content: flex-end;
            margin-top: 35px
        }

        .botaoAdicionar {
            font-family: 'Poppins', sans-serif;
            /* background-color: #4E7DF8; */
            background-color: #337deb;
            border: none;
            border-radius: 5px;
            padding: 8px;
            transition: all 0.3s ease;
        }

        .botaoAdicionar:hover {
            background-color: #1e59b3;
        }

        .botaoAdicionar a {
            color: #fff;
        }

        /* .editPayment {
                                                display: flex;
                                                align-items: center;

                                                height: 70px;
                                                margin-left: 20px;
                                                padding: 5px 14px;

                                                border-radius: 5px;
                                                background-color: #2767C8;
                                                transition: all 0.3s ease;
                                            }

                                            .editPayment:hover {
                                                background-color: #1e59b3;
                                            }

                                            .editPayment img {
                                                width: 40px
                                            } */
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

                        <a href="{{ route('usuario.editarPagamentos', ['id' => Auth::user()->id]) }}">Alterar</a>

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
