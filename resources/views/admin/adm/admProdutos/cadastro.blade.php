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
    <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem</label>
            <input type="file" name="imagem" class="form-control" id="imagem">
        </div>

        <div class="mb-3">
            <label for="nome" class="form-label">Nome Produto</label>
            <input type="text" name="nome" class="form-control" id="nome" placeholder="Titulo da sub-categoria"
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
            <label for="descricao" class="form-label">Descrição do Produto</label>
            <textarea name="descricao" class="form-control" id="descricao" placeholder="Digite a descrição do produto"
                rows="4">{{ old('descricao') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="info_nutricional" class="form-label">Informações Nutricionais</label>
            <textarea name="info_nutricional" class="form-control" id="info_nutricional"
                placeholder="Digite as informações nutricionais" rows="4">{{ old('info_nutricional') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Categoria do produto</label>
            {{-- for each com as categorias --}}
            @foreach ($categorias as $categoria)
                <div class="form-check mb-1">
                    {{-- como vou passar o valor deste campo para o meu campo categoria_produto_id, este é o nome que vai no "name" - value $categoria->id pois é o valor que vou passar para o meu campo categoria_produto_id, já que ele precisa do id de alguma categoria - id="categoria_{{ $categoria->id }}": O id precisa ser único em cada botão de rádio, então use o id da categoria para garantir isso. --}}
                    <input class="form-check-input" type="radio" name="categoria_produto_id"
                        id="categoria_{{ $categoria->id }}" value="{{ $categoria->id }}">
                    <label class="form-check-label" for="categoria_{{ $categoria->id }}">
                        {{ $categoria->titulo_categoria }}
                    </label>
                </div>
            @endforeach

        </div>

        <div class="mb-3">
            <label for="" class="form-label">Categoria do produto</label>
            {{-- for each com as categorias --}}
            @foreach ($subCategorias as $subCategoria)
                <div class="form-check mb-1">
                    {{-- como vou passar o valor deste campo para o meu campo categoria_produto_id, este é o nome que vai no "name" - value $categoria->id pois é o valor que vou passar para o meu campo categoria_produto_id, já que ele precisa do id de alguma categoria - id="categoria_{{ $categoria->id }}": O id precisa ser único em cada botão de rádio, então use o id da categoria para garantir isso. --}}
                    <input class="form-check-input" type="radio" name="sub_categoria_produto_id"
                        id="sub_categoria_{{ $subCategoria->id }}" value="{{ $subCategoria->id }}">
                    <label class="form-check-label" for="subCategoria_{{ $subCategoria->id }}">
                        {{ $subCategoria->titulo_sub_categoria }}
                    </label>
                </div>
            @endforeach

        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

@endsection
