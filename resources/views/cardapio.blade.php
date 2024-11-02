@extends('layouts.site')

@section('conteudo')
    <main class="px-5">
        <link rel="stylesheet" href="{{ asset('css/siteCss/produto.css') }}">

        <style>
            /* para dar um scroll suave */
            html {
                scroll-behavior: smooth;
            }

            body {
                background-color: #fff
            }

            .banner img {
                /* se bugar eu coloco dnv */
                /* width: 100%; */
                height: 100vh;
                border-radius: 5px;
            }

            .categoriaListada {
                border: 1px solid #8c6342;
                color: #8c6342;
                font-size: 0.85em;
                transition: background-color 0.3s ease-out, transform 0.3s ease-out;
            }

            .categoriaListada:hover {
                background-color: #8c6342;
                color: #fff
            }
        </style>

    @section('banner')
        <div class="banner owl-carousel owl-theme">

            @foreach ($infoLoja->banners as $banner)
                <div class="img-banner">
                    <img src="{{ asset($banner->imagem) }}" alt="">
                </div>
            @endforeach

        </div>
    @endsection

    <div class="d-flex" style="font-family: 'Poppins', sans-serif">
        <h1 class="mt-3 fw-bold" style="color:#8c6342;">TODOS OS PRODUTOS</h1>
    </div>

    {{-- listando categorias p clicar e direcionar p categoria no documento --}}
    <div id="categorias" class="d-flex align-items-center" style="font-family: 'Poppins', sans-serif">
        <i class="fa-solid fa-sliders me-2" style="color: #8c6342; font-size: 1.2em;"></i>
        @foreach ($categorias as $categoria)
            {{-- Quando clica no nome da categoria, por exemplo, lanches, será redirecionado para o bloco de lanches na view --}}
            <a href="#{{ Str::slug($categoria->titulo_categoria, '-') }}"
                class="categoriaListada px-3 py-1 me-2 rounded-5 d-block text-decoration-none">{{ $categoria->titulo_categoria }}</a>
        @endforeach

        <div class="d-flex align-items-center ms-1 toggle-filtros"
            style="border-bottom: 3px solid #8c6342; height: 4.5vh; cursor: pointer;">
            {{-- id do link --}}
            <a id="toggle-filtros-text" class="bg-white text-decoration-none text-dark me-1"
                style="font-size:0.9em; font-weight:600;">MAIS FILTROS</a>
            {{-- id do icone --}}
            <i id="toggle-filtros-icon" class="fa-sharp fa-solid fa-plus" style="font-size: 0.8em"></i>
        </div>
    </div>

    <!-- Área oculta das subcategorias -->
    <div id="subcategorias" class="d-none mt-3" style="font-family: 'Poppins', sans-serif">
        <div class="d-flex">
            @foreach ($subCategorias as $subCategoria)
                <a href="#{{ Str::slug($subCategoria->titulo_sub_categoria, '-') }}"
                    class="categoriaListada px-3 py-1 me-2 rounded-5 d-block text-decoration-none">{{ $subCategoria->titulo_sub_categoria }}</a>
            @endforeach
        </div>

    </div>

    <script>
        document.querySelector('.toggle-filtros').addEventListener('click', function() {
            var subcategorias = document.getElementById('subcategorias');
            var toggleText = document.getElementById('toggle-filtros-text');
            var toggleIcon = document.getElementById('toggle-filtros-icon');

            // Alterna a visibilidade das subcategorias
            subcategorias.classList.toggle('d-none');

            // Muda o texto e o ícone caso tenha display none
            if (subcategorias.classList.contains('d-none')) {
                toggleText.textContent = 'MAIS FILTROS';
                // remove o icone de menos (altera a classe fa-minus para fa-plus) - subcategorias tem acesso as  classes do elemento que tem a id subcategorias
                toggleIcon.classList.remove('fa-minus');
                toggleIcon.classList.add('fa-plus');
                // se não, significa que a div está visivel, está mostrando as sub-categorias
            } else {
                toggleText.textContent = 'MENOS FILTROS';
                toggleIcon.classList.remove('fa-plus');
                toggleIcon.classList.add('fa-minus');
            }
        });
    </script>

    @foreach ($categorias as $categoria)
        {{-- pega o nome da categoria e substitui os espaços por '-' (com str:slug), que será transformado no id daquela categoria, ex: mais pedidos = mais-pedidos - vai ser o id do bloco daquela categoria --}}
        <div id="{{ Str::slug($categoria->titulo_categoria, '-') }}" class="mt-3 mb-2"
            style="font-family: 'Poppins', sans-serif">
            <span class="fs-3 fw-bold" style="display: block; color:#8c6342">{{ $categoria->titulo_categoria }}</span>
        </div>

        <div id="listaProdutos" class="row row-cols-1 row-cols-md-3 g-3">
            @foreach ($categoria->produtos as $produto)
                <div class="col">
                    <div id="produto">
                        <a href="{{ route('site.produto', ['id' => $produto->id]) }}">
                            <div id="img-produto" class="text-center">
                                <img src="{{ asset($produto->imagem) }}" alt="" srcset="">
                            </div>
                        </a>

                        <div id="nome-desc" class="px-4">
                            <span id="nome-prod" class="fw-bold d-block">{{ $produto->nome }}</span>
                            <span id="desc" class="fw-normal d-block">{{ $produto->descricao }}</span>
                        </div>

                        <div id="valor-addProduto"
                            class="px-4 rounded-bottom d-flex justify-content-between align-items-center"
                            style="height: 12vh">
                            <span id="preco" class="fw-bold d-block">R${{ $produto->preco }}</span>
                            <form action="{{ route('lista.addToCart', $produto->id) }}" method="post">
                                @csrf
                                <div class="rounded-circle"
                                    style="padding: 0.4rem 0.8rem; background-color: var(--cor-secundaria)">
                                    <button type="submit"
                                        style="border: none; background-color: var(--cor-secundaria);"
                                        title="Adicionar ao carrinho"><i class="fa-solid fa-plus"
                                            style="color: #8C6342;"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

    @foreach ($subCategorias as $subCategoria)
        <!-- Verifica se há produtos relacionados - se houver, lista a categoria e seus produtos - isso evita que imprima subCategorias vazias -->
        @if ($subCategoria->produtos->isNotEmpty())
            <div id="{{ Str::slug($subCategoria->titulo_sub_categoria, '-') }}" class="mt-4 mb-2"
                style="font-family: 'Poppins', sans-serif">
                <span class="fs-3 fw-bold"
                    style="display: block; color:#8c6342">{{ $subCategoria->titulo_sub_categoria }}</span>
                {{-- <span class="fs-6" style="display: block; color: #848384;">{{ $subCategoria->descricao }} </span> --}}
            </div>

            <div id="listaProdutos" class="row row-cols-1 row-cols-md-3 g-3">
                @foreach ($subCategoria->produtos as $produto)
                    <div class="col">
                        <div id="produto" class="rounded-3">
                            <a href="{{ route('site.produto', ['id' => $produto->id]) }}">
                                <div id="img-produto" class="text-center">
                                    <img src="{{ asset($produto->imagem) }}" alt="" srcset="">
                                </div>
                            </a>

                            <div id="nome-desc" class="px-4">
                                <span id="nome-prod" class="fw-bold d-block">{{ $produto->nome }}</span>
                                <span id="desc" class="fw-normal d-block">{{ $produto->descricao }}</span>
                            </div>

                            <div id="valor-addProduto"
                                class="px-4 rounded-bottom d-flex justify-content-between align-items-center"
                                style="height: 12vh">
                                <span id="preco" class="fw-bold d-block">R${{ $produto->preco }}</span>
                                <form action="{{ route('lista.addToCart', $produto->id) }}" method="post">
                                    @csrf
                                    <div class="rounded-circle"
                                        style="padding: 0.4rem 0.8rem; background-color: var(--cor-secundaria)">
                                        <button type="submit"
                                            style="border: none; background-color: var(--cor-secundaria);"
                                            title="Adicionar ao carrinho"><i class="fa-solid fa-plus"
                                                style="color: #8C6342;"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endforeach

</main>
@endsection
