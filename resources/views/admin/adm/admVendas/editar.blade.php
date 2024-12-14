@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Editar Adicionais</h2>
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
    <form action="{{ route('adicional.update', ['id' => $adicional->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome Adicional</label>
            <input type="text" name="nome" class="form-control" id="nome" placeholder="Titulo do adicional"
                value="{{ old('nome', $adicional->nome) }}" maxlength="20">
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            {{-- step="0.01": Permite inserir valores decimais, como 10.99. O passo determina o intervalo permitido entre os valores.
            min="0": Define o valor mínimo como 0, ou seja, não permite números negativos. --}}
            <input type="number" name="valor" class="form-control" id="valor" placeholder="Preço"
                value="{{ old('valor', $adicional->valor) }}" maxlength="8" step="0.01" min="0">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Categoria do produto</label>
            @foreach ($categorias as $categoria)
                <div class="form-check mb-1">
                    <input class="form-check-input" type="radio" name="categoria_produto_id"
                        id="categoria_{{ $categoria->id }}" value="{{ $categoria->id }}"
                        {{ old('categoria_produto_id', $adicional->categoria_produto_id) == $categoria->id ? 'checked' : '' }}>
                    <label class="form-check-label" for="categoria_{{ $categoria->id }}">
                        {{ $categoria->titulo_categoria }}
                    </label>
                </div>
            @endforeach
        </div>

        <!-- Sub-categoria do Produto  -->
        <div class="mb-3">
            <label for="" class="form-label">Sub-categoria do produto (opcional)</label>
            @foreach ($subCategorias as $subCategoria)
                <div class="form-check mb-1">
                    <input class="form-check-input" type="radio" name="sub_categoria_produto_id"
                        id="sub_categoria_{{ $subCategoria->id }}" value="{{ $subCategoria->id }}"
                        {{ old('sub_categoria_produto_id', $adicional->sub_categoria_produto_id) == $subCategoria->id ? 'checked' : '' }}>
                    <label class="form-check-label" for="sub_categoria_{{ $subCategoria->id }}">
                        {{ $subCategoria->titulo_sub_categoria }}
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('adicional.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

@endsection
