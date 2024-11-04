@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Cadastrar Produtos</h2>
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
    <form action="{{ route('ofertas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem</label>
            <input type="file" name="imagem" class="form-control" id="imagem">
        </div>

        <div class="mb-3">
            <label for="nome" class="form-label">Nome Produto (Oferta)</label>
            <input type="text" name="nome" class="form-control" id="nome" placeholder="Titulo da oferta"
                value="{{ old('nome') }}" maxlength="20">
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            {{-- step="0.01": Permite inserir valores decimais, como 10.99. O passo determina o intervalo permitido entre os valores.
            min="0": Define o valor mínimo como 0, ou seja, não permite números negativos. --}}
            <input type="number" name="preco" class="form-control" id="preco" placeholder="Preço"
                value="{{ old('preco') }}" maxlength="8" step="0.01" min="0">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição do Produto (Oferta)</label>
            <textarea name="descricao" class="form-control" id="descricao" placeholder="Digite a descrição do produto"
                rows="4">{{ old('descricao') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="info_nutricional" class="form-label">Informações Nutricionais</label>
            <textarea name="info_nutricional" class="form-control" id="info_nutricional"
                placeholder="Digite as informações nutricionais" rows="4">{{ old('info_nutricional') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="duracao" class="form-label">Duração da Oferta</label>
            <input type="datetime-local" name="duracao" class="form-control" id="duracao"
                value="{{ old('duracao') }}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('ofertas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

@endsection
