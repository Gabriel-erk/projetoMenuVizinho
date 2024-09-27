@extends('layouts.site')

@section('conteudo')
    <link rel="stylesheet" href="{{ asset('css/usuariosCss/minhasInformacoes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tituloEditUser.css') }}">
    <link rel="stylesheet" href="{{ asset('css/posicionaBotaoSubmit.css') }}">
    <style>
        body {
            background-color: #fff; 
        }

        .posicionaBotaoSubmit {
            /* justify-content: flex-start; */
            /* margin-left: 1.2rem;  */
        }

    </style>

    <div class="tituloEditUser">
        <h2>Configurações da conta</h2>
        <span>Gerencie as detalhes de sua conta.</span>
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

            <form action="{{ route('usuarioAdm.update', ['id' => $usuario->id]) }}" method="post" style="padding-left: 2rem">
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

                <div class="mb-3" >
                    <label for="foto" class="form-label">Foto</label>
                    <div class="custom-file">
                        <input class="form-control" type="file" id="foto" name="foto" value="{{ old('foto', $usuario->foto) }}">
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

                    </div>

                    <div class="agrupaSecaoEndereco">

                        <div class="limitaLabel"> <label for="cidade">Cidade</label>
                            <input type="text" name="cidade" id="cidade" maxlength="20"
                                value="{{ old('cidade', $usuario->cidade) }}">
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

        function updateFileName() {
            var fileInput = document.getElementById('foto');
            var fileLabel = document.getElementById('fileLabel');

            if (fileInput.files.length > 0) {
                fileLabel.textContent = fileInput.files[0].name;
            } else {
                fileLabel.textContent = 'Escolha o arquivo...';
            }
        }
    </script>


@endsection
