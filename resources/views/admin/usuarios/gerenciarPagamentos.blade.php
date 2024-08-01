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
            color: #918f8f;
        }

        .blocoPagamentos {

            padding-left: 30px
        }

        .tituloPagamentos {
            margin-top: 20px;
            margin-bottom: 20px;
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
            width: 500px;

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

    <div class="tituloEditUser">
        <h2>Gerenciar pagamentos</h2>
        <p>Veja ou adicione métodos de pagamento na sua conta.</p>
    </div>

    <div class="blocoPagamentos">

        <h2 class="tituloPagamentos">Adicionar um novo cartão</h2>

        <div class="adicionarPagamento">

            <div class="novoPagamento">

                <a href="{{ route('usuario.novaFormaPagamento') }}">

                    <i class="fa-solid fa-plus" style="color: #000"></i>

                </a>

            </div>

        </div>

        <h2 class="tituloPagamentos">Meus métodos de pagamento</h2>

        <div class="meusPagamentos">

            <div class="payment">

                <div class="logoNome">

                    <div class="imgPayment">
                        <img src="{{ asset('img/bandeiraCartao.png') }}" alt="">
                    </div>

                    <div class="numeroDataCartao">
                        <p style="color:#000">••5123</p>
                        <p>09/32</p>
                    </div>

                </div>

                <a href="{{ route('usuario.editarPagamentos') }}">Alterar</a>

            </div>

            <div class="payment">

                <div class="logoNome">

                    <div class="imgPayment">
                        <img src="{{ asset('img/bandeiraCartao.png') }}" alt="">
                    </div>

                    <div class="numeroDataCartao">
                        <p style="color:#000">••5123</p>
                        <p>09/32</p>
                    </div>

                </div>

                <a href="{{ route('usuario.editarPagamentos') }}">Alterar</a>

            </div>

            <div class="payment">

                <div class="logoNome">

                    <div class="imgPayment">
                        <img src="{{ asset('img/bandeiraCartao.png') }}" alt="">
                    </div>

                    <div class="numeroDataCartao">
                        <p style="color:#000">••5123</p>
                        <p>09/32</p>
                    </div>

                </div>

                <a href="{{ route('usuario.editarPagamentos') }}">Alterar</a>

            </div>


        </div>

    </div>
@endsection
