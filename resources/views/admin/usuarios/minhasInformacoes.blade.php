@extends('layouts.site')

<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

@section('conteudo')
    <style>
        /* formatação padrão do template */
        body {
            background-color: #fff;
        }

        .tituloEditUser {

            padding: 30px;
            border-bottom: 1px solid #CCCCCC;
            font-family: 'Poppins', sans-serif;

        }

        .tituloEditUser h2 {
            font-weight: 500;
        }

        .conteudo {
            padding-left: 30px
        }

        /* titulo da seção */

        #tituloDetalhes {
            font-weight: bold;
            padding-bottom: 10px;
        }

        /* formatação bloco1InfoCartão */

        .agrupaCampoCartao input {
            background-color: #F8F8F8;
            padding-top: 1.25rem;
            padding-left: 0.75rem;
            /* transition: all 0.3s ease; */
        }

        .limitaLabel {
            position: relative;
            width: 400px;
        }

        .agrupaCampoCartao label {
            position: absolute;
            top: 1px;
            left: 0.2rem;
            font-size: 0.875rem;
            color: #8B8B8B;
            pointer-events: none;

            padding: 0 0.25rem;
        }

        /* formatação do lapis */

        .editPayment {
            display: flex;
            align-items: center;
            justify-content: center;

            height: 50px;
            width: 50px;

            border-radius: 5px;
            background-color: #2767C8;
            transition: all 0.3s ease;

            margin-left: 5px;
        }

        .editPayment:hover {
            background-color: #1e59b3;
        }

        .editPayment img {
            width: 35px
        }

        /* formatando botão submit */

        .posicionaBotaoSubmit {
            display: flex;
            justify-content: center;
        }

        .botaoAdicionar {

            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 1.1rem;

            padding: 8px 55px;
            margin-top: 50px;

            background-color: #2767C8;
            color: #fff;

            border: none;
            border-radius: 5px;

            transition: all 0.3s ease;

        }

        .botaoAdicionar:hover {
            background-color: #1e59b3;
        }

        .hakuna {
            margin-right: 50px
        }

    </style>

    <div class="tituloEditUser">
        <h2>Informações da conta</h2>
    </div>

    <div class="conteudo">

        <div class="detalhesDaConta">

            <form action="" method="">

                <div class="mt-5 agrupaCampoCartao">

                    <h4 id="tituloDetalhes">Detalhes da conta</h4>

                    <div class="d-flex">

                        <div class="d-flex hakuna">

                            <div class="limitaLabel  "> <label for="numeroCartao" class="form-label">Número do
                                    cartão</label>
                                <input type="text" name="numeroCartao" id="numeroCartao" class="form-control">
                            </div>

                            <div class="editPayment">
                                <a href="#">

                                    <img src="{{ asset('img/lapisEdit.png') }}" alt="">

                                </a>
                            </div>

                        </div>

                        <div class="d-flex hakuna ">

                            <div class="limitaLabel "> <label for="numeroCartao" class="form-label">Número do
                                    cartão</label>
                                <input type="text" name="numeroCartao" id="numeroCartao" class="form-control">
                            </div>

                            <div class="editPayment">
                                <a href="#">

                                    <img src="{{ asset('img/lapisEdit.png') }}" alt="">

                                </a>
                            </div>

                        </div>

                    </div>

                </div>

                

                <div class="posicionaBotaoSubmit">
                    <button type="submit" class="botaoAdicionar">Adicionar</button>

                </div>
            </form>

        </div>

    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
