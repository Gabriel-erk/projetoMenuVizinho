@extends('layouts.site')

@section('conteudo')
    <style>
        body {
            background-color: #fff;
        }
    </style>

    <main class="container pt-5" style="font-family: 'Poppins', sans-serif">
        {{-- se o array textoFormatado não estiver vazio, realiza a impressão do texto e exibe a data da ultima att --}}
        @if (!empty($textoFormatado) && count($textoFormatado) > 0)
            @foreach ($textoFormatado as $bloco)
                <div class="pb-3">
                    <h2>{{ $bloco['titulo'] }}</h2>
                    <span class="fs-5">{{ $bloco['conteudo'] }}</span>
                </div>
            @endforeach

            {{-- Exibe a data de última atualização somente se "regras_cupons" tiver conteúdo --}}
            <p class="fs-5 mt-3" style="color:#848384">Última atualização: {{ $infoLoja->updated_at->format('d/m/Y') }}</p>
        @endif
    </main>
@endsection
