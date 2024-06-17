<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mr.Burger - Sua Lanchonete Local!</title>

    <!-- css carrosel -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/main2.css') }}">

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

        <div id="barra-topo" class="container">

            <div class="logotipo">
                <a href="index">
                    <img src="{{ asset('img/bua3.png') }}" alt="" srcset="">
                </a>

            </div>

            <nav id="menu">
                <ul>
                    <li><a href="index">HOME</a></li>
                    <li><a href="ofertas">OFERTAS</a></li>
                    <li><a href="cardapio">CARDÁPIO</a></li>
                    <li><a href="cupons">CUPONS</a></li>
                </ul>
            </nav>

            <div id="botoes">
                <div class="buttonMenu">

                    <div id="contador-carrinho">
                        <span>0</span>
                    </div>

                    <div class="agrupaCarrinho alinharBotoes">
                        <a href="carrinho.html"> <i class="fa-solid fa-bag-shopping" style="color: #ffffff;"></i></a>
                    </div>

                    <div class="iconeMenuLateral alinharBotoes">
                        <i class="fa-solid fa-bars" id="iconeMenu"></i>
                    </div>

                </div>

            </div>

        </div>


        <div class="banner owl-carousel owl-theme">

            @yield('banner')

        </div>

        <div id="agrupaMenuLateral">
            <div id="menuLateral">
                <div class="iconeFechaMenu"> <i id="fechar-menu" class="fa-solid fa-times"></i></div>

                <nav>
                    <ul>
                        <li><i class="fa-solid fa-house" style="color: #000000;"></i>
                            <a href="#">Minha Conta</a>
                        </li>

                        <li>
                            <i class="fa-solid fa-basket-shopping" style="color: #000000;"></i>
                            <a href="#">Meus Pedidos</a>
                        </li>

                        <li>
                            <i class="fa-solid fa-heart" style="color: #000000;"></i>
                            <a href="#">Favoritos</a>
                        </li>

                        <li>
                            <i class="fa-solid fa-handshake" style="color: #000000;"></i>
                            <a href="sejaUmParceiro.html">Seja um dos nossos
                                parceiros</a>
                        </li>

                    </ul>

                </nav>

                <div class="botaoLoginCadastro">

                    <button><a href="login">Login</a></button>
                    <button><a href="cadastro">Cadastrar</a></button>

                </div>
            </div>

        </div>

    </header>

    <section id="lista-cardapio">
        @yield('listaCardapio')
    </section>

    <main class="container">
        @yield('conteudo')
    </main>

    @yield('conteudoAlternativo')


    <footer id="rodape">
        <div class="container agrupaRodape">

            <div class="colunaRodape">

                <div class="infoRestaurante linhaRodape">

                    <div class="rodape-logo">

                        <a href="index.html"><img src="{{ asset('img/bua3.png') }}" href="index.html"></a>

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
                        <li><a href="index">Home</a></li>
                        <li><a href="cardapio">Menu</a></li>
                        <li><a href="#">Àrea do usuário</a></li>
                    </ul>
                </div>

                <div class="linhaRodape">
                    <h2>Sobre Nós</h2>
                    <ul>
                        <li><a href="#">Localização</a></li>
                        <li><a href="politica">Políticas</a></li>
                        <li><a href="sobre">Sobre Nós</a></li>
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
</body>

</html>
