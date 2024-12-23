@extends('layouts.site')

<link rel="stylesheet" href="{{ asset('css/siteCss/produto.css') }}">

@section('banner')
    <div class="banner owl-carousel owl-theme">
        {{-- listando apenas os banners com a categoria ofertas --}}
        @foreach ($infoLoja->banners as $banner)
            @if ($banner->categoria == 'ofertas')
                <div class="img-banner">
                    <img src="{{ asset($banner->imagem) }}" alt="">
                </div>
            @endif
        @endforeach

    </div>
@endsection

@section('conteudo')
    <style>
        #valor-addProduto #preco {
            /* ideia cor para indicar promo: color:#b1703c, #d36c18 */
            color: var(--cor-primaria);
            font-size: 1.44rem
        }

        #valor-addProduto #icone-mais {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;

            padding-left: 0.8rem;
            padding-right: 0.8rem;
        }
    </style>
    <main class="px-5">

        <div class="d-flex" style="font-family: 'Poppins', sans-serif">
            <h1 class="my-3 fw-bold" style="color:#8c6342;">OFERTAS</h1>
        </div>

        <div id="listaProdutos" class="row row-cols-1 row-cols-md-3 g-3">
            @foreach ($ofertas as $oferta)
                <div class="col">
                    <div id="produto" class="rounded-3">
                        <a href="{{ route('ofertas.produto', ['id' => $oferta->id]) }}">
                            <div id="img-produto" class="text-center">
                                <img src="{{ asset($oferta->imagem) }}" alt="" srcset="">
                            </div>
                        </a>

                        <div id="nome-desc" class="px-4">
                            <span id="nome-prod" class="fw-bold d-block">{{ $oferta->nome }}</span>
                            <span id="desc" class="fw-normal d-block">{{ $oferta->descricao }}</span>
                        </div>

                        <div id="valor-addProduto"
                            class="px-4 rounded-bottom d-flex justify-content-between align-items-center"
                            style="height: 12vh">
                            <span id="preco" class="fw-bold d-block">R${{ $oferta->preco }}</span>
                            <form
                                action="{{ route('lista.addToCart', ['itemId' => $oferta->id, 'tipoItem' => $oferta->tipo_item]) }}"
                                method="post">
                                @csrf
                                <div id="icone-mais" class="rounded-circle" style="background-color: var(--cor-secundaria)">
                                    <button type="submit" style="border: none; background-color: var(--cor-secundaria);"
                                        title="Adicionar ao carrinho"><i class="fa-solid fa-plus"
                                            style="color: #8C6342;"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </main>
@endsection
