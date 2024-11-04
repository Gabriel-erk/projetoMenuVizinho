@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Editar Produtos</h2>
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
    <form action="{{ route('ofertas.update', ['id' => $produto->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Imagem -->
        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem</label>
            <div>
                <img src="{{ asset($produto->imagem) }}" alt="Imagem do produto" width="100" class="mb-2">
            </div>
            <input type="file" name="imagem" class="form-control" id="imagem">
        </div>

        <!-- Nome do Produto -->
        <div class="mb-3">
            <label for="nome" class="form-label">Nome Produto</label>
            <input type="text" name="nome" class="form-control" id="nome" placeholder="Título da sub-categoria"
                value="{{ old('nome', $produto->nome) }}" maxlength="20">
        </div>

        <!-- Preço -->
        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" name="preco" class="form-control" id="preco" placeholder="Preço"
                value="{{ old('preco', $produto->preco) }}" maxlength="8" step="0.01" min="0">
        </div>

        <!-- Descrição -->
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição do Produto</label>
            <textarea name="descricao" class="form-control" id="descricao" placeholder="Digite a descrição do produto"
                rows="4">{{ old('descricao', $produto->descricao) }}</textarea>
        </div>

        <!-- Informações Nutricionais -->
        <div class="mb-3">
            <label for="info_nutricional" class="form-label">Informações Nutricionais</label>
            <textarea name="info_nutricional" class="form-control" id="info_nutricional"
                placeholder="Digite as informações nutricionais" rows="4">{{ old('info_nutricional', $produto->info_nutricional) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="duracao" class="form-label">Duração da Oferta</label>
            <input type="datetime-local" name="duracao" class="form-control" id="duracao"
                value="{{ old('duracao', $produto->duracao) }}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
