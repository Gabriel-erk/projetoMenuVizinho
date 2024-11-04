@extends('layouts.site')

@section('conteudo')
    <link rel="stylesheet" href="{{ asset('css/usuariosCss/cadastro.css') }}">

    <style>
        body {
            background-color: #fff;
        }
    </style>

    <div id="centraliza">
        <div id="conteudo">
            <h2>Cadastro Usuário</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        {{-- percorre tudo do array errors, (com all()), joga na váriavel erro, e imprime em um elemento "li" com o erro --}}
                        @foreach ($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('usuarioAdm.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <div class="row">
                        <div class="col">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" id="nome" placeholder="Nome" class="form-control"
                                maxlength="25" value="{{ old('nome') }}">
                        </div>
                        <div class="col">
                            <label for="sobrenome" class="form-label">Sobrenome</label>
                            <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome"
                                class="form-control" maxlength="60" value="{{ old('sobrenome') }}">
                        </div>
                    </div>
                </div>

                <div>
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" name="email" id="email" placeholder="seuemail@hotmail.com"
                        class="form-control" maxlength="255" value="{{ old('email') }}">
                </div>

                <div>
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" id="password" placeholder="Senha" class="form-control"
                        maxlength="45">
                </div>

                <div class="row">
                    <div class="col">
                        <label for="rua" class="form-label">Rua</label>
                        <input type="text" name="rua" id="rua" placeholder="Rua" class="form-control"
                            maxlength="90" value="{{ old('rua') }}">
                    </div>

                    <div class="col">
                        <label for="numero" class="form-label">Número</label>
                        <input type="text" name="numero" id="numero" placeholder="225/abc" class="form-control"
                            maxlength="10" value="{{ old('numero') }}">
                    </div>

                    <div class="col">
                        <label for="bairro" class="form-label">Bairro</label>
                        <input type="text" name="bairro" id="bairro" placeholder="Bairro" class="form-control"
                            maxlength="80" value="{{ old('bairro') }}">
                    </div>
                </div>

                <div>
                    <label for="complemento" class="form-label">Complemento</label>
                    <input type="text" name="complemento" id="complemento" placeholder="Complemento" class="form-control"
                        maxlength="30" value="{{ old('complemento') }}">
                </div>

                <div class="row">
                    <div class="col">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" name="telefone" id="telefone" placeholder="(00) 0000-000"
                            class="form-control" maxlength="15" onkeyup="phone(event)" value="{{ old('telefone') }}">
                    </div>
                    <div class="col">
                        <label for="celular" class="form-label">Celular</label>
                        <input type="text" name="celular" id="celular" placeholder="(00) 0000-000"
                            class="form-control" maxlength="15" onkeyup="phone(event)" value="{{ old('celular') }}">
                    </div>
                </div>

                <div>
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" name="foto" id="foto" placeholder="foto"
                        class="form-control campoFoto">
                </div>

                <div id="botoesCadastro">
                    <a href="{{ route('site.index') }}">Voltar</a>
                    <button type="submit">Cadastrar</button>
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
