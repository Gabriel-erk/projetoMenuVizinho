@extends('layouts.site')

@section('conteudo')
    <style>

        .imgRestaurante {
            margin-top: 50px;
            margin-bottom: 40px;
            text-align: center;
        }

        .imgRestaurante img {
            width: 100%;
        }

        .sobreRestaurante {
            font-family: 'Poppins', sans-serif;
            font-size: large;
            font-weight: 500;
        }

        .linkRestaurante span {
            color: #848384;
        }

        .linkRestaurante a {
            color: #1a57f1;
        }
    </style>

    <main class="container">
        <div class="imgRestaurante">
            <img src="{{ asset($infoLoja->imagem_sobre_restaurante) }}" alt="">
        </div>

        <div class="sobreRestaurante">

            <div class="textoRestaurante">
                {{-- funçao nl2br interpreta quebras de linha /n e converte para br, preservando o espaçamento colocado no momento do cadastro/edição do texto no db (então, posso dividir em parágrafos no momento do cadastro e somente listar aqui)  --}}
                {!! nl2br(e($infoLoja->texto_sobre_restaurante)) !!}
            </div>                              

            <div class="textoRestaurante linkRestaurante mt-4">

                <span>Para aproveitar melhor os nossos serviços, visite o site: <a
                        href="{{ route('site.index') }}">www.{{$infoLoja->nome_loja}}.com</a></span> .
            </div>

        </div>
    </main>
@endsection
