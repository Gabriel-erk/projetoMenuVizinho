@extends('layouts.site')

{{-- <!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

@section('conteudo')
    <style>
        /* formatação padrão do template */
        body {
            background-color: #fff;
            font-family: 'Poppins', sans-serif;
        }

        .tituloEditUser {

            padding: 30px;
            border-bottom: 1px solid #CCCCCC;

        }

        .tituloEditUser h2 {
            font-weight: 500;
        }

        /* titulo da seção */

        #tituloDetalhes {
            font-weight: bold;
            padding-bottom: 10px;
        }

        /* formatação bloco1InfoCartão */
        .limitaLabel {
            position: relative;
        }

        .agrupaCampoCartao,
        .agrupaAlteracaoSenha {
            margin-top: 20px;
        }

        .agrupaCampoCartao input {
            background-color: #F8F8F8;
            width: 300px;
            height: 50px;

            border: 1px solid #C5C5C5;
            border-radius: 4px;

            padding-top: 1.25rem;
            /* espaço de onde o usuário vai começar a digitar */
            padding-left: 0.50rem;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .agrupaCampoCartao input:hover,
        .agrupaAlteracaoSenha input:hover {
            border-color: #A5A5A5;
        }

        .agrupaCampoCartao input:focus,
        .agrupaAlteracaoSenha input:focus {
            background-color: #FFF;
            border-color: #80bdff;
            /* Remove o outline padrão */
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
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
            margin-right: 50px;
            display: flex;
        }

        .margem {
            padding-left: 30px;
            display: flex;
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
            cursor: pointer;
        }

        /* divisor de detalhes pessoais - alteração senha  */

        .divisor {
            border-bottom: 1px solid #ccc;
            margin-top: 20px;
            padding-bottom: 25px;
        }

        /* formatação da parte de trocar senha */

        .agrupaAlteracaoSenha {
            padding-left: 30px
        }

        .agrupaAlteracaoSenha input {
            background-color: #F8F8F8;
            width: 300px;
            height: 50px;

            border: 1px solid #C5C5C5;
            border-radius: 4px;

            padding-top: 1.25rem;
            /* espaço de onde o usuário vai começar a digitar 0.25*/
            padding-left: 0.50rem;
            transition: all 0.3s ease;

            font-size: 1rem;
        }

        .agrupaAlteracaoSenha label {
            position: absolute;
            top: 1px;
            left: 0.2rem;
            font-size: 0.875rem;
            color: #8B8B8B;
            pointer-events: none;

            padding: 0 0.25rem;
        }

        .changePassword {
            padding-left: 30px;

            margin-top: 15px;
            margin-bottom: 15px;
        }
    </style>

    <div class="tituloEditUser">
        <h2>Informações da conta</h2>
    </div>

    <div class="conteudo">

        <div class="detalhesDaConta">

            <form action="" method="">

                <div class="agrupaCampoCartao">

                    <h4 id="tituloDetalhes" class="margem">Detalhes da conta</h4>

                    <div class="margem">

                        <div class="hakuna">

                            <div class="limitaLabel "> <label for="email">Endereço de e-mail</label>
                                <input type="text" maxlength="100" name="email" id="email">
                            </div>

                            <div class="editPayment">
                                <a href="#">

                                    <img src="{{ asset('img/lapisEdit.png') }}" alt="">

                                </a>
                            </div>

                        </div>

                        <div class="hakuna ">
                            {{-- Note que o input tem o type="tel", esse type é indicado para telefones e o mais legal é que no mobile esse campo abre o teclado numérico --}}
                            <div class="limitaLabel "> <label for="telefone">Telefone</label>
                                <input type="tel" maxlength="15" name="telefone" id="telefone" onkeyup="phone(event)">
                            </div>

                            <div class="editPayment">
                                <a href="#">

                                    <img src="{{ asset('img/lapisEdit.png') }}" alt="">

                                </a>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="agrupaCampoCartao divisor">

                    <h4 id="tituloDetalhes" class="margem">Detalhes pessoais</h4>

                    <div class="margem">

                        <div class="d-flex hakuna">

                            <div class="limitaLabel  "> <label for="nome">Nome</label>
                                <input type="text" maxlength="25" name="nome" id="nome">
                            </div>

                            <div class="editPayment">
                                <a href="#">

                                    <img src="{{ asset('img/lapisEdit.png') }}" alt="">

                                </a>
                            </div>

                        </div>

                        <div class="d-flex hakuna ">

                            <div class="limitaLabel "> <label for="sobrenome">Sobrenome</label>
                                <input type="text" maxlength="80" name="sobrenome" id="sobrenome">
                            </div>

                            <div class="editPayment">
                                <a href="#">

                                    <img src="{{ asset('img/lapisEdit.png') }}" alt="">

                                </a>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="changePassword">
                    <h3 style="font-weight: 500;">Alteração de senha</h3>
                </div>

                <div class="agrupaAlteracaoSenha">

                    <div>

                        <h4 style="font-weight: bold; margin-bottom: 5px;" class="mb-2">Senha atual</h4>

                        <div class="limitaLabel"> <label for="password">Senha atual</label>
                            <input type="password" name="password" id="password">
                        </div>

                    </div>

                    <div style="margin-top: 15px;">

                        <h4 style="font-weight: bold; margin-bottom: 5px;">Nova Senha</h4>

                        <div class="limitaLabel"> <label for="new_password">Nova Senha</label>
                            <input type="password" name="new_password" id="new_password">
                        </div>

                    </div>

                    <div style="margin-top: 10px;">

                        <div class="limitaLabel"> <label for="confirm_password">Confirmar senha
                                nova</label>
                            <input type="password" name="confirm_password" id="confirm_password">
                        </div>

                    </div>

                </div>

                <div class="posicionaBotaoSubmit">
                    <button type="submit" class="botaoAdicionar">Salvar alterações</button>

                </div>
            </form>

        </div>

    </div>

    <script>
        /* formatação da máscara do campo telefone com regex */

        const phone = (event) => {
            let input = event.target
            input.value = phoneMask(input.value)
        }

        const phoneMask = (value) => {
            // se o valor de 'value' for falso, retorne uma string vazia
            if (!value) return ""
            value = value.replace(/\D/g, '')
            value = value.replace(/(\d{2})(\d)/, "($1) $2")
            value = value.replace(/(\d)(\d{4})$/, "$1-$2")
            return value
        }
    </script>
@endsection

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script> --}}
