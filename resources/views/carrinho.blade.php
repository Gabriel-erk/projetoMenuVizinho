@extends('layouts.site')
<?php
// vai me permitir limitar os caracteres da minha descrição
use Illuminate\Support\Str;
?>

<!-- adicionando fonte 4 (Titan One) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Signika+Negative:wght@300..700&family=Titan+One&display=swap"
    rel="stylesheet">

<!-- adicionando fonte 5 (baloo bhai) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@400..800&display=swap" rel="stylesheet">

@section('conteudo')
    <style>
        body {
            background-color: #F3F3F3;
        }

        #limpaCarrinho {
            /* caso queira voltar */
            /* right: 35px; */

            transition: transform 0.5s ease;
        }

        #limpaCarrinho:hover {
            cursor: pointer;
            transform: scale(1.02);
            transition: all linear 200ms;

            color: #F9EED9;
        }

        /* icones */
        .fa-solid:hover {
            cursor: pointer;
        }

        /* produto lista aproveite também - da p refazer com bootstrap */
        .produtoListaAproveiteTambem {
            background-color: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.06);
            border-radius: 7px;
            font-family: 'Cabin', sans-serif;
            padding: 5%;
            height: 80%;
            width: 23vw;

            margin-top: 2rem;
            margin-bottom: 5rem;
            margin-left: 2rem;
            transition: border-color 0.3s ease-out, background-color 0.3s ease-out, transform 0.3s ease-out;
        }

        .produtoListaAproveiteTambem:hover {
            border-color: #e9e2e2;
            background-color: #f9f9f9;
            transform: scale(1.02);
        }

        #botaoAlterar,
        #botaoAdicionar {
            color: #8C6342;
            transition: transform 0.5s ease;
        }

        #botaoAlterar:hover,
        #botaoAdicionar:hover {
            color: #643c1c;
            transition: all linear 200ms;
        }

        /* finalizar compra button  */
        #finalizarCompra {
            transition: transform 0.5s ease;
        }

        #finalizarCompra:hover {
            cursor: pointer;
            transform: scale(1.05);
            transition: all linear 200ms;
        }
    </style>
    <main>
        {{-- antes: .listaCarrinho --}}
        <div style="background-color: #f9eed9" class="pt-3">

            <script>
                function confirmLimpaCarrinho() {
                    return confirm('Deseja limpar o carrinho?')
                }
            </script>

            @if (count($itensCarrinho) > 0)
                {{-- passando o id da lista do carrinho, pois quero limpar seus itens --}}
                {{-- <form action="{{ route('lista.limpar', $listaCarrinho->id) }}" method="POST"
                    onsubmit="return confirmLimpaCarrinho()">
                    @csrf
                    <button id="limpaCarrinho" type="submit" class="rounded position-absolute"
                        style="font-family: 'Cabin', sans-serif; background-color:#8C6342; color:#ffffff; border:none; padding: 0.5em 1.9em; right:2em">
                        Limpar
                    </button>
                </form> --}}

                @foreach ($itensCarrinho as $item)
                    <div class="d-flex align-items-center justify-content-between mt-3 pb-5 px-4">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset($item->produto->imagem) }}" style="height: 23vh; width: 15vw">
                            <div class="ps-2">
                                <h2 class="fs-2" style="color:#8C6342; font-family: 'Titan One', sans-serif; fw-normal">
                                    {{ $item->produto->nome }}</h2>
                                <p class="fw-normal" style="color: #979797; font-family:'Signika Negative', sans-serif;">
                                    {{ Str::limit($item->produto->descricao, 50, '...') }}</p>
                                <p class="fw-semibold fs-3" style="font-family: 'Poppins', sans-serif;">R$
                                    {{ $item->produto->preco }}</p>
                            </div>
                        </div>
                        <div style="width: 30%; font-family:'Poppins',sans-serif">
                            <div class="d-flex justify-content-between align-items-center py-1 px-2"
                                style="margin-left: 40%; width: 9vw; background-color: #d9d9d9; border-radius: 12px">
                                <form action="{{ route('lista.remover', $item->id) }}" method="post">
                                    @csrf
                                    <button type="submit" style="border: none; background-color: #d9d9d9;">
                                        <i class="fa-solid fa-minus" style="color: #8C6342;"></i>
                                    </button>
                                </form>
                                <strong>{{ $item->quantidade }}</strong>
                                <form action="{{ route('lista.addToCart', $item->produto->id) }}" method="post">
                                    @csrf
                                    <button type="submit" style="border: none; background-color: #d9d9d9;">
                                        <i class="fa-solid fa-plus" style="color: #8C6342;"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center pb-3 fs-4 fw-semibold" style="font-family: 'Poppins', sans-serif">Seu carrinho está
                    vazio.</p>
            @endif
        </div>

        <div class="aproveiteTambem" style="border-top: 2px solid #ccc; border-bottom: 2px solid #ccc">
            <h2 class="fw-medium ps-3 pt-3" style="font-family: 'Poppins', sans-serif;">Aproveite Também</h2>
            <div class="d-flex owl-carousel">

                @foreach ($produtos as $produto)
                    <div class="produtoListaAproveiteTambem item">
                        <div class="imgProdutoAproveiteTambem position-relative">

                            <a href="{{ route('site.produto', ['id' => $produto->id]) }}">
                                <img src="{{ asset($produto->imagem) }}" class="p-3" style="height: 58%">
                            </a>

                            <form action="{{ route('lista.addToCart', $produto->id) }}" method="post">
                                @csrf
                                <div class="position-absolute rounded-circle"
                                    style="bottom: 0.4rem; right: 1rem; padding: 0.75rem 0.95rem; background-color: var(--cor-primaria)">
                                    <button type="submit" style="border: none; background-color: var(--cor-primaria);"
                                        title="Adicionar ao carrinho"><i class="fa-solid fa-plus"
                                            style="color: #ffffff;"></i></button>
                                </div>
                            </form>
                        </div>

                        <div class="informacoesProdutoAproveiteTambem">
                            <div class="tituloValorAproveiteTambem d-flex justify-content-between mt-3">
                                <h3 class="fs-5">{{ $produto->nome }}</h3>
                                <span class="fs-6">${{ $produto->preco }}</span>
                            </div>

                            <div>
                                <span class="mt-2 text-break" style="width: 70%">{{ $produto->descricao }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <div class="pagamento-e-cupom py-4 px-4" style="font-family: 'Poppins', sans-serif; border-bottom: 2px solid #ccc">
            <h3 class="mb-4">Pagamento pelo site</h3>
            <div class="pagamento d-flex align-items-center justify-content-between mb-2">

                <div class="d-flex">

                    <div class="rounded-circle text-center d-flex justify-content-center align-items-center"
                        style="background-color: #202020; height:10vh; width:5vw">
                        <img src="{{ asset('img/bandeiraCartao.png') }}" style="height: 5vh">
                        {{-- <img src="./img/credit-card.png" style="height: 7vh"> --}}
                    </div>

                    <div class="ms-2">
                        <h4>Crédito</h4>
                        <p style="color:#9b9999" class="fw-semibold">Mastercard ****5090</p>
                    </div>

                </div>

                <a href="#" id="botaoAlterar" class="fw-bold text-decoration-none" data-bs-toggle="modal"
                    data-bs-target="#modalPagamento">Alterar</a>
            </div>

            <div class="cupom pagamento d-flex align-items-center justify-content-between mb-2">

                <div class="d-flex">

                    <div class="rounded-circle text-center d-flex justify-content-center align-items-center"
                        style="background-color: #202020; height:10vh; width:5vw">
                        <img src="./img/cupom-carrinho.png" style="height: 7vh">
                    </div>

                    <div class="ms-2">
                        <h4>Cupom</h4>
                        @if ($cupons->isNotEmpty())
                            <p style="color:#9b9999" class="fw-semibold">{{ $cupons->count() }} cupom(ns) disponível(is)
                                para esta compra.</p>
                        @else
                            <p style="color:#9b9999" class="fw-semibold">Nenhum cupom disponível para esta compra.</p>
                        @endif
                    </div>
                </div>

                <button id="botaoAdicionar" class="fw-bold" style="border: none" data-bs-toggle="modal"
                    data-bs-target="#modalCupom">Adicionar</button>
            </div>
        </div>

        <div class="fw-normal py-4 px-4" style="font-family: 'Poppins', sans-serif;">
            <h2>Resumo dos valores</h2>
            @if ($totalCarrinho > 0.0)
                <span class="d-block pb-1">- Subtotal: R$ <span
                        id="subtotalCarrinho">{{ number_format($totalCarrinho, 2, ',', '.') }}</span></span>
                <span class="d-block pb-1">- Taxa de entrega: R$ {{ number_format($taxaEntrega, 2, ',', '.') }}</span>
                <span class="d-block pb-1">- Cupom Aplicado: <span id="nomeCupomSelecionado">Nenhum</span></span>
                <span class="d-block">- Desconto de cupom: R$ <span id="valorDescontoCupom">0,00</span></span>
                <h3 class="fw-semibold" style="margin-top: 2%; color: #9B9999;">Total: R$ <span
                        id="totalCarrinho">{{ number_format($totalCarrinho + $taxaEntrega, 2, ',', '.') }}</span></h3>
            @else
                <span class="d-block pb-1">- Subtotal: R$ <span id="subtotalCarrinho">0,00</span></span>
                <span class="d-block pb-1">- Taxa de entrega: R$ 0,00</span>
                <span class="d-block pb-1">- Cupom Aplicado: <span id="nomeCupomSelecionado">Nenhum</span></span>
                <span class="d-block">- Desconto de cupom: R$ <span id="valorDescontoCupom">0,00</span></span>
                <h3 class="fw-semibold" style="margin-top: 2%; color: #9B9999;">Total: R$ <span
                        id="totalCarrinho">0,00</span></h3>
            @endif

            <div class="text-center" style="margin-top: 8%">
                <button id="finalizarCompra" class="fw-bold d-inline-block text-white rounded-3"
                    style="font-family: 'Poppins', sans-serif; font-size: 1.1em; background-color:#8C6342; border: none; padding: 1rem 3rem">
                    Finalizar Compra
                </button>
            </div>
        </div>

    </main>

    <style>
        .modal-custom {
            position: fixed;
            left: 0;
            right: 0;
        }

        /* alterando o corpo, sem ser a div que somente agrupa ele */
        .conteudo-modal-pagamento,
        .conteudo-modal-cupom {
            width: 100vw
        }

        .opcaoPagamento a {
            transition: color 0.3s ease, text-shadow 0.3s ease;
        }

        .opcaoPagamento a:hover {
            color: #643c1c;
            text-shadow: 0 0 5px rgba(236, 48, 48, 0.1);
        }

        /* metodo pagamento */
        .opcaoPagamento,
        .opcaoSalvaPagamento {
            transition: all 0.3s ease;
        }

        .opcaoSalvaPagamento:hover,
        .opcaoPagamento:hover {
            background-color: #c5c4c4;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
        }

        .opcaoSalvaPagamento:hover,
        .formaPagamento:hover {
            cursor: pointer;
        }

        /* cupons */

        /* colocando aqui, pois se deixar estes atributos fixos no próprio elemento, não consigo altera-los depois */
        .addCupom {
            background-color: #fff;
            color: #8c6342;
        }

        .addCupom:hover {
            cursor: pointer;
            color: #fff;
            background-color: #8C6342;
            transition: all linear 200ms;
        }
    </style>
    <!-- Modal pagamento -->
    <div class="modal fade" id="modalPagamento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-custom modal-dialog-centered modal-dialog-scrollable modal-lg">
            <!-- Adiciona 'modal-dialog-centered' -->
            <div class="modal-content conteudo-modal-pagamento">
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

                            <span><a href="{{ route('usuario.novaFormaPagamento') }}" class="text-decoration-none"
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
                                    style="background-color: #f4f4f4; border: 1px solid #ccc">
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
        <div class="modal-dialog modal-custom modal-dialog-centered modal-dialog-scrollable modal-lg">
            <!-- Adiciona 'modal-dialog-centered' -->
            <div class="modal-content conteudo-modal-cupom">
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

    <script>
        // element se referencia ao bloco p em que chamo essa função e passo ele mesmo de parâmetro (this)
        function selecionarCupom(element) {
            // Obtenha o nome e o valor de desconto do cupom selecionado (eles são passados para cá quando o botão "adicionar cupom" é clicado no modal cupom)

            // pega o valor do atributo personalizadao data-nome-cupom no elemento  html e armazena em nomeCupom
            const nomeCupom = element.getAttribute(
                'data-nome-cupom'
            );
            // pega o valor do atributo personalizado data-valor-desconto e passa para a váriavel valorDesconto ( no caso o valor daquel cupom ) e converte para um número de ponto flutuante (float, para que seja possivel realizar calculos com aquele valor)
            const valorDesconto = parseFloat(element.getAttribute(
                'data-valor-desconto'
            ));

            // Atualize o nome do cupom e o valor do desconto na seção "Resumo dos valores"

            // altera o conteúdo no html do campo com a id 'nomeCupomSelecionado' com o valor da váriavel nomeCupom (se selecionei no modal um cupom com o nome de "peixe defumado", é este nome que vai aparecer na minha seção de "resumo de valores" a respeito do nome do cupom)
            document.getElementById('nomeCupomSelecionado').innerText =
                nomeCupom;
            /*
                * document.getElementById('valorDescontoCupom'):
                Esta parte do código utiliza o método getElementById do objeto document para encontrar um elemento HTML com o ID valorDescontoCupom. Esse elemento é onde o valor do desconto será exibido na página. 
                * .innerText (este atributo serve para acessar o conteúdo de um elemento html e quando faço ".innerText =" é porque estou atribuindo um novo conteúdo para ele, ou seja, alterando o valor daquele campo, no caso, o campo com o id 'valorDescontoCupom')
                * valorDesconto.toFixed(2) (quer dizer que estou formatando a váriavel valorDesconto para ter 2 casas decimais - útil no meu caso que quero os valores monetários apenas em 2 casas decimais)
                * .replace('.',',') (quer dizer que após formatar o valorDesconto com toFixed irei substituir o ponto que é usado como separador decimal por uma virgula)
            */
            document.getElementById('valorDescontoCupom').innerText = valorDesconto.toFixed(2).replace('.', ',');

            // Atualize o total, subtraindo o valor do desconto
            // estou convertendo para Float o valor do elemento html com a id subtotalCarrinho e depois substituindo o ponto por vírgula
            const subtotal = parseFloat(document.getElementById('subtotalCarrinho').innerText.replace('.', ','));
            const taxaEntrega = 5.0; // Taxa fixa de entrega
            let totalComDesconto = subtotal + taxaEntrega - valorDesconto;

            // Verifica se o total é menor que o mínimo permitido (15,00)
            /*
             * math.max recebe dois argumentos e retorna o maior deles, então, se em algum momento o retorno de totalComDesconto for menor que 15, irá retornar 15
             */
            totalComDesconto = Math.max(totalComDesconto, 15);

            document.getElementById('totalCarrinho').innerText = totalComDesconto.toFixed(2).replace('.', ',');

            // Fecha o modal após selecionar
            $('#modalCupom').modal('hide');
        }
    </script>

@endsection
