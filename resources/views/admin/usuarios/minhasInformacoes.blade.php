@extends('layouts.site')

@section('conteudo')
    <link rel="stylesheet" href="{{ asset('css/usuariosCss/minhasInformacoes.css') }}">
    <style>
        body {
            background-color: #fff
        }

        input {
            font-family: 'Poppins', sans-serif;
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

        .agrupaBotaoSubmit {
            display: flex;
            justify-content: space-between;
            padding-left: 30px;
            padding-right: 30px;
        }

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

        #botaoVoltar {
            padding-top: 7px;
            padding-bottom: 7px
        }

        /* campo fotos */

        .form-group {
            margin-bottom: 1rem;
        }

        .custom-file-container {
            position: relative;
            display: flex;
            align-items: center;
            width: 23.2%;
            height: calc(1.5em + 0.75rem + 2px);
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            padding: 0.375rem 0.75rem;
            background-color: #fff;
            font-size: 1rem;
            color: #495057;
            overflow: hidden;
        }

        .custom-file-input {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .custom-file-label {
            flex: 1;
            padding-left: 0.75rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .custom-file-input:focus~.custom-file-label {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .custom-file-input:valid~.custom-file-label {
            color: #495057;
            background-color: #e9ecef;
            border-color: #ced4da;
        }
    </style>

    <div class="tituloEditUser">
        <h2>Configurações da conta</h2>
        <p>Gerencie as detalhes de sua conta.</p>
    </div>

    <div class="conteudo">

        <div class="detalhesDaConta">

            @if ($errors->any())
                <div class="boxError alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('usuarioAdm.update', ['id' => $usuario->id]) }}" method="post">
                @csrf
                @method('PUT')

                <div class="agrupaCampoCartao">

                    <h4 class="margem" style="margin-bottom:8px; font-weight: 600">Detalhes da conta</h4>

                    <div class="margem">
                        <div class="hakuna">

                            <div class="limitaLabel "> <label for="email">Endereço de e-mail</label>
                                <input type="text" maxlength="100" name="email" id="email"
                                    value="{{ old('email', $usuario->email) }}">
                            </div>

                        </div>

                        <div class="hakuna ">
                            {{-- Note que o input tem o type="tel", esse type é indicado para telefones e o mais legal é que no mobile esse campo abre o teclado numérico --}}
                            <div class="limitaLabel "> <label for="telefone">Telefone</label>
                                <input type="tel" maxlength="15" name="telefone" id="telefone" onkeyup="phone(event)"
                                    value="{{ old('telefone', $usuario->telefone) }}">
                            </div>

                        </div>

                        <div class="hakuna ">
                            {{-- Note que o input tem o type="tel", esse type é indicado para telefones e o mais legal é que no mobile esse campo abre o teclado numérico --}}
                            <div class="limitaLabel "> <label for="celular">Celular</label>
                                <input type="tel" maxlength="15" name="celular" id="celular" onkeyup="phone(event)"
                                    value="{{ old('celular', $usuario->celular) }}">
                            </div>

                        </div>

                    </div>
                </div>

                <div class="agrupaCampoCartao">

                    <h4 class="margem" style="margin-bottom:8px; font-weight: 600">Detalhes pessoais</h4>

                    <div class="margem">

                        <div class="hakuna">

                            <div class="limitaLabel  "> <label for="nome">Nome</label>
                                <input type="text" maxlength="25" name="nome" id="nome"
                                    value="{{ old('nome', $usuario->nome) }}">
                            </div>

                        </div>

                        <div class="hakuna ">

                            <div class="limitaLabel "> <label for="sobrenome">Sobrenome</label>
                                <input type="text" maxlength="80" name="sobrenome" id="sobrenome"
                                    value="{{ old('sobrenome', $usuario->sobrenome) }}">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="form-group" style="padding-left:30px; padding-right:30px;margin-top:7px">
                    <label for="foto">Foto</label>
                    <div class="custom-file-container">
                        <input type="file" id="foto" name="foto" class="custom-file-input">
                        <label for="foto" class="custom-file-label">Escolha o arquivo...</label>
                    </div>
                </div>

                <div class="changePassword" style="margin-top: 25px ">
                    <h3 style="font-weight: 500;">Alteração de senha</h3>
                    <p>Para sua segurança, recomendamos enfaticamente que escolha uma senha única, que não seja usada para
                        nenhuma outra conta on-line.
                    </p>
                </div>

                <div class="agrupaAlteracaoSenha">

                    <div style="margin-top: 15px;">

                        <div class="limitaLabel"> <label for="password">Nova Senha</label>
                            <input type="password" name="password" id="password" maxlength="45">
                        </div>

                    </div>

                    <div class="listaAvisoSenha">
                        <ul>
                            <li>Deixe o campo em branco caso não queria alterar</li>
                            <li>Não use nenhuma de suas senhas anteriores</li>
                            <li>Use 7 caracteres ou mais</li>
                            <li>use pelo menos 1 letra</li>
                            <li>Use pelo menos 1 número</li>
                            <li>Sem espaços</li>
                        </ul>
                    </div>

                    <div style="margin-top: 10px;">

                        <div class="limitaLabel"> <label for="password_confirmation">Digite a nova senha novamente</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" maxlength="45">
                        </div>

                    </div>
                </div>

                <div class="tituloEndereco" style="margin-top: 25px">
                    <h3 style="font-weight: 500;">Endereço</h3>
                    <p>Para sua segurança, recomendamos enfaticamente que escolha uma senha única, que não seja usada para
                        nenhuma outra conta on-line.
                    </p>
                </div>

                <div class="agrupaEndereco">

                    <div class="agrupaSecaoEndereco">

                        <div class="limitaLabel"> <label for="rua">Rua</label>
                            <input type="text" name="rua" id="rua" maxlength="40"
                                value="{{ old('rua', $usuario->rua) }}">
                        </div>

                        <div class="limitaLabel"> <label for="numero">Número</label>
                            <input type="text" name="numero" id="numero" maxlength="10"
                                value="{{ old('numero', $usuario->numero) }}">
                        </div>

                    </div>

                    <div class="agrupaSecaoEndereco">

                        <div class="limitaLabel"> <label for="bairro">Bairro</label>
                            <input type="text" name="bairro" id="bairro" maxlength="30"
                                value="{{ old('bairro', $usuario->bairro) }}">
                        </div>

                        <div class="limitaLabel"> <label for="complemento">Complemento</label>
                            <input type="text" name="complemento" id="complemento" maxlength="30"
                                value="{{ old('complemento', $usuario->complemento) }}">
                        </div>

                        {{-- <div class="limitaLabel"> <label for="cep">CEP</label>
                            <input type="text" name="cep" id="cep" maxlength="15"
                                value="{{ old('cep', $usuario->cep) }}">
                        </div> --}}

                    </div>

                    <div class="agrupaSecaoEndereco">

                        <div class="limitaLabel"> <label for="cidade">Cidade</label>
                            <input type="text" name="cidade" id="cidade" maxlength="20"
                                value="{{ old('cidade', $usuario->cidade) }}">
                        </div>

                    </div>

                </div>

                <div class="agrupaBotaoSubmit">

                    <div class="agrupaVoltarSalvar">
                        <a href="{{ route('usuario.minhaConta') }}" class="botaoAdicionar" id="botaoVoltar">Voltar</a>

                        <button type="submit" class="botaoAdicionar">Salvar</button>
                    </div>

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
