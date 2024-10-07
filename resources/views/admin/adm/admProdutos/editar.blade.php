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
    <form action="{{ route('produtos.update', ['id' => $produto->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Imagem -->
        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem</label>
            <input type="file" name="imagem" class="form-control" id="imagem"
                value="{{ old('imagem', $produto->imagem) }}">
        </div>

        <!-- Nome do Produto -->
        <div class="mb-3">
            <label for="nome" class="form-label">Nome Produto</label>
            <input type="text" name="nome" class="form-control" id="nome" placeholder="Titulo da sub-categoria"
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

        <!-- Categoria do Produto -->
        <div class="mb-3">
            <label for="" class="form-label">Categoria do produto</label>
            @foreach ($categorias as $categoria)
                <div class="form-check mb-1">
                    {{-- Categoria e Sub-categoria: O botão de rádio agora marca a categoria ou sub-categoria correta com o checked, usando old() - deixando marcada para caso não queira alterar o que já está --}}
                    <input class="form-check-input" type="radio" name="categoria_produto_id"
                        id="categoria_{{ $categoria->id }}" value="{{ $categoria->id }}"
                        {{ old('categoria_produto_id', $produto->categoria_produto_id) == $categoria->id ? 'checked' : '' }}> 
                    <label class="form-check-label" for="categoria_{{ $categoria->id }}">
                        {{ $categoria->titulo_categoria }}
                    </label>
                </div>
            @endforeach
        </div>

        <!-- Sub-categoria do Produto (opcional) -->
        <div class="mb-3">
            <label for="" class="form-label">Sub-categoria do produto (opcional)</label>
            @foreach ($subCategorias as $subCategoria)
                <div class="form-check mb-1">
                    <input class="form-check-input" type="radio" name="sub_categoria_produto_id"
                        id="sub_categoria_{{ $subCategoria->id }}" value="{{ $subCategoria->id }}"
                        {{ old('sub_categoria_produto_id', $produto->sub_categoria_produto_id) == $subCategoria->id ? 'checked' : '' }}>
                    <label class="form-check-label" for="sub_categoria_{{ $subCategoria->id }}">
                        {{ $subCategoria->titulo_sub_categoria }}
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        {{-- url()->previous retorna para a última view em que estava, independente de qual seja, já que posso tanto retornara para a categorias.index, quando a seção de visualização do produto dentro de "ver produtos associados" --}}
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
            </form>
@endsection
