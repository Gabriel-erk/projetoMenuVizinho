@extends('layouts.site')
<link rel="stylesheet" href="{{ asset('css/minhasInformacoes.css') }}">

@section('conteudo')

<style>
    body {
        background-color: #fff 
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
                    <h2 style="font-weight: 500;">Alteração de senha</h2>
                    <p>Para sua segurança, recomendamos enfaticamente que escolha uma senha única, que não seja usada para nenhuma outra conta on-line.
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
