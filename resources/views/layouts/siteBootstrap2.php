<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mr.Burger - Sua Lanchonete Local!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- css carrosel -->
    <link rel="stylesheet" href="{{ asset('css/siteCss/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/siteCss/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/siteCss/main2.css') }}">

    <!-- adicionando fonte 1 (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- adicionando fonte 2 (Cabin) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">

    <!-- adicionando dependencia de icone (fontawesome)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <header id="cabecalho">

        <div id="barra-topo" class="container d-flex justify-content-between align-items-center fw-bold">

            <div class="logotipo">
                <a href="{{ route('site.index') }}">
                    <img src="{{ asset('img/bua3.png') }}" class="" alt="" srcset="">
                </a>

            </div>

            <nav id="menu">
                <ul class="list-group list-group-horizontal list-unstyled">
                    <li class="m-4"><a href="{{ route('site.index') }}" class="text-decoration-none">HOME</a></li>
                    <li class="m-4"><a href="{{ route('site.ofertas') }}" class="text-decoration-none">OFERTAS</a>
                    </li>
                    <li class="m-4"><a href="{{ route('site.cardapio') }}" class="text-decoration-none">CARDÁPIO</a>
                    </li>
                    <li class="m-4"><a href="{{ route('site.cupons') }}" class="text-decoration-none">CUPONS</a></li>
                </ul>
            </nav>

            <div id="botoes">
                <div class="d-flex position-relative">

                    {{-- <div id="contador-carrinho position-absolute">
                        <span>0</span>
                    </div> --}}

                    <button type="button" class="btn btn-primary position-relative"><i class="fa-solid fa-bag-shopping"
                            style="color: #ffffff;"></i> <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">0
                            <span class="visually-hidden">unread messages</span></span>
                    </button>

                    {{-- <div class="agrupaCarrinho alinharBotoes">
                        <a href="{{ route('site.carrinho') }}"> <i class="fa-solid fa-bag-shopping"
                                style="color: #ffffff;"></i></a>
                    </div> --}}

                    <nav class="bg-dark">
                        <button class="navbar-toggler" type="button">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </nav>

                    {{-- <div class="iconeMenuLateral alinharBotoes">
                        <i class="fa-solid fa-bars" id="iconeMenu"></i>
                    </div> --}}

                </div>

            </div>

        </div>

        @yield('banner')

        <div id="agrupaMenuLateral">
            <div id="menuLateral">
                <div class="iconeFechaMenu"> <i id="fechar-menu" class="fa-solid fa-times"></i></div>

                <nav>
                    <ul>
                        <li><i class="fa-solid fa-house" style="color: #000000;"></i>
                            <a href="{{ route('usuario.minhaConta') }}">Minha Conta</a>
                        </li>
                        @auth

                            @if (auth()->user()->tipo == 1)
                                <li>
                                    <i class="fa-solid fa-basket-shopping" style="color: #000000;"></i>
                                    <a href="#">Meus Pedidos</a>
                                </li>

                                <li>
                                    <i class="fa-solid fa-heart" style="color: #000000;"></i>
                                    <a href="#">Favoritos</a>
                                </li>
                            @endif
                            {{-- se for diferente de 1, é pq é 2, ent, é restaurante --}}
                            @if (auth()->user()->tipo != 1)
                                {{-- aparecerá apenas para restaurantes registrados --}}
                                <li><i class="fa-solid fa-utensils" style="color: #000000;"></i>
                                    <a href="{{ route('parceiros.meuRestaurante') }}">Meu Restautante</a>
                                </li>
                            @endif

                            <li>
                                <i class="fa-solid fa-right-from-bracket" style="color: #000000;"></i>
                                <a href="{{ route('logout') }}">Sair</a>
                            </li>

                        @endauth

                        @guest
                            <li>
                                <i class="fa-solid fa-handshake" style="color: #000000;"></i>
                                <a href="{{ route('parceiros.sejaParceiro') }}">Seja um dos nossos
                                    parceiros</a>
                            </li>
                        @endguest
                    </ul>
                </nav>

                @guest
                    <div class="botaoLoginCadastro">

                        <button><a href="{{ route('login.form') }}">Login</a></button>
                        <button><a href="{{ route('usuario.cadastro') }}">Cadastrar</a></button>

                    </div>
                @endguest

            </div>

        </div>

    </header>

    @yield('conteudo')

    <footer id="rodape">
        <div class="container agrupaRodape">

            <div class="colunaRodape">

                <div class="infoRestaurante linhaRodape">

                    <div class="rodape-logo">

                        <a href="{{ route('site.index') }}"><img src="{{ asset('img/bua3.png') }}"></a>

                    </div>

                    <p>Necessary, making this the first true generator on the Internet. It uses a dictionary of over
                    </p>

                    <div class="redesRestaurante">
                        <div class="icone"><a href="https://facebook.com"><i class="fa-brands fa-facebook-f"
                                    style="color: #000000;"></i></a></div>

                        <div class="icone">
                            <a href="https://instagram.com"><i class="fa-brands fa-instagram"
                                    style="color: #000000;"></i></a>
                        </div>

                        <div class="icone">
                            <a href="https://twitter.com"><i class="fa-brands fa-x-twitter"
                                    style="color: #000000;"></i></a>
                        </div>
                    </div>
                </div>

                <div class="linhaRodape">
                    <h2>Links Rápidos</h2>
                    <ul>
                        <li><a href="{{ route('site.index') }}">Home</a></li>
                        <li><a href="{{ route('site.cardapio') }}">Menu</a></li>
                        <li><a href="{{ route('usuario.minhaConta') }}">Àrea do usuário</a></li>
                    </ul>
                </div>

                <div class="linhaRodape">
                    <h2>Sobre Nós</h2>
                    <ul>
                        <li><a href="#">Localização</a></li>
                        <li><a href="{{ route('site.politica') }}">Políticas</a></li>
                        <li><a href="{{ route('site.sobre') }}">Sobre Nós</a></li>
                    </ul>
                </div>

                <div class="linhaRodape">
                    <h2>Contato</h2>
                    <ul>
                        <li>Rua São Luís</li>
                        <li>(11) 12233-2414</li>
                        <li>demo@gmail.com</li>
                    </ul>
                </div>

            </div>

        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
