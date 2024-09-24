@extends('layouts.site')

{{-- <link rel="stylesheet" href="./css/carrinho2.css"> --}}
<link rel="stylesheet" href="{{ asset('css/siteCss/carrinho2.css') }}">

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

        /* produto lista aproveite também */
        .produtoListaAproveiteTambem {
            background-color: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.06);
            border-radius: 7px;
            font-family: 'Cabin', sans-serif;
            padding: 5%;
            height: 45vh;
            width: 22vw;

            margin-top: 20px;
            margin-bottom: 50px;
            margin-left: 20px;
            transition: border-color 0.3s ease-out, background-color 0.3s ease-out, transform 0.3s ease-out;
        }

        .produtoListaAproveiteTambem:hover {
            border-color: #e9e2e2;
            background-color: #f9f9f9;
            transform: scale(1.02);
        }
    </style>
    <main>
        <!-- mini-tela pagamento -->

        <div id="pagamento" class="telaPagamento">

            <div class="fundoMiniTelaPagamento" id="fundoMiniTelaPagamento">
                <i id="fechar-mini-tela" class="fa-solid fa-times"></i>

                <div id="metodo-pagamento" class="formaPagar">
                    <div class="formaPagamento">

                        <div class="imgTituloFormaPagamento">
                            <img src="{{ asset('img/pix-img.png') }}">
                            <p>PIX</p>
                        </div>

                    </div>

                    <div class="formaPagamento">

                        <div class="imgTituloFormaPagamento">
                            <img src="{{ asset('img/credit-card.png') }}">
                            <p>Cartão de crédito</p>
                        </div>

                        <p><a href="{{ route('usuario.novaFormaPagamento') }}">Adicionar</a></p>
                    </div>

                    <div class="formaPagamento">

                        <div class="imgTituloFormaPagamento">

                            <img src="{{ asset('img/credit-card.png') }}">
                            <p>Cartão de débito</p>
                        </div>

                        <p><a href="{{ route('usuario.novaFormaPagamento') }}">Adicionar</a></p>
                    </div>

                </div>

                <div id="pagamentoSalvo" class="formaPagar">
                    <h3>Cartões Salvos</h3>

                    <div class="formaPagamento">

                        <div class="imgTituloFormaPagamento">
                            <div class="imgFormaPagamento">

                                <img src="{{ asset('img/bandeiraCartao.png') }}">
                            </div>
                            <p class="nomeCartao">••5123</p>
                            <p class="dataCartao">09/32</p>
                        </div>

                        {{-- removendo pois acredito que não seja a melhor escolha deixar para o usuário excluir um cartão por aqui, neste exato momento da aplicação --}}
                        {{-- <p><a href="#">Apagar</a></p> --}}

                    </div>

                    <div class="formaPagamento">

                        <div class="imgTituloFormaPagamento">
                            <div class="imgFormaPagamento">

                                <img src="{{ asset('img/bandeiraCartao.png') }}">
                            </div>
                            <p class="nomeCartao">••5123</p>
                            <p class="dataCartao">09/32</p>
                        </div>

                        {{-- removendo pois acredito que não seja a melhor escolha deixar para o usuário excluir um cartão por aqui, neste exato momento da aplicação --}}
                        {{-- <p><a href="#">Apagar</a></p> --}}

                    </div>
                </div>

            </div>

        </div>

        <!-- mini-tela cupom -->
        <div id="cupom-disponivel">

            <div class="fundoMiniTelaCupom">

                <i id="fechar-mini-tela2" class="fa-solid fa-times"></i>

                <div class="cuponsDisponiveis">

                    <div class="agrupaCupom">

                        <div class="infoCupom">
                            <div>
                                <img src="{{ asset('img/cupom-carrinho.png') }}">
                            </div>

                            <div class="desc-cupom">
                                <h2>15R$ para lanches que possuem Bacon</h2>
                                <p>Disponivel para a compra atual</p>
                            </div>

                        </div>

                        {{-- removendo pois acho que é meio sem sentido, já existe uma frase dizendo que tem cupons disponiveis, e ao clicar irá mostrar apenas os disponiveis para aquela compra --}}
                        {{-- <div class="imgCupom2">
                            <img src="./img/disponivel.webp">
                            <img src="./img/disponivel.webp">
                        </div> --}}

                    </div>

                    <p class="lanchesDisponiveis">ADICIONAR CUPOM
                    </p>

                </div>

                <div class="cuponsDisponiveis">

                    <div class="agrupaCupom">

                        <div class="infoCupom">
                            <div>
                                <img src="{{ asset('img/cupom-carrinho.png') }}">
                            </div>

                            <div class="desc-cupom">
                                <h2>15R$ para lanches que possuem Bacon</h2>
                                <p>OBS: Valido para pedidos acima de 25R$</p>
                            </div>

                        </div>

                        {{-- <div class="imgCupom2">
                            <img src="./img/disponivel.webp">
                        </div> --}}

                    </div>

                    <p class="lanchesDisponiveis">ADICIONAR CUPOM
                    </p>

                </div>

            </div>

        </div>
        {{-- antes: .listaCarrinho --}}
        <div style="background-color: #f9eed9">

            <button id="limpaCarrinho" class="rounded mt-2 position-absolute"
                style="font-family: 'Cabin', sans-serif; background-color:#8C6342; color:#ffffff; border:none; padding: 0.5em 1.9em; right:2em">Limpar</button>

            <div class="d-flex align-items-center pb-3">
                <img src="./img/cheeseburguer.png" style="height: 23vh; width: 15vw">

                <div class="ps-2">
                    <h2 class="fs-2" style="color:#8C6342; font-family: 'Titan One', sans-serif; fw-normal">Mrs. King
                        Cheddar Extra</h2>
                    <p class="fw-normal" style="color: #979797; font-family:'Signika Negative', sans-serif;">Um hambúrguer
                        com duas carnes bovinas grelhad...</p>
                    <p class="fw-semibold fs-3" style="font-family: 'Poppins', sans-serif;">R$ 39,99</p>
                </div>

                <div style="width: 30%; font-family:'Poppins',sans-serif">
                    <div class="d-flex justify-content-between align-items-center py-1 px-2"
                        style="margin-left: 40%; width: 9vw; background-color: #d9d9d9; border-radius: 12px">
                        <i class="fa-solid fa-minus" style="color: #8C6342;"></i>
                        <strong>0</strong>
                        <i class="fa-solid fa-plus" style="color: #8C6342;"></i>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center pb-3">
                <img src="./img/cheeseburguer.png" style="height: 23vh; width: 15vw">

                <div class="ps-2">
                    <h2 class="fs-2" style="color:#8C6342; font-family: 'Titan One', sans-serif; fw-normal">Mrs. King
                        Cheddar Extra</h2>
                    <p class="fw-normal" style="color: #979797; font-family:'Signika Negative', sans-serif;">Um hambúrguer
                        com duas carnes bovinas grelhad...</p>
                    <p class="fw-semibold fs-3" style="font-family: 'Poppins', sans-serif;">R$ 39,99</p>
                </div>

                <div style="width: 30%; font-family:'Poppins',sans-serif">
                    <div class="d-flex justify-content-between align-items-center py-1 px-2"
                        style="margin-left: 40%; width: 9vw; background-color: #d9d9d9; border-radius: 12px">
                        <i class="fa-solid fa-minus" style="color: #8C6342;"></i>
                        <strong>0</strong>
                        <i class="fa-solid fa-plus" style="color: #8C6342;"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="aproveiteTambem" style="border-top: 2px solid #ccc; border-bottom: 2px solid #ccc">
            <h2 class="fw-medium ps-3 pt-3" style="font-family: 'Poppins', sans-serif;">Aproveite Também</h2>
            <div class="d-flex owl-carousel">

                <div class="produtoListaAproveiteTambem item">
                    <div class="imgProdutoAproveiteTambem position-relative">

                        <a href="{{ route('site.produto') }}">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" class="p-3"
                                style="height: 58%">
                        </a>

                        <div class="position-absolute rounded-circle" style="bottom: 0.4rem; right: 1rem; padding: 0.75rem 0.95rem; background-color: #8c6342">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </div>
                    </div>

                    <div class="informacoesProdutoAproveiteTambem">
                        <div class="tituloValorAproveiteTambem d-flex justify-content-between mt-3">
                            <h3 class="fs-5">Combo Mrs.Duplo Cheddar</h3>
                            <span class="fs-6">$15.90</span>
                        </div>

                        <div>
                            <span class="mt-2 text-break" style="width: 70%">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula
                                vestibulum ullamcorper vel eget libero.</span>
                        </div>
                    </div>
                </div>

                <div class="produtoListaAproveiteTambem item">
                    <div class="imgProdutoAproveiteTambem position-relative">

                        <a href="{{ route('site.produto') }}">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" class="p-3"
                                style="height: 58%">
                        </a>

                        <div class="position-absolute rounded-circle" style="bottom: 0.4rem; right: 1rem; padding: 0.75rem 0.95rem; background-color: #8c6342">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </div>
                    </div>

                    <div class="informacoesProdutoAproveiteTambem">
                        <div class="tituloValorAproveiteTambem d-flex justify-content-between mt-3">
                            <h3 class="fs-5">Combo Mrs.Duplo Cheddar</h3>
                            <span class="fs-6">$15.90</span>
                        </div>

                        <div>
                            <span class="mt-2 text-break" style="width: 70%">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula
                                vestibulum ullamcorper vel eget libero.</span>
                        </div>
                    </div>
                </div>

                <div class="produtoListaAproveiteTambem item">
                    <div class="imgProdutoAproveiteTambem position-relative">

                        <a href="{{ route('site.produto') }}">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" class="p-3"
                                style="height: 58%">
                        </a>

                        <div class="position-absolute rounded-circle" style="bottom: 0.4rem; right: 1rem; padding: 0.75rem 0.95rem; background-color: #8c6342">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </div>
                    </div>

                    <div class="informacoesProdutoAproveiteTambem">
                        <div class="tituloValorAproveiteTambem d-flex justify-content-between mt-3">
                            <h3 class="fs-5">Combo Mrs.Duplo Cheddar</h3>
                            <span class="fs-6">$15.90</span>
                        </div>

                        <div>
                            <span class="mt-2 text-break" style="width: 70%">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula
                                vestibulum ullamcorper vel eget libero.</span>
                        </div>
                    </div>
                </div>

                <div class="produtoListaAproveiteTambem item">
                    <div class="imgProdutoAproveiteTambem position-relative">

                        <a href="{{ route('site.produto') }}">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" class="p-3"
                                style="height: 58%">
                        </a>

                        <div class="position-absolute rounded-circle" style="bottom: 0.4rem; right: 1rem; padding: 0.75rem 0.95rem; background-color: #8c6342">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </div>
                    </div>

                    <div class="informacoesProdutoAproveiteTambem">
                        <div class="tituloValorAproveiteTambem d-flex justify-content-between mt-3">
                            <h3 class="fs-5">Combo Mrs.Duplo Cheddar</h3>
                            <span class="fs-6">$15.90</span>
                        </div>

                        <div>
                            <span class="mt-2 text-break" style="width: 70%">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula
                                vestibulum ullamcorper vel eget libero.</span>
                        </div>
                    </div>
                </div>

                <div class="produtoListaAproveiteTambem item">
                    <div class="imgProdutoAproveiteTambem position-relative">

                        <a href="{{ route('site.produto') }}">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" class="p-3"
                                style="height: 58%">
                        </a>

                        <div class="position-absolute rounded-circle" style="bottom: 0.4rem; right: 1rem; padding: 0.75rem 0.95rem; background-color: #8c6342">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </div>
                    </div>

                    <div class="informacoesProdutoAproveiteTambem">
                        <div class="tituloValorAproveiteTambem d-flex justify-content-between mt-3">
                            <h3 class="fs-5">Combo Mrs.Duplo Cheddar</h3>
                            <span class="fs-6">$15.90</span>
                        </div>

                        <div>
                            <span class="mt-2 text-break" style="width: 70%">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula
                                vestibulum ullamcorper vel eget libero.</span>
                        </div>
                    </div>
                </div>

                <div class="produtoListaAproveiteTambem item">
                    <div class="imgProdutoAproveiteTambem position-relative">

                        <a href="{{ route('site.produto') }}">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" class="p-3"
                                style="height: 58%">
                        </a>

                        <div class="position-absolute rounded-circle" style="bottom: 0.4rem; right: 1rem; padding: 0.75rem 0.95rem; background-color: #8c6342">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </div>
                    </div>

                    <div class="informacoesProdutoAproveiteTambem">
                        <div class="tituloValorAproveiteTambem d-flex justify-content-between mt-3">
                            <h3 class="fs-5">Combo Mrs.Duplo Cheddar</h3>
                            <span class="fs-6">$15.90</span>
                        </div>

                        <div>
                            <span class="mt-2 text-break" style="width: 70%">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula
                                vestibulum ullamcorper vel eget libero.</span>
                        </div>
                    </div>
                </div>

                <div class="produtoListaAproveiteTambem item">
                    <div class="imgProdutoAproveiteTambem position-relative">

                        <a href="{{ route('site.produto') }}">
                            <img src="{{ asset('img/img-corrigida/duplo-cheddar.png') }}" class="p-3"
                                style="height: 58%">
                        </a>

                        <div class="position-absolute rounded-circle" style="bottom: 0.4rem; right: 1rem; padding: 0.75rem 0.95rem; background-color: #8c6342">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </div>
                    </div>

                    <div class="informacoesProdutoAproveiteTambem">
                        <div class="tituloValorAproveiteTambem d-flex justify-content-between mt-3">
                            <h3 class="fs-5">Combo Mrs.Duplo Cheddar</h3>
                            <span class="fs-6">$15.90</span>
                        </div>

                        <div>
                            <span class="mt-2 text-break" style="width: 70%">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula
                                vestibulum ullamcorper vel eget libero.</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="pagamento-e-cupom py-4 px-4" style="font-family: 'Poppins', sans-serif; border-bottom: 2px solid #ccc">
            <h3 class="mb-4">Pagamento pelo site</h3>
            <div class="pagamento d-flex align-items-center justify-content-between mb-2">

                <div class="d-flex">

                    <div class="imgPagamentoCupom">
                        <img src="./img/credit-card.png">
                    </div>

                    <div class="textoPagamento" >
                        <h4>Crédito</h4>
                        <p style="color:#9b9999" class="fw-semibold">Mastercard ****5090</p>
                    </div>

                </div>

                <div class="botaoAlterar">
                    <a href="#" id="botaoAlterar" class="fw-bold text-decoration-none">Alterar</a>
                </div>

            </div>

            <div class="cupom">

                <div class="img-texto-pagamento">

                    <div class="imgPagamentoCupom">
                        <img src="./img/cupom-carrinho.png">
                    </div>

                    <div class="textoPagamento">
                        <h4>Cupom</h4>
                        <p>3 cupons disponiveis para compra</p>
                    </div>

                </div>

                <div class="botaoAlterar">
                    <a href="#" id="botaoAdicionar" class="fw-bold text-decoration-none">Adicionar</a>
                </div>

            </div>
        </div>

        <div class="pagamentoCarrinho">
            <h2>Resumo dos valores</h2>
            <div class="valoresCarrinho">
                <p>- Taxa de entrega: R$ 50,90</p>
                <p>- Cupom Aplicado: R$ -50,90</p>
                <h3 style="margin-top: 2%">Total: R$ 20,90</h3>
            </div>

            <div class="finaliza">
                <button>Finalizar Compra</button>
            </div>

        </div>

    </main>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {

        // Script da mini-tela de formas de pagamento

        // botao que abre a tela 
        const botaoAlterar = document.getElementById('botaoAlterar');
        // tela pagamento
        const divPagamento = document.getElementById('pagamento');
        // botao que fecha a tela
        const fecharMiniTela = document.getElementById('fechar-mini-tela');

        botaoAlterar.onclick = function() {

            event.preventDefault();
            divPagamento.style.display = 'block';

        }

        fecharMiniTela.addEventListener('click', function() {

            divPagamento.style.display = 'none';

        })

        window.onclick = function(event) {
            if (event.target == divPagamento) {
                divPagamento.style.display = 'none';
            }
        }

        // Script da mini-tela de cupom

        // botao que abre a mini tela
        const botaoAdicionar = document.getElementById('botaoAdicionar');
        // a mini tela
        const miniTelaCupom = document.getElementById('cupom-disponivel');
        // botao que fecha a mini tela
        const fecharMiniTela2 = document.getElementById('fechar-mini-tela2');

        botaoAdicionar.onclick = function() {
            event.preventDefault();
            miniTelaCupom.style.display = 'block'
        }

        fecharMiniTela2.addEventListener('click', function() {
            miniTelaCupom.style.display = 'none'
        })

        window.onclick = function(event) {
            if (event.target == miniTelaCupom) {

                miniTelaCupom.style.display = 'none';
            }
        }

    })
</script>
