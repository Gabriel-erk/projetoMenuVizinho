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
            /* padding-left: 30px */
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

        .hakuna {
            margin-right: 50px
        }

        .margem {
            padding-left: 30px;
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

        /* divisor de detalhes pessoais - alteração senha  */

        .divisor {
            border-bottom: 1px solid #ccc;
        }

        /* formatação da parte de trocar senha */

        .agrupaAlteracaoSenha label{
            left: 1rem;
        }
    </style>

    <div class="tituloEditUser">
        <h2>Informações da conta</h2>
    </div>

    <div class="conteudo">

        <div class="detalhesDaConta">

            <form action="" method="">

                <div class="mt-5 agrupaCampoCartao">

                    <h4 id="tituloDetalhes" class="margem">Detalhes da conta</h4>

                    <div class="d-flex margem">

                        <div class="d-flex hakuna">

                            <div class="limitaLabel  "> <label for="email" class="form-label">Endereço de e-mail</label>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>

                            <div class="editPayment">
                                <a href="#">

                                    <img src="{{ asset('img/lapisEdit.png') }}" alt="">

                                </a>
                            </div>

                        </div>

                        <div class="d-flex hakuna ">

                            <div class="limitaLabel "> <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" name="telefone" id="telefone" class="form-control">
                            </div>

                            <div class="editPayment">
                                <a href="#">

                                    <img src="{{ asset('img/lapisEdit.png') }}" alt="">

                                </a>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="mt-5 pb-4 agrupaCampoCartao divisor">

                    <h4 id="tituloDetalhes" class="margem">Detalhes pessoais</h4>

                    <div class="d-flex margem">

                        <div class="d-flex hakuna">

                            <div class="limitaLabel  "> <label for="nome" class="form-label">Nome</label>
                                <input type="text" name="nome" id="nome" class="form-control">
                            </div>

                            <div class="editPayment">
                                <a href="#">

                                    <img src="{{ asset('img/lapisEdit.png') }}" alt="">

                                </a>
                            </div>

                        </div>

                        <div class="d-flex hakuna ">

                            <div class="limitaLabel "> <label for="sobrenome" class="form-label">Sobrenome</label>
                                <input type="text" name="sobrenome" id="sobrenome" class="form-control">
                            </div>

                            <div class="editPayment">
                                <a href="#">

                                    <img src="{{ asset('img/lapisEdit.png') }}" alt="">

                                </a>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="changePassword margem mt-4 mb-4">
                    <h3>Alteração de senha</h3>
                </div>

                <div class="agrupaAlteracaoSenha agrupaCampoCartao">

                    <div class="row margem">

                        <h4 style="font-weight: bold" class="mb-2">Senha atual</h4>

                        <div class="limitaLabel"> <label for="password" class="form-label">Senha atual</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                    </div>

                    <div class="row margem mt-4">

                        <h4 style="font-weight: bold" class="mb-2">Nova Senha</h4>

                        <div class="limitaLabel"> <label for="new_password" class="form-label">Nova Senha</label>
                            <input type="password" name="new_password" id="new_password" class="form-control">
                        </div>

                    </div>

                    <div class="row margem mt-3">

                        <div class="limitaLabel"> <label for="confirm_password" class="form-label">Confirmar senha nova</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                        </div>

                    </div>

                </div>

                <div class="posicionaBotaoSubmit">
                    <button type="submit" class="botaoAdicionar">Salvar alterações</button>

                </div>
            </form>

        </div>

    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
