@extends('layouts.site')

@section('conteudo')
    <link rel="stylesheet" href="{{ asset('css/usuariosCss/minhasInformacoes.css') }}">
    <style>
        body {
            background-color: #fff
        }

        .hakuna {
            margin-right: 20px
        }

        /* formatando parte de endereços */

        .tituloEndereco {
            padding-left: 30px;

            margin-top: 15px;
            /* margin-bottom: 15px; */
        }

        .tituloEndereco p {
            width: 65%;
            padding-top: 5px;
            font-size: 0.9rem;
            color: #918f8f;
        }

        .agrupaEndereco label {
            position: absolute;
            top: 1px;
            left: 0.2rem;
            font-size: 0.875rem;
            color: #8B8B8B;
            pointer-events: none;

            padding: 0 0.25rem;
            margin-right: 10px
        }

        .agrupaEndereco input {
            background-color: #F8F8F8;
            width: 400px;
            height: 50px;

            border: 1px solid #C5C5C5;
            border-radius: 4px;

            padding-top: 1.25rem;
            /* espaço de onde o usuário vai começar a digitar 0.25*/
            padding-left: 0.50rem;
            transition: all 0.3s ease;

            font-size: 1rem;
        }

        .agrupaEndereco input:hover {
            border-color: #A5A5A5;
        }

        .agrupaEndereco input:focus {
            background-color: #FFF;
            border-color: #80bdff;
            /* Remove o outline padrão */
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .agrupaSecaoEndereco {
            display: flex;
            padding-left: 30px;
            margin-top: 15px
        }

        .agrupaEndereco .limitaLabel {
            margin-right: 30px
        }

        /* alterando propriedades do botão de salvar */

        .botaoAdicionar {

            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 1.1rem;

            padding: 6px 40px;
            margin-top: 50px;

            background-color: #8C6342;
            color: #fff;

            border: none;
            border-radius: 5px;

            transition: all 0.3s ease;

        }

        .botaoAdicionar:hover {
            background-color: #755439;
            cursor: pointer;
        }

        #botaoCancelar {
            background-color: #fff;
            color: #8C6342;
            border: 1px solid #8C6342;
            margin-right: 10px
        }

        #botaoCancelar:hover {
            background-color: #755439;
            color: #fff;
            cursor: pointer;
        }
    </style>

    <div class="tituloEditUser">
        <h2>Configurações da conta</h2>
        <p>Gerencie as detalhes de sua conta.</p>
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

                <div class="agrupaCampoCartao">

                    <h4 id="tituloDetalhes" class="margem">Detalhes pessoais</h4>

                    <div class="margem">

                        <div class="hakuna">

                            <div class="limitaLabel  "> <label for="nome">Nome</label>
                                <input type="text" maxlength="25" name="nome" id="nome">
                            </div>

                            <div class="editPayment">
                                <a href="#">

                                    <img src="{{ asset('img/lapisEdit.png') }}" alt="">

                                </a>
                            </div>

                        </div>

                        <div class="hakuna ">

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

                <div class="changePassword" style="margin-top: 25px ">
                    <h2 style="font-weight: 500;">Alteração de senha</h2>
                    <p>Para sua segurança, recomendamos enfaticamente que escolha uma senha única, que não seja usada para
                        nenhuma outra conta on-line.
                    </p>
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

                    <div class="listaAvisoSenha">
                        <ul>
                            <li>Não use nenhuma de suas senhas anteriores</li>
                            <li>Use 7 caracteres ou mais</li>
                            <li>use pelo menos 1 letra</li>
                            <li>Use pelo menos 1 número</li>
                            <li>Sem espaços</li>
                        </ul>
                    </div>

                    <div style="margin-top: 10px;">

                        <div class="limitaLabel"> <label for="confirm_password">Digite a nova senha novamente</label>
                            <input type="password" name="confirm_password" id="confirm_password">
                        </div>

                    </div>

                </div>

                <div class="tituloEndereco" style="margin-top: 25px">
                    <h2 style="font-weight: 500;">Endereço</h2>
                    <p>Para sua segurança, recomendamos enfaticamente que escolha uma senha única, que não seja usada para
                        nenhuma outra conta on-line.
                    </p>
                </div>

                <div class="agrupaEndereco">

                    <div class="agrupaSecaoEndereco">

                        <div class="limitaLabel"> <label for="linhaEndereco">Linha de endereço</label>
                            <input type="text" name="linhaEndereco" id="linhaEndereco" maxlength="40">
                        </div>

                        <div class="limitaLabel"> <label for="numero">Número</label>
                            <input type="text" name="numero" id="numero" maxlength="3">
                        </div>

                    </div>

                    <div class="agrupaSecaoEndereco">

                        <div class="limitaLabel"> <label for="cidade">Cidade</label>
                            <input type="text" name="cidade" id="cidade" maxlength="20">
                        </div>

                        <div class="limitaLabel"> <label for="cep">CEP</label>
                            <input type="text" name="cep" id="cep" maxlength="15">
                        </div>

                    </div>

                    <div class="agrupaSecaoEndereco">

                        <div class="limitaLabel"> <label for="complemento">Complemento</label>
                            <input type="text" name="complemento" id="complemento" maxlength="15">
                        </div>

                    </div>

                </div>

                <div class="posicionaBotaoSubmit">

                    <a href="{{ route('usuario.minhaConta') }}" class="botaoAdicionar"
                        id="botaoCancelar">Voltar</a>

                    <button type="submit" class="botaoAdicionar">Salvar</button>

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
