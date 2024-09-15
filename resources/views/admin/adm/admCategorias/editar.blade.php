@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Editar Categorias</h2>
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
    <form action="{{ route('categorias.update', ['id' => $categoriaProduto->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titulo_categoria" class="form-label">Titulo categoria</label>
            <input type="text" name="titulo_categoria" class="form-control" id="titulo_categoria"
                placeholder="Titulo da categoria"
                value="{{ old('titulo_categoria', $categoriaProduto->titulo_categoria) }}" maxlength="20">
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem</label>
            <input type="file" name="imagem" class="form-control" id="imagem"
                value="{{ old('imagem', $categoriaProduto->imagem) }}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

@endsection
