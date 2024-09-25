@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Editar Sub-Categorias</h2>
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
    <form action="{{ route('subCategorias.update', ['id' => $subCategoria->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titulo_sub_categoria" class="form-label">Titulo categoria</label>
            <input type="text" name="titulo_sub_categoria" class="form-control" id="titulo_sub_categoria"
                placeholder="Titulo da sub-categoria"
                value="{{ old('titulo_sub_categoria', $subCategoria->titulo_sub_categoria) }}" maxlength="20">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição do Produto</label>
            <textarea name="descricao" class="form-control" id="descricao" placeholder="Digite a descrição do produto"
                rows="4">{{ old('descricao', $subCategoria->descricao) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('subCategorias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

@endsection
