@extends('layouts.site')

@section('conteudo')
    <main class="px-5">
        <style>
            body {
                background-color: #fff
            }

            .x {
                position: relative;
                top: 1.5em
            }

            #produto {
                transition: border-color 0.3s ease-out, background-color 0.3s ease-out, transform 0.3s ease-out;
            }

            #produto:hover {
                background-color: #f9f9f9;
                transform: scale(1.02);
            }
        </style>

        {{-- <div class="mt-3 mb-2" style="font-family: 'Poppins', sans-serif">
            <span class="x fw-semibold" style="display: block; color: #848384;">Cardápio</span>
        </div> --}}

        @foreach ($categorias as $categoria)
            <div id="titulos" class="mt-4 mb-2" style="font-family: 'Poppins', sans-serif">
                <span class="fs-3 fw-bold" style="display: block; color:#8c6342">{{ $categoria->titulo_categoria }}</span>
                <span class="fs-6" style="display: block; color: #848384;">{{ $categoria->descricao }} </span>
            </div>

            {{-- row-cols-1 define que será mostrado um produto por linha em telas menores (celulares) - row-cols-md-3 em telas medias será mostrado 3 por linha - g-3 é um gutter, espaçamento entre linhas e colunas, equivalente a 1.5rem (em 3) --}}
            <div id="listaProdutos" class="row row-cols-1 row-cols-md-3 g-3">
                @foreach ($categoria->produtos as $produto)
                    <div class="col">
                        {{-- shadow-sm --}}
                        <div id="produto" class=" rounded-3 h-100"
                            style="font-family: 'Poppins', sans-serif; border-left: 2.5px solid #fce8c4; border-right: 2.5px solid #fce8c4; border-bottom: 2.5px solid #fce8c4;">
                            <a href="{{ route('site.produto', ['id' => $produto->id]) }}">
                                <div id="img-produto" class="text-center py-4 rounded-top"
                                    style="background-color:#fce8c4;">
                                    <img style="height: 31vh" src="{{ asset($produto->imagem) }}" alt=""
                                        srcset="">
                                </div>
                            </a>

                            <div id="nome-valor"
                                class="bg-white d-flex justify-content-between align-items-center px-2 rounded-bottom"
                                style="height: 12vh">
                                <span class="fw-bold text-center"
                                    style="color: #8c6342; font-size: 1.44rem">{{ $produto->nome }}</span>
                                <span style="font-size: 0.9em; color: #A0A0A0;">
                                    R${{ $produto->preco }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

        @foreach ($subCategorias as $subCategoria)
            <!-- Verifica se há produtos relacionados - se houver, lista a categoria e seus produtos - isso evita que imprima subCategorias vazias -->
            @if ($subCategoria->produtos->isNotEmpty())
                <div id="titulos" class="mt-4 mb-2" style="font-family: 'Poppins', sans-serif">
                    <span class="fs-3 fw-bold"
                        style="display: block; color:#8c6342">{{ $subCategoria->titulo_sub_categoria }}</span>
                    <span class="fs-6" style="display: block; color: #848384;">{{ $subCategoria->descricao }} </span>
                </div>

                <div id="listaProdutos" class="row row-cols-1 row-cols-md-3 g-3">
                    @foreach ($subCategoria->produtos as $produto)
                        <div class="col">
                            {{-- shadow-sm --}}
                            <div id="produto" class=" rounded-3 h-100"
                                style="font-family: 'Poppins', sans-serif; border-left: 2.5px solid #fce8c4; border-right: 2.5px solid #fce8c4; border-bottom: 2.5px solid #fce8c4;">
                                <a href="{{ route('site.produto', ['id' => $produto->id]) }}">
                                    <div id="img-produto" class="text-center py-4 rounded-top"
                                        style="background-color:#fce8c4;">
                                        <img style="height: 31vh" src="{{ asset($produto->imagem) }}" alt=""
                                            srcset="">
                                    </div>
                                </a>

                                <div id="nome-valor"
                                    class="bg-white d-flex justify-content-between align-items-center px-2 rounded-bottom"
                                    style="height: 12vh">
                                    <span class="fw-bold text-center"
                                        style="color: #8c6342; font-size: 1.44rem">{{ $produto->nome }}</span>
                                    <span style="font-size: 0.9em; color: #A0A0A0;">
                                        R${{ $produto->preco }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endforeach


    </main>
@endsection
