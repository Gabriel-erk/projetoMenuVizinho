@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Cadastrar Usuários</h2>
    </div>
    <hr>
    @if ($errors->any())
        <div class="boxError alert alert-danger">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('usuarioAdm.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" id="nome" placeholder="Seu nome"
                value="{{ old('nome') }}" maxlength="25">
        </div>
        <div class="mb-3">
            <label for="sobrenome" class="form-label">Sobrenome</label>
            <input type="text" name="sobrenome" class="form-control" id="sobrenome" placeholder="Seu Sobrenome"
                value="{{ old('sobrenome') }}" maxlength="60">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Seu email"
                value="{{ old('email') }}" maxlength="255">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Sua senha" maxlength="45">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirme a Senha</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                placeholder="Confirme sua senha" maxlength="45">
        </div>

        <div class="mb-3">
            <label for="rua" class="form-label">Rua</label>
            <input type="text" name="rua" class="form-control" id="rua" placeholder="Sua rua"
                value="{{ old('rua') }}" maxlength="90">
        </div>

        <div class="mb-3">
            <label for="numero" class="form-label">Número</label>
            <input type="text" name="numero" class="form-control" id="numero" placeholder="Número da sua residência"
                value="{{ old('numero') }}" maxlength="10">
        </div>

        <div class="mb-3">
            <label for="bairro" class="form-label">Bairro</label>
            <input type="text" name="bairro" class="form-control" id="bairro" placeholder="Seu bairro"
                value="{{ old('bairro') }}"  maxlength="80">
        </div>

        <div class="mb-3">
            <label for="complemento" class="form-label">Complemento</label>
            <input type="text" name="complemento" class="form-control" id="complemento" placeholder="Seu complemento"
                value="{{ old('complemento') }}" maxlength="30">
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" class="form-control" id="telefone" placeholder="Seu telefone" onkeyup="phone(event)"
                value="{{ old('telefone') }}" maxlength="15">
        </div>

        <div class="mb-3">
            <label for="celular" class="form-label">Celular</label>
            <input type="text" name="celular" class="form-control" id="celular" placeholder="Seu celular" onkeyup="phone(event)"
                value="{{ old('celular') }}" maxlength="15">
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control" id="foto">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('usuarioAdm.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

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
