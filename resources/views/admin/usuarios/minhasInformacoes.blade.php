@extends('layouts.site')

@section('conteudo')
    <style>
        body {
            background-color: #fff;
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-12 my-4">
                <h2>Configurações da conta</h2>
                <span style="color: #716b6b">Gerencie os detalhes de sua conta.</span>
            </div>
        </div>
    </div>
   
    <div class="mb-4" style="border-bottom: 1px solid #c9c9c9"></div>

    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('usuarioAdm.update', ['id' => $usuario->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Detalhes da conta -->
            <div class="mb-4">
                <h4>Detalhes da conta</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Endereço de e-mail</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ old('email', $usuario->email) }}" maxlength="100">
                    </div>
                    <div class="col-md-6">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="tel" name="telefone" id="telefone" class="form-control" onkeyup="phone(event)"
                            value="{{ old('telefone', $usuario->telefone) }}" maxlength="15">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="celular" class="form-label">Celular</label>
                        <input type="tel" name="celular" id="celular" class="form-control" onkeyup="phone(event)"
                            value="{{ old('celular', $usuario->celular) }}" maxlength="15">
                    </div>
                </div>
            </div>

            <!-- Detalhes pessoais -->
            <div class="mb-4">
                <h4>Detalhes pessoais</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control"
                            value="{{ old('nome', $usuario->nome) }}" maxlength="25">
                    </div>
                    <div class="col-md-6">
                        <label for="sobrenome" class="form-label">Sobrenome</label>
                        <input type="text" name="sobrenome" id="sobrenome" class="form-control"
                            value="{{ old('sobrenome', $usuario->sobrenome) }}" maxlength="80">
                    </div>
                </div>
            </div>

            <!-- Foto -->
            <div class="mb-4">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" id="foto" name="foto" class="form-control"
                    value="{{ old('foto', $usuario->foto) }}">
            </div>

            <!-- Alteração de senha -->
            <div class="mb-4">
                <h4>Alteração de senha</h4>
                <p style="color: #716b6b">Para sua segurança, recomendamos enfaticamente que escolha uma senha única.</p>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="password" class="form-label">Nova Senha</label>
                        <input type="password" name="password" id="password" class="form-control" maxlength="45">
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Confirme a Senha</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                            maxlength="45">
                    </div>
                </div>
                <ul class="alert alert-info" style="width: 49%">
                    <li class="ms-2">Deixe o campo em branco caso não queria alterar</li>
                    <li class="ms-2">Use 7 caracteres ou mais</li>
                </ul>
            </div>

            <!-- Endereço -->
            <div class="mb-4">
                <h4>Endereço</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="rua" class="form-label">Rua</label>
                        <input type="text" name="rua" id="rua" class="form-control"
                            value="{{ old('rua', $usuario->rua) }}" maxlength="40">
                    </div>
                    <div class="col-md-3">
                        <label for="numero" class="form-label">Número</label>
                        <input type="text" name="numero" id="numero" class="form-control"
                            value="{{ old('numero', $usuario->numero) }}" maxlength="10">
                    </div>
                    <div class="col-md-3">
                        <label for="bairro" class="form-label">Bairro</label>
                        <input type="text" name="bairro" id="bairro" class="form-control"
                            value="{{ old('bairro', $usuario->bairro) }}" maxlength="30">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="complemento" class="form-label">Complemento</label>
                        <input type="text" name="complemento" id="complemento" class="form-control"
                            value="{{ old('complemento', $usuario->complemento) }}" maxlength="30">
                    </div>
                </div>
            </div>

            <!-- Botões -->
            <div class="d-flex justify-content-between my-4">
                <a href="{{ route('usuario.minhaConta') }}" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>

@endsection
