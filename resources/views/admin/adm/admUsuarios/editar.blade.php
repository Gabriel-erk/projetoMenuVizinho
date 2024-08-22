@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Editar Usuários</h2>
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
    <form action="{{ route('usuarioAdm.update', ['id' => $usuario->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" id="nome" placeholder="Seu nome"
                value="{{ old('nome', $usuario->nome) }}">
        </div>
        <div class="mb-3">
            <label for="sobrenome" class="form-label">Sobrenome</label>
            <input type="text" name="sobrenome" class="form-control" id="sobrenome" placeholder="Seu Sobrenome"
                value="{{ old('nome', $usuario->sobrenome) }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Seu email"
                value="{{ old('email', $usuario->email) }}">
        </div>
        <p class="alert alert-info">Mantenha o campo vazio, caso deseja manter a senha atual</p>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Sua senha">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirme a Senha</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                placeholder="Confirme sua senha">
        </div>

        <div class="mb-3">
            <label for="rua" class="form-label">Rua</label>
            <input type="text" name="rua" class="form-control" id="rua" placeholder="Sua rua"
                value="{{ old('rua', $usuario->rua) }}">
        </div>

        <div class="mb-3">
            <label for="bairro" class="form-label">Bairro</label>
            <input type="text" name="bairro" class="form-control" id="bairro" placeholder="Seu bairro"
                value="{{ old('bairro', $usuario->bairro) }}">
        </div>

        <div class="mb-3">
            <label for="número" class="form-label">Número</label>
            <input type="text" name="número" class="form-control" id="número" placeholder="Número da sua residência"
                value="{{ old('número', $usuario->número) }}">
        </div>

        <div class="mb-3">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" name="cidade" class="form-control" id="cidade" placeholder="Sua cidade"
                value="{{ old('cidade', $usuario->cidade) }}">
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" name="estado" class="form-control" id="estado" placeholder="Seu estado"
                value="{{ old('estado', $usuario->estado) }}">
        </div>

        <div class="mb-3">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" name="cep" class="form-control" id="cep" placeholder="Seu CEP"
                value="{{ old('cep', $usuario->cep) }}">
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" class="form-control" id="telefone" placeholder="Seu telefone"
                value="{{ old('telefone', $usuario->telefone) }}">
        </div>

        <div class="mb-3">
            <label for="celular" class="form-label">Celular</label>
            <input type="text" name="celular" class="form-control" id="celular" placeholder="Seu celular"
                value="{{ old('celular', $usuario->celular) }}">
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control" id="foto"
                value="{{ old('foto', $usuario->foto) }}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('usuarioAdm.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
