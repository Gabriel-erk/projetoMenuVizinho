@extends('layouts.site')

@section('conteudo')
    <style>
        body {
            background-color: #fff;
        }

        .botaoSuporteDetalhes:hover {
            background-color: #eeeded;
            cursor: pointer;
        }
    </style>
    <main class="px-4 pt-4" style="font-family: 'Poppins', sans-serif">
        <section id="pedidos">
            <h1 class="pb-3">Meus Pedidos</h1>
            @foreach ($vendas as $venda)
                @foreach ($venda->itensVenda as $item)
                    @if ($item->tipo_item == 'produto')
                        <div id="pedido" class="pb-4">
                            <span style="color: #7a7979" class="fw-normal">
                                {{-- translatedFormat ecibe o nome dos dias, semanas, meses, anos traduzidos (D - nome abreviado do dia, d - dia do mes com 2 digitos (01,02..), F - nome completo do mês, Y - ano completo --}}
                                {{ $venda->created_at->translatedFormat('D, d F Y') }}
                            </span>
                            <div id="organiza-pedido" class="bg-light rounded shadow-sm" style="border: 1px solid #ccc">
                                <div id="imgInfoPedido" class="d-flex pt-2 pb-3 px-2" style="border-bottom: 1px solid #ccc">
                                    <img src="{{ asset($item->produto->imagem) }}"
                                        style="width: 12vw; background-color:#FBE7CA" class="p-2 rounded">

                                    <div class="d-flex align-items-center">

                                        <div>
                                            <div class="d-flex">
                                                <span
                                                    class="ms-3 bg-secondary d-flex justify-content-center align-items-center text-white rounded"
                                                    style="width: 1.8vw; height: 4.0vh">{{ $item->quantidade }}</span>
                                                <span class="ps-2" style="color:#7a7979">{{ $item->produto->nome }}</span>
                                            </div>
                                            {{-- @dd($item->adicionaisVenda) --}}
                                            @foreach ($item->adicionaisVenda as $adicional)
                                                <div class="d-flex pt-1">
                                                    <span
                                                        class="ms-3 bg-secondary d-flex justify-content-center align-items-center text-white rounded"
                                                        style="width: 1.8vw; height: 4.0vh">{{ $adicional->quantidade }}
                                                    </span>
                                                    <span class="ps-2"
                                                        style="color:#7a7979">{{ $adicional->adicional->nome }}
                                                    </span>
                                                </div>
                                            @endforeach

                                        </div>

                                    </div>
                                </div>

                                <div class="mt-3 fw-semibold pb-3">
                                    <span class="px-2 d-block">Pedido concluído</span>
                                    <span class="px-2 d-block">Total: R$ {{ $venda->total }}</span>
                                </div>

                                {{-- d-flex --}}
                                <div class="text-center" style="border-top: 1px solid #ccc">
                                    {{-- <div class="botaoSuporteDetalhes w-50 py-3" style="border-right: 1px solid #ccc">
                                        <span style="color: #8C6342">Suporte</span>
                                    </div> --}}

                                    {{-- w-50 --}}
                                    <div class="botaoSuporteDetalhes py-3">
                                        <span style="color: #8C6342">Detalhes</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif ($item->tipo_item == 'oferta')
                        <div id="pedido" class="pb-4">
                            <span style="color: #7a7979" class="fw-normal">
                                {{ $venda->created_at->translatedFormat('D, d F Y') }}
                            </span>
                            <div id="organiza-pedido" class="bg-light rounded shadow-sm" style="border: 1px solid #ccc">
                                <div id="imgInfoPedido" class="d-flex pt-2 pb-3 px-2" style="border-bottom: 1px solid #ccc">
                                    <img src="{{ asset($item->oferta->imagem) }}"
                                        style="width: 12vw; background-color:#FBE7CA" class="p-2 rounded" alt=""
                                        srcset="">

                                    <div class="d-flex align-items-center">
                                        <span
                                            class="ms-3 bg-secondary d-flex justify-content-center align-items-center text-white rounded"
                                            style="width: 1.8vw; height: 4.0vh">{{ $item->quantidade }}</span>
                                        <span class="ps-2" style="color:#7a7979">{{ $item->oferta->nome }}</span>
                                    </div>
                                </div>

                                <div class="mt-3 fw-semibold pb-3">
                                    <span class="px-2 d-block">Pedido concluído</span>
                                    <span class="px-2 d-block">Total: R$ {{ $venda->total }}</span>
                                </div>

                                {{-- d-flex --}}
                                <div class="text-center" style="border-top: 1px solid #ccc">
                                    {{-- <div class="botaoSuporteDetalhes w-50 py-3" style="border-right: 1px solid #ccc">
                                        <span style="color: #8C6342">Suporte</span>
                                    </div> --}}

                                    {{-- w-50 --}}
                                    <div class="botaoSuporteDetalhes py-3">
                                        <span style="color: #8C6342">Detalhes</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <p>Você ainda não realizou nenhuma compra.</p>
                    @endif
                @endforeach
            @endforeach

        </section>
    </main>
@endsection
