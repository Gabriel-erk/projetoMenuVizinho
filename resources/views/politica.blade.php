@extends('layouts.site')

@section('conteudo')
    <style>
        body {
            background-color: #fff;
        }
    </style>

    <main class="container pt-5" style="font-family: 'Poppins', sans-serif">
        @foreach ($textoFormatado as $bloco)
            <div class="pb-3">
                <h2>{{ $bloco['titulo'] }}</h2>
                <span class="fs-5">{{ $bloco['conteudo'] }}</span>
            </div>
        @endforeach

        <span class="fs-5">Ao utilizar nosso site, você concorda com esta Política de Privacidade. Se tiver dúvidas sobre
            nossas práticas de privacidade, entre em contato conosco.</span>

        {{-- colocando a última data de alteração com o formato brasileiro --}}
        <p class="fs-5 mt-3" style="color:#848384">Última atualização: {{ $infoLoja->updated_at->format('d/m/Y') }}</p>
        </p>
    </main>
@endsection
