@extends('layouts.site')
<link rel="stylesheet" href="{{ asset('css/enderecoEntrega.css') }}">

@section('conteudo')
    <style>
        body {
            background-color: #fff;
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <main>

        <div class="tituloEditUser">
            <h2>Endereços de entrega</h2>
        </div>

        <div>

            <div class="enderecos">

                <h3>Endereços cadastrados</h3>

                <div class="endereco">

                    <div class="imgInfoEndereco">
                        <div class="imgEndereco">

                            <img src="{{ asset('img/iconeLocalizacao.png') }}" alt="">
                            {{-- <img src="{{ asset('img/iconeEndereco.png') }}"> --}}

                        </div>

                        <div class="infoEndereco">

                            <h4>Rua Curitiba de Curioso, 190</h4>

                            <div class="bairroCepCidade">
                                <p>Palmital</p>
                                <p>Xique-Xique - BA</p>
                                <p>13511-900</p>
                            </div>

                        </div>
                    </div>

                    {{-- <div class="editPayment">
                        <a href="#">

                            <img src="{{ asset('img/lapisEdit.png') }}" alt="">

                        </a>
                    </div> --}}

                </div>

            </div>

        </div>

    </main>
@endsection
