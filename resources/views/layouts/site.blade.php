<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mr.Burger - Sua Lanchonete Local!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- css carrosel -->
    <link rel="stylesheet" href="{{ asset('css/siteCss/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/siteCss/owl.theme.default.min.css') }}">

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
    <style>
        * {
            margin: 0;
            box-sizing: border-box;
            padding: 0;
            text-decoration: none;
        }

        /* declarando aqui para todos os arquivos poderem ter acesso a essas váriaveis */
        :root {
            --cor-primaria: #8C6342;
            --cor-secundaria: #F9EED9;
            --cor-terciaria: #654730;
            --cor-quartenaria: #342F2E;
        }

        /* formatando cabecalho */

        #barra-topo {
            font-family: 'Cabin', sans-serif;
            padding-top: 0.9375rem;
            padding-bottom: 0.9375rem;
        }

        #menu a {
            color: var(--cor-secundaria);
        }

        #menu a:hover {
            color: #fff;
        }

        /* modificando modal/menuLateral com bootstrap */

        .modal {
            width: 400px;
        }

        .modal-content {
            width: 400px
        }

        .list-group-item:hover {
            background-color: rgb(59, 57, 57, 0.164) !important;
        }

        .botaoLoginCadastro button {
            background-color: var(--cor-primaria);
            color: var(--cor-secundaria);
        }

        .botaoLoginCadastro button:hover {
            background-color: var(--cor-terciaria);
        }

        /* rodapé */

        .infoRestaurante p {
            word-wrap: break-word;
            color: #848384;
        }

        .linhaRodape a {
            text-decoration: none;
            color: #848384;
        }

        .linhaRodape li {
            margin-bottom: 0.05rem;
        }

        .linhaRodape a:hover {
            color: #ADACAC;
        }

        /* múltiplas caixas icone, então pode deixar aqui, sem bootstrap */
        .icone {
            margin-right: 0.625rem;
            /* Aproximadamente 15px */
            margin-top: 0.9375rem;
            width: 2rem;
            height: 1.8rem
        }

        /* múltiplos elementos i, então pode deixar aqui, sem bootstrap */
        .icone i {
            width: 1.4rem;
        }

        #rodape {
            margin-top: 3rem;
        }


    </style>

    <header id="cabecalho" style="background-color: var(--cor-primaria)">

        <div id="barra-topo" class="container d-flex justify-content-between align-items-center fw-bold">

            <div>
                <a href="{{ route('site.index') }}">
                    <img src="{{ asset('img/bua3.png') }}" style="width: 10.85vw" alt="" srcset="">
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

            <nav class="navbar navbar-dark">

                <a href="{{ route('lista.carrinho') }}">
                    <button type="button" class="me-3 btn position-relative"
                        style="width: 3em; height: 2.5em; background-color:var(--cor-secundaria)"><i
                            class="fa-solid fa-bag-shopping" style="color: var(--cor-quartenaria);"></i> <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">0
                            <span class="visually-hidden">unread messages</span></span>
                    </button>
                </a>


                <style>
                    .navbar-toggler-icon {
                        /* Remove o ícone padrão */
                        background-image: none;
                        display: flex;
                        flex-direction: column;
                        justify-content: space-evenly;
                        align-items: center;
                    }

                    .navbar-toggler-icon span {
                        display: block;
                        width: 25px;
                        height: 2px;
                        /* Cor das barrinhas */
                        background-color: var(--cor-quartenaria);
                        /* Remove margens adicionais */
                        margin: 0;
                    }
                </style>

                <button class="navbar-toggler" style="background-color: var(--cor-secundaria)" type="button"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <span class="navbar-toggler-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

            </nav>

            <!-- Menu Lateral -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">OPÇÕES</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <nav>
                                <ul class="list-group list-group-flush list-unstyled">
                                    <li class="list-group-item"><i class="fa-solid fa-house"
                                            style="color: #000000;"></i>
                                        <a href="{{ route('usuario.minhaConta') }}"
                                            class="text-decoration-none text-dark ps-2">Minha Conta</a>
                                    </li>
                                    @auth

                                        @if (auth()->user()->tipo == 1)
                                            <li class="list-group-item">
                                                <i class="fa-solid fa-basket-shopping" style="color: #000000;"></i>
                                                <a href="{{ route('usuario.meusPedidos') }}"
                                                    class="text-decoration-none text-dark ps-2">Meus
                                                    Pedidos</a>
                                            </li>

                                            <li class="list-group-item">
                                                <i class="fa-solid fa-heart" style="color: #000000;"></i>
                                                <a href="#" class="text-decoration-none text-dark ps-2">Favoritos</a>
                                            </li>
                                        @endif

                                        <li class="list-group-item">
                                            <i class="fa-solid fa-right-from-bracket" style="color: #000000;"></i>
                                            <a href="{{ route('logout') }}"
                                                class="text-decoration-none text-dark ps-2">Sair</a>
                                        </li>

                                    @endauth

                                    @guest
                                        <li class="list-group-item">
                                            <i class="fa-solid fa-handshake" style="color: #000000;"></i>
                                            <a href="#"
                                                class="text-decoration-none text-dark ps-2">Seja um dos nossos
                                                parceiros</a>
                                        </li>
                                    @endguest
                                </ul>
                            </nav>

                            @guest
                                <div class="botaoLoginCadastro d-grid gap-2 d-md-block text-center mt-4">

                                    <button class="btn"><a href="{{ route('login.form') }}"
                                            class="text-decoration-none text-light">Login</a></button>
                                    <button class="btn"><a href="{{ route('usuario.cadastro') }}"
                                            class="text-decoration-none text-light">Cadastrar</a></button>
                                </div>
                            @endguest
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @yield('banner')

    </header>

    @yield('conteudo')

    <footer id="rodape" class="bg-dark pb-5" style="font-family: 'Poppins', sans-serif; color:#848384">
        <div class="container pb-5" style="border-bottom: 2px solid #333232">

            <div class="d-flex justify-content-between pt-5">

                <div class="infoRestaurante linhaRodape" style="width: 20%">

                    <div id="rodape-logo">
                        <a href="{{ route('site.index') }}"><img src="{{ asset('img/bua3.png') }}"
                                style="width: 14vw"></a>
                    </div>

                    <p>Necessary, making this the first true generator on the Internet. It uses a dictionary of over
                    </p>

                    <div class="d-flex">
                        <div class="icone bg-light rounded-circle" style=""><a href="https://facebook.com"
                                class="w-100 h-100 d-flex justify-content-center align-items-center text-center"><i
                                    class="fa-brands fa-facebook-f" style="color: #000000;"></i></a>
                        </div>

                        <div class="icone bg-light rounded-circle">
                            <a
                                href="https://instagram.com"class="w-100 h-100 d-flex justify-content-center align-items-center text-center"><i
                                    class="fa-brands fa-instagram" style="color: #000000;"></i></a>
                        </div>

                        <div class="icone bg-light rounded-circle">
                            <a href="https://twitter.com"
                                class="w-100 h-100 d-flex justify-content-center align-items-center text-center"><i
                                    class="fa-brands fa-x-twitter" style="color: #000000;"></i></a>
                        </div>
                    </div>
                </div>

                <div class="linhaRodape">
                    <h2>Links Rápidos</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('site.index') }}">Home</a></li>
                        <li><a href="{{ route('site.cardapio') }}">Menu</a></li>
                        <li><a href="{{ route('usuario.minhaConta') }}">Àrea do usuário</a></li>
                    </ul>
                </div>

                <div class="linhaRodape">
                    <h2>Sobre Nós</h2>
                    <ul class="list-unstyled">
                        <li><a href="#">Localização</a></li>
                        <li><a href="{{ route('site.politica') }}">Políticas</a></li>
                        <li><a href="{{ route('site.sobre') }}">Sobre Nós</a></li>
                    </ul>
                </div>

                <div class="linhaRodape">
                    <h2>Contato</h2>
                    <ul class="list-unstyled">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    </script>
</body>

</html>
