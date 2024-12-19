@extends('layouts.site')
<?php
// vai me permitir limitar os caracteres da minha descrição
use Illuminate\Support\Str;
?>

<link rel="stylesheet" href="{{ asset('css/siteCss/produto.css') }}">
<link rel="stylesheet" href="{{ asset('css/siteCss/carrinho.css') }}">

<!-- adicionando fonte 5 (baloo bhai) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@400..800&display=swap" rel="stylesheet">

{{-- gerando a meta tag com o token de segurança csrf, pois ao usar meu js em outro arquivo, ele não tem acesso a essa info, e não consigo realizar submissões de "formulários" sem isso, um ex é a função addToCart, ao dispara-la, sem isso, ele não permite submeter as informações para o meu controller --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('conteudo')
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

    <main>

        <form action="{{ route('lista.finalizarCompra') }}" method="post">
            @csrf
            <div class="py-3 container">

                <div class="d-flex justify-content-between align-items-center pb-2">
                    <h1 class="fw-bold">Seu Carrinho</h1>
                    @if (count($itensCarrinho) > 0)
                        <button id="limparCarrinho" onclick="limparCarrinho()">Limpar
                            carrinho</button>
                    @endif
                </div>

                @if (count($itensCarrinho) > 0)
                    @foreach ($itensCarrinho as $item)
                        @if ($item->tipo_item == 'produto')
                            <div class="rounded position-relative mt-3"
                                style="border: 1px solid #ccc; font-family: 'Poppins', sans-serif; background-color: #FCFCFC;">

                                <!-- Conteúdo principal -->
                                <div class="d-flex align-items-center justify-content-between py-4 px-4 rounded-3">
                                    <div class="d-flex align-items-center">
                                        <div class="p-3 rounded" style="background-color: #f9eed9">
                                            <a href="{{ route('site.produto', ['id' => $item->produto->id]) }}">
                                                <img src="{{ asset($item->produto->imagem) }}"
                                                    class="img-item"style="height: 19vh; width: 12vw;">
                                            </a>
                                        </div>
                                        <div class="ps-2">
                                            <h3 class="fw-semibold d-block">{{ $item->produto->nome }}</h3>
                                            @if ($item->carrinhoProdutoAdicionais->isNotEmpty())
                                                @foreach ($item->carrinhoProdutoAdicionais as $adicional)
                                                    <span class="ps-1 fw-semibold d-block"
                                                        style="color:#696868; border-left: 2px solid #ccc">{{ $adicional->quantidade }}x
                                                        - {{ $adicional->adicional->nome }}</span>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Controles de quantidade e valor -->
                                    <div class="w-50 d-flex justify-content-around">
                                        <div>
                                            <h5 class="fw-semibold">Quantidade</h5>
                                            <div class="div-quantidade d-flex justify-content-between align-items-center">

                                                @if ($item->quantidade == 1)
                                                    <button type="button"
                                                        onclick="removeItem('{{ route('lista.remover', ['itemId' => $item->id]) }}')"
                                                        style="border: none; background: none;" class="ps-1">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                @else
                                                    <button type="button"
                                                        onclick="removeItem('{{ route('lista.remover', ['itemId' => $item->id]) }}')"
                                                        style="border: none; background: none; padding: 0;">
                                                        <i class="fa-solid fa-minus fs-6"></i>
                                                    </button>
                                                @endif

                                                <!-- Quantidade com bordas laterais -->
                                                <strong
                                                    style="border-left: 1px solid #ccc; border-right: 1px solid #ccc; padding: 0 10px; text-align: center;">
                                                    {{ $item->quantidade }}
                                                </strong>

                                                <button type="button"
                                                    onclick="addToCart('{{ route('lista.addToCart', ['itemId' => $item->produto->id, 'tipoItem' => $item->produto->tipo_item]) }}')"
                                                    style="border: none; background: none; padding: 0;">
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div>
                                            <h5 class="fw-semibold">Valor unitário</h5>
                                            <p class="fw-semibold fs-5"
                                                style="font-family: 'Poppins', sans-serif; color:#555555">
                                                R$ {{ $item->produto->preco }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="rounded position-relative mt-3"
                                style="border: 1px solid #ccc; font-family: 'Poppins', sans-serif; background-color: #FCFCFC;">

                                <!-- Conteúdo principal -->
                                <div class="d-flex align-items-center justify-content-between py-4 px-4 rounded-3">
                                    <div class="d-flex align-items-center">
                                        <div class="p-3 rounded" style="background-color: #f9eed9">
                                            <a href="{{ route('ofertas.produto', ['id' => $item->oferta->id]) }}">
                                                <img src="{{ asset($item->oferta->imagem) }}"
                                                    style="height: 19vh; width: 12vw;">
                                            </a>
                                        </div>
                                        <div class="ps-2">
                                            <h3 class="fw-semibold d-block">{{ $item->oferta->nome }}</h3>
                                        </div>
                                    </div>

                                    <!-- Controles de quantidade e valor -->
                                    <div class="w-50 d-flex justify-content-around">
                                        <div>
                                            <h5 class="fw-semibold">Quantidade</h5>
                                            <div class="div-quantidade d-flex justify-content-between align-items-center">

                                                @if ($item->quantidade == 1)
                                                    <button type="button"
                                                        onclick="removeItem('{{ route('lista.remover', ['itemId' => $item->id]) }}')"
                                                        style="border: none; background: none;" class="ps-1">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                @else
                                                    <button type="button"
                                                        onclick="removeItem('{{ route('lista.remover', ['itemId' => $item->id]) }}')"
                                                        style="border: none; background: none; padding: 0;">
                                                        <i class="fa-solid fa-minus fs-6"></i>
                                                    </button>
                                                @endif

                                                <!-- Quantidade com bordas laterais -->
                                                <strong
                                                    style="border-left: 1px solid #ccc; border-right: 1px solid #ccc; padding: 0 10px; text-align: center;">
                                                    {{ $item->quantidade }}
                                                </strong>

                                                <button type="button"
                                                    onclick="addToCart('{{ route('lista.addToCart', ['itemId' => $item->oferta->id, 'tipoItem' => $item->oferta->tipo_item]) }}')"
                                                    style="border: none; background: none; padding: 0;">
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div>
                                            <h5 class="fw-semibold">Valor unitário</h5>
                                            <p class="fw-semibold fs-5"
                                                style="font-family: 'Poppins', sans-serif; color:#555555">
                                                R$ {{ $item->produto->preco }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <p class="text-center pb-3 fs-4 fw-semibold" style="font-family: 'Poppins', sans-serif">
                        Seu carrinho está vazio.
                    </p>
                @endif
            </div>

            <div class="container mt-5" style="font-family: 'Poppins', sans-serif;">
                <div class="row">
                    <!-- Opções de Prazo, Cupom e Pagamento -->
                    <div class="col-md-7">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="prazo" class="form-label fs-5" style="font-weight: 500">Prazo de
                                    entrega</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="prazo" placeholder="0000-000"
                                        aria-label="Prazo de entrega">
                                    <button class="btn btn-outline-secondary" type="button">Calcular</button>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="cupom" class="form-label fs-5" style="font-weight: 500">Cupom de
                                    Desconto</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="nomeCupomSelecionado"
                                        placeholder="R$15 para nossos novos..." aria-label="Cupom de Desconto">
                                    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#modalCupom">Selecionar</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="pagamento" class="form-label fs-5" style="font-weight: 500">Método de
                                    Pagamento</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="pagamento"
                                        placeholder="••••-3214" aria-label="Método de Pagamento" data-id-cartao-selecionado="">
                                    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#modalPagamento">Selecionar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Resumo da Compra -->
                    <div class="col-md-4 ms-5 ps-3" style="border-left: 2px solid #ccc">
                        {{-- <div class="divider mx-3"></div> --}}
                        <h4 class="fw-bold">Resumo</h4>
                        @if ($totalCarrinho > 0.0)
                            <div class="d-flex justify-content-between mt-3">
                                {{-- utilizando data-valor para armazenar o valor do totalCarrinho e fazer o javascript interagir diretamente com esse campo, ao invés do campo abaixo, que está sendo tratado com number_format, que dificultaria o processo na hora de pegar este mesmo valor no js --}}
                                <span id="subTotalCarrinho" data-valor="{{ $totalCarrinho }}">Valor dos produtos</span>
                                <span>R$ {{ number_format($totalCarrinho, 2, ',', '.') }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Frete</span>
                                <span>R$ {{ number_format($taxaEntrega, 2, ',', '.') }}</span>
                            </div>
                            <div class="d-flex justify-content-between text-success">
                                <span>Descontos</span>
                                <span>- R$ <span id="valorDescontoCupom">0,00</span></span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between fw-bold">
                                <span>Total da compra</span>
                                <span>R$ <span
                                        id="totalCarrinho">{{ number_format($totalCarrinho + $taxaEntrega, 2, ',', '.') }}</span></span>
                            </div>
                            <button type="submit" id="finalizar-btn" class="btn w-100 mt-3 text-white rounded-5"
                                onclick="return confirmFinalizar()">Finalizar</button>
                        @else
                            <div class="d-flex justify-content-between mt-3">
                                <span>Valor dos produtos</span>
                                <span>R$ 0,00</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Frete</span>
                                <span>R$ 0,00</span>
                            </div>
                            <div class="d-flex justify-content-between text-success">
                                <span>Descontos</span>
                                <span>- R$ <span id="valorDescontoCupom">0,00</span></span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between fw-bold">
                                <span>Total da compra</span>
                                <span>R$ 0,00</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </form>

        <div class="recomendacoes container" style="font-family: var(--fonte-primaria)">

            <h2 class="fw-medium ps-3 pt-3">Recomendações</h2>
            <div class="d-flex owl-carousel">
                @foreach ($produtos as $produto)
                    <div id="produto" class="item">
                        <a href="{{ route('site.produto', ['id' => $produto->id]) }}">
                            <div id="img-produto">
                                <img src="{{ asset($produto->imagem) }}" alt="" srcset="">
                            </div>
                        </a>

                        <div id="nome-desc" class="px-4">
                            <span id="nome-prod" class="fw-bold d-block">{{ $produto->nome }}</span>
                            <span id="desc" class="fw-normal d-block">{{ $produto->descricao }}</span>
                        </div>

                        <div id="valor-addProduto"
                            class="px-4 rounded-bottom d-flex justify-content-between align-items-center"
                            style="height: 10vh">
                            <span id="preco" class="fw-bold d-block">R${{ $produto->preco }}</span>

                            <div id="icone-mais" class="rounded-circle" style="background-color: var(--cor-secundaria)">
                                <button type="button"
                                    onclick="addToCart('{{ route('lista.addToCart', ['itemId' => $produto->id, 'tipoItem' => $produto->tipo_item]) }}')"
                                    style="border: none; background-color: var(--cor-secundaria);"
                                    title="Adicionar ao carrinho">
                                    <i class="fa-solid fa-plus" style="color: #8C6342;"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </main>

    <!-- Modal pagamento -->
    <div class="modal fade" id="modalPagamento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div id="modal-custom" class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <!-- Adiciona 'modal-dialog-centered' -->
            <div id="conteudo-modal-pagamento" class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Formas de pagamento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="font-family: 'Poppins', sans-serif">

                    <div id="metodo-pagamento" class=" fw-semibold" style="">
                        <div class="opcaoPagamento d-flex justify-content-between align-items-center m-2 py-3 px-2 w-100 h-25 rounded-2 shadow-sm"
                            style="background-color: #f4f4f4; border: 1px solid #ccc">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('img/pix-img.png') }}" style="width: 4vw">
                                <span class="ms-2">PIX</span>
                            </div>
                        </div>

                        <div class="opcaoPagamento d-flex justify-content-between align-items-center m-2 py-3 px-2 w-100 h-25 rounded-2 shadow-sm"
                            style="background-color: #f4f4f4; border: 1px solid #ccc">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('img/credit-card.png') }}" style="width: 4vw">
                                <span class="ms-2">Cartão de crédito</span>
                            </div>

                            <span><a href="{{ route('pagamentos.novaFormaPagamento') }}" class="text-decoration-none"
                                    style="color: #8C6342">Adicionar</a></span>
                        </div>

                    </div>

                    <div id="pagamentoSalvo" class="fw-semibold">
                        <h3 class="ms-2 mt-3" style="color: #5c5b5b">Cartões Salvos</h3>

                        {{-- se tiver vazio mostra isso --}}
                        @if ($metodosPagamentos->isEmpty())
                            <p class="ms-2">Nenhum método de pagamento salvo.</p>
                        @else
                            @foreach ($metodosPagamentos as $metodo)
                                <div class="opcaoSalvaPagamento d-flex justify-content-between align-items-center m-2 py-3 px-2 w-100 h-25 rounded-2 shadow-sm"
                                    style="background-color: #f4f4f4; border: 1px solid #ccc" data-numero-cartao="••••-{{  substr($metodo->numero_cartao, -4) }} " data-id-cartao="{{ $metodo->id }}"  onclick="selecionarCartao(this)">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle"
                                            style="background-color: #202020; padding: 1rem 0.5rem">
                                            <img src="{{ asset('img/bandeiraCartao.png') }}" style="width: 3vw">
                                        </div>
                                        {{-- pega os ultimos 4 digitos do cartão --}}
                                        <span id="nomeCartao"
                                            class="fs-6 ms-1">••{{ substr($metodo->numero_cartao, -4) }}</span>
                                        <span id="dataCartao" class="fs-6 ms-1"
                                            style="color: #716b6b">{{ $metodo->data_expiracao }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal cupom -->
    <div class="modal fade" id="modalCupom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div id="modal-custom" class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <!-- Adiciona 'modal-dialog-centered' -->
            <div id="conteudo-modal-cupom" class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cupons</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    @foreach ($cupons as $cupom)
                        <div class="mb-3 py-2 px-4 w-100" style="border: 1px solid #d9d9d9; background-color:#f5f5f5">
                            <div class="d-flex align-items-center justify-content-between"
                                style="font-family: 'Poppins', sans-serif;">
                                <div class="d-flex">
                                    <div>
                                        <img src="{{ asset('img/cupom-carrinho.png') }}" style="width: 3.6vw">
                                    </div>
                                    <div class="ms-2">
                                        <span class="fw-semibold d-block fs-5">{{ $cupom->nome_cupom }}</span>
                                        <span style="color: #929090">{{ $cupom->descricao_cupom }}</span>
                                    </div>
                                </div>
                            </div>
                            {{-- Aqui, cada botão ADICIONAR CUPOM agora contém os dados data-nome-cupom e data-valor-desconto, que guardam, respectivamente, o nome do cupom e o valor do desconto. --}}
                            <p class="addCupom fw-semibold rounded-5 mt-4 text-center"
                                style="font-family: 'Baloo Bhai 2', sans-serif; border: 1px solid #8c6342;"
                                {{-- data-nome-cupom e data-valor-desconto são atributos personalizados que armazenam informações específicas, para serem acessados no css ou javascript (precisam do prefixo "data") --}} data-nome-cupom="{{ $cupom->nome_cupom }}"
                                data-valor-desconto="{{ $cupom->valor_desconto }}" onclick="selecionarCupom(this)">
                                ADICIONAR CUPOM
                            </p>
                        </div>
                    @endforeach

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/carrinho.js') }}"></script>
@endsection
