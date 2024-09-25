@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Cadastrar Categorias</h2>
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
    <form action="{{ route('categorias.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="titulo_categoria" class="form-label">Titulo categoria</label>
            <input type="text" name="titulo_categoria" class="form-control" id="titulo_categoria"
                placeholder="Titulo da categoria" value="{{ old('titulo_categoria') }}" maxlength="20">
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem</label>
            <input type="file" name="imagem" class="form-control" id="imagem">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição do Produto</label>
            <textarea name="descricao" class="form-control" id="descricao" placeholder="Digite a descrição da sub-categoria"
                rows="4">{{ old('descricao') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

@endsection
