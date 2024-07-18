@extends('layouts.site')

@section('conteudo')
    <style>
        body {
            background-color: #fff;
        }

        .imgRestaurante {
            margin-top: 50px;
            margin-bottom: 40px;
            text-align: center;
        }

        .imgRestaurante img {
            width: 100%;
            height: 550px;
        }

        .sobreRestaurante {
            font-family: 'Poppins', sans-serif;
            font-size: large;
            font-weight: 500;
        }

        .textoRestaurante {
            margin-bottom: 20px;
        }

        .linkRestaurante span {
            color: #848384;
        }

        .linkRestaurante a {
            color: #1a57f1;
        }
    </style>

    <main class="container">
        <div class="imgRestaurante">
            <img src="{{ asset("img/img-restaurante.jpg") }}" alt="">
        </div>

        <div class="sobreRestaurante">

            <div class="textoRestaurante">

                Bem-vindo ao Mr. Burger, onde a paixão por hambúrgueres é levada a um novo patamar! Fundado em 2020,
                nosso restaurante nasceu do desejo de criar experiências gastronômicas únicas, combinando ingredientes
                frescos e de alta qualidade com um ambiente acolhedor e moderno.

            </div>

            <div class="textoRestaurante">

                No Mr. Burger, acreditamos que um bom hambúrguer vai além de um simples lanche. Nossa missão é
                proporcionar aos nossos clientes uma explosão de sabores em cada mordida. Utilizamos apenas os melhores
                cortes de carne, temperos especiais e pães artesanais, garantindo que cada hambúrguer seja uma
                verdadeira obra-prima culinária.

            </div>

            <div class="textoRestaurante">

                Tudo começou com dois amigos, amantes de hambúrgueres, que decidiram transformar sua paixão em um
                negócio. Após inúmeras pesquisas e testes de receitas, abriram o primeiro Mr. Burger em um pequeno
                bairro da cidade. O sucesso foi imediato, e em pouco tempo, conquistamos o coração de milhares de
                clientes.

            </div>

            <div class="textoRestaurante">

                No Mr. Burger, cada cliente é parte da nossa história. Venha nos visitar e descubra porque somos mais do
                que apenas um restaurante de hambúrgueres – somos uma família que compartilha uma paixão em comum.
                Agradecemos por escolher o Mr. Burger e esperamos vê-lo em breve!

            </div>

            <div class="textoRestaurante">
                Estamos localizados no coração da cidade, na Rua dos Sabores, 123. Aberto todos os dias da semana, das
                11h às 23h.

            </div>

            <div class="textoRestaurante linkRestaurante">

                <span>Para aproveitar melhor os nossos serviços, visite o site: <a
                        href="index">www.lanchonetelocal.com</a></span> .

            </div>

        </div>
    </main>
@endsection
