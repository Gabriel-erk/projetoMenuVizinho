@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Cadastrar Loja</h2>
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
    <form action="{{ route('loja.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nome_loja" class="form-label">Nome da loja</label>
            <input type="text" name="nome_loja" class="form-control" id="nome_loja" placeholder="Titulo da categoria"
                value="{{ old('nome_loja') }}" maxlength="20">
        </div>

        <div class="mb-3">
            <label for="logotipo" class="form-label">Logotipo</label>
            <input type="file" name="logotipo" class="form-control" id="logotipo">
        </div>

        <ul class="alert alert-info">
            <span>Para definir um novo parágrafo, por favor deixe um espaço em branco entre eles.</span>
        </ul>
        <div class="mb-3">
            <label for="texto_sobre_restaurante" class="form-label">Texto sobre nós</label>
            <textarea name="texto_sobre_restaurante" class="form-control" id="texto_sobre_restaurante"
                placeholder="Digite o texto da página 'sobre nós'" rows="4">{{ old('texto_sobre_restaurante') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="imagem_sobre_restaurante" class="form-label">Imagem sobre nós</label>
            <input type="file" name="imagem_sobre_restaurante" class="form-control" id="imagem_sobre_restaurante">
        </div>

        <ul class="alert alert-info">
            <span>Por favor, deixe os títulos sem um espaçamento em branco do seu conteúdo.</span>
        </ul>
        <div class="mb-3">
            <label for="texto_politica_privacidade" class="form-label">Política de privacidade</label>
            <textarea name="texto_politica_privacidade" class="form-control" id="texto_politica_privacidade"
                placeholder="Digite as suas políticas de privacidade" rows="4">{{ old('texto_politica_privacidade') }}</textarea>
        </div>

        <ul class="alert alert-info">
            <span>Por favor, deixe os títulos sem um espaçamento em branco do seu conteúdo.</span>
        </ul>
        <div class="mb-3">
            <label for="regras_cupons" class="form-label">Regras dos cupons</label>
            <textarea name="regras_cupons" class="form-control" id="regras_cupons" placeholder="Digite as regras de seus cupons"
                rows="4">{{ old('regras_cupons') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('loja.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

@endsection
