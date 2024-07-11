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
            font-family: 'Poppins', sans-serif;

        }

        .tituloEditUser h2 {
            font-weight: 500;
        }

        .blocoPagamentos {

            padding-left: 30px
        }

        .tituloPagamentos {
            margin-top: 20px;
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
            border-radius: 6px ;

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

            margin-top: 20px;

        }

        .logoNome {
            display: flex;
            /* align-items: center; */
            width: 800px;

            background-color: #F8F8F8;
            border: 1px solid #CCCCCC;
            border-radius: 10px;

            padding: 15px 10px;
            transition: all 0.3s ease;
        }

        .logoNome:hover {
            background-color: #eaebee;
        }

        .logoNome p {
            color: #716B6B;
            font-weight: 500;
            padding-top: 5px;
            padding-left: 10px 
        }

        .imgPayment img {
            width: 65px
        }

        .editPayment {
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
        }

    </style>

    <div class="tituloEditUser">
        <h2>Gerenciar pagamentos</h2>
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
                    
                    <p>Mastercard Internacional</p>
                </div>

                <div class="editPayment">
                    <a href="#">

                        <img src="{{ asset('img/lapisEdit.png') }}" alt="">
                        
                    </a>
                </div>
            </div>

            <div class="payment">

                <div class="logoNome">

                    <div class="imgPayment">
                        <img src="{{ asset('img/bandeiraCartao.png') }}" alt="">
                    </div>
                    
                    <p>Mastercard Internacional</p>
                </div>

                <div class="editPayment">
                    <a href="#">

                        <img src="{{ asset('img/lapisEdit.png') }}" alt="">
                        
                    </a>
                </div>
            </div>

            <div class="payment">

                <div class="logoNome">

                    <div class="imgPayment">
                        <img src="{{ asset('img/bandeiraCartao.png') }}" alt="">
                    </div>
                    
                    <p>Mastercard Internacional</p>
                </div>

                <div class="editPayment">
                    <a href="#">

                        <img src="{{ asset('img/lapisEdit.png') }}" alt="">
                        
                    </a>
                </div>
            </div>

        </div>

    </div>
@endsection
