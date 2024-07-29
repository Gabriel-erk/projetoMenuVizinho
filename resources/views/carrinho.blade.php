@extends('layouts.site')

{{-- <link rel="stylesheet" href="./css/carrinho2.css"> --}}
<link rel="stylesheet" href="{{ asset('css/siteCss/carrinho2.css') }}">


<!-- adicionando fonte 3 (Signika Negative) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Signika+Negative:wght@300..700&display=swap" rel="stylesheet">

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
            /* position: relative; */
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
                            <img src="./img/pix-img.png">
                            <p>PIX</p>
                        </div>

                    </div>

                    <div class="formaPagamento">

                        <div class="imgTituloFormaPagamento">
                            <img src="./img/credit-card.png">
                            <p>Cartão de crédito</p>
                        </div>

                        <p><a href="#">Adicionar</a></p>
                    </div>

                    <div class="formaPagamento">

                        <div class="imgTituloFormaPagamento">
                            <img src="./img/credit-card.png">
                            <p>Cartão de débito</p>
                        </div>

                        <p><a href="#">Adicionar</a></p>
                    </div>

                </div>

                <div id="pagamentoSalvo" class="formaPagar">
                    <h3>Cartões Salvos</h3>

                    <div class="formaPagamento">

                        <div class="imgTituloFormaPagamento">
                            <img src="./img/bandeiraCartao.png">
                            <p class="nomeCartao">Mastercard ****5090</p>
                        </div>

                        <p><a href="#">Apagar</a></p>
                    </div>

                    <div class="formaPagamento">

                        <div class="imgTituloFormaPagamento">
                            <img src="./img/bandeiraCartao.png">
                            <p class="nomeCartao">Mastercard ****5090</p>
                        </div>

                        <p><a href="#">Apagar</a></p>
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
                                <img src="./img/cupom-carrinho.png">
                            </div>

                            <div class="desc-cupom">
                                <h2>15R$ para lanches que possuem Bacon</h2>
                                <p>OBS: Valido para pedidos acima de 25R$</p>
                            </div>

                        </div>

                        <div class="imgCupom2">
                            <img src="./img/disponivel.webp">
                        </div>
                    </div>

                    <p class="lanchesDisponiveis">VER LANCHES DISPONIVEIS
                    </p>

                </div>

                <div class="cuponsDisponiveis">

                    <div class="agrupaCupom">

                        <div class="infoCupom">
                            <div>
                                <img src="./img/cupom-carrinho.png">
                            </div>

                            <div class="desc-cupom">
                                <h2>15R$ para lanches que possuem Bacon</h2>
                                <p>OBS: Valido para pedidos acima de 25R$</p>
                            </div>

                        </div>

                        <div class="imgCupom2">
                            <img src="./img/disponivel.webp">
                        </div>

                    </div>

                    <p class="lanchesDisponiveis">VER LANCHES DISPONIVEIS
                    </p>

                </div>

            </div>

        </div>

        <div class="listaCarrinho">

            <button id="limpaCarrinho">Limpar</button>

            <div class="agrupaItemCarrinho">
                <img src="./img/cheeseburguer.png">


                <div class="info-lanche">
                    <h2>Mrs. King Cheddar Extra</h2>
                    <p class="descricao">Um hambúrguer com duas carnes bovinas grelhad...</p>
                    <p class="valor">R$ 39,99</p>
                </div>

                <div class="quantidadeCarrinho">
                    <div class="iconeValorCarrinho">
                        <i class="fa-solid fa-minus" style="color: #8C6342;"></i>
                        <strong>0</strong>
                        <i class="fa-solid fa-plus" style="color: #8C6342;"></i>
                    </div>
                </div>


            </div>

            <div class="agrupaItemCarrinho">
                <img src="./img/duplo-cheddar.png">
                <div class="info-lanche">
                    <h2>Mrs. King Cheddar Extra</h2>
                    <p class="descricao">Um hambúrguer com duas carnes bovinas grelhad...</p>
                    <p class="valor">R$ 39,99</p>
                </div>

                <div class="quantidadeCarrinho">
                    <div class="iconeValorCarrinho">
                        <i class="fa-solid fa-minus" style="color: #8C6342;"></i>
                        <strong>0</strong>
                        <i class="fa-solid fa-plus" style="color: #8C6342;"></i>
                    </div>

                </div>
            </div>
        </div>

        <div class="aproveiteTambem">
            <h2>Aproveite Também</h2>
            <div class="listaAproveiteTambem owl-carousel">

                <div class="produtoListaAproveiteTambem item">
                    <div class="imgProdutoAproveiteTambem">
                        <img src="./img/img-corrigida/duplo-cheddar.png">
                        <div class="iconeMaisAproveiteTambem">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </div>
                    </div>

                    <div class="informacoesProdutoAproveiteTambem">
                        <div class="tituloValorAproveiteTambem">
                            <h3>Combo Mrs.Duplo Cheddar</h3>
                            <p>$15.90</p>
                        </div>
                        <div class="descricaoProdutoAproveiteTambem">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula
                                vestibulum ullamcorper vel eget libero.</p>
                        </div>
                    </div>
                </div>

                <div class="produtoListaAproveiteTambem">
                    <div class="imgProdutoAproveiteTambem">
                        <img src="./img/img-corrigida/duplo-cheddar.png">

                        <div class="iconeMaisAproveiteTambem">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </div>
                    </div>
                    <div class="informacoesProdutoAproveiteTambem">
                        <div class="tituloValorAproveiteTambem">
                            <h3>Combo Mrs.Duplo Cheddar</h3>
                            <p>$15.90</p>
                        </div>
                        <div class="descricaoProdutoAproveiteTambem">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula
                                vestibulum ullamcorper vel eget libero.</p>
                        </div>
                    </div>
                </div>

                <div class="produtoListaAproveiteTambem">
                    <div class="imgProdutoAproveiteTambem">
                        <img src="./img/img-corrigida/duplo-cheddar.png">

                        <div class="iconeMaisAproveiteTambem">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </div>
                    </div>
                    <div class="informacoesProdutoAproveiteTambem">
                        <div class="tituloValorAproveiteTambem">
                            <h3>X-Salada</h3>
                            <p>$15.90</p>
                        </div>
                        <div class="descricaoProdutoAproveiteTambem">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula
                                vestibulum ullamcorper vel eget libero.</p>
                        </div>
                    </div>
                </div>

                <div class="produtoListaAproveiteTambem">
                    <div class="imgProdutoAproveiteTambem">
                        <img src="./img/img-corrigida/duplo-cheddar.png">

                        <div class="iconeMaisAproveiteTambem">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </div>
                        <div class="iconeAdicionarAproveiteTambem">

                        </div>
                    </div>

                    <div class="informacoesProdutoAproveiteTambem">
                        <div class="tituloValorAproveiteTambem">
                            <h3>Combo Mrs.Duplo Cheddar</h3>
                            <p>$15.90</p>
                        </div>
                        <div class="descricaoProdutoAproveiteTambem">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula
                                vestibulum ullamcorper vel eget libero.</p>
                        </div>
                    </div>

                </div>

                <div class="produtoListaAproveiteTambem">
                    <div class="imgProdutoAproveiteTambem">
                        <img src="./img/img-corrigida/duplo-cheddar.png">
                        <div class="iconeMaisAproveiteTambem">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </div>
                    </div>

                    <div class="informacoesProdutoAproveiteTambem">
                        <div class="tituloValorAproveiteTambem">
                            <h3>Combo Mrs.Duplo Cheddar</h3>
                            <p>$15.90</p>
                        </div>
                        <div class="descricaoProdutoAproveiteTambem">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula
                                vestibulum ullamcorper vel eget libero.</p>
                        </div>
                    </div>
                </div>

                <div class="produtoListaAproveiteTambem">
                    <div class="imgProdutoAproveiteTambem">
                        <img src="./img/img-corrigida/duplo-cheddar.png">
                        <div class="iconeMaisAproveiteTambem">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </div>
                    </div>

                    <div class="informacoesProdutoAproveiteTambem">
                        <div class="tituloValorAproveiteTambem">
                            <h3>Combo Mrs.Duplo Cheddar</h3>
                            <p>$15.90</p>
                        </div>
                        <div class="descricaoProdutoAproveiteTambem">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula
                                vestibulum ullamcorper vel eget libero.</p>
                        </div>
                    </div>
                </div>

                <div class="produtoListaAproveiteTambem">
                    <div class="imgProdutoAproveiteTambem">
                        <img src="./img/img-corrigida/duplo-cheddar.png">
                        <div class="iconeMaisAproveiteTambem">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        </div>
                    </div>

                    <div class="informacoesProdutoAproveiteTambem">
                        <div class="tituloValorAproveiteTambem">
                            <h3>Combo Mrs.Duplo Cheddar</h3>
                            <p>$15.90</p>
                        </div>
                        <div class="descricaoProdutoAproveiteTambem">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit eu ligula
                                vestibulum ullamcorper vel eget libero.</p>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="pagamento-e-cupom">
            <h3>Pagamento pelo site</h3>
            <div class="pagamento">

                <div class="img-texto-pagamento">

                    <div class="imgPagamentoCupom">
                        <img src="./img/credit-card.png" height="50px">

                    </div>

                    <div class="textoPagamento">
                        <h4>Crédito</h4>
                        <p>Mastercard ****5090</p>
                    </div>

                </div>

                <div class="botaoAlterar">


                    <a href="#" id="botaoAlterar">Alterar</a>
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
                    <a href="#" id="botaoAdicionar">Adicionar</a>
                </div>

            </div>
        </div>

        <div class="pagamentoCarrinho">
            <h2>Resumo dos valores</h2>
            <div class="valoresCarrinho">
                <p>Taxa de entrega: 50,90</p>
                <p>Cupom Aplicado: -50,90</p>
                <p>Total: 20,90</p>
            </div>

            <div class="finaliza">
                <h1>Finalizar Compra</h1>
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
