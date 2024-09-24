@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Cadastrar Sub-Categorias</h2>
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
    <form action="{{ route('subCategorias.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="titulo_sub_categoria" class="form-label">Titulo sub-categoria</label>
            <input type="text" name="titulo_sub_categoria" class="form-control" id="titulo_sub_categoria" placeholder="Titulo da sub-categoria"
                value="{{ old('titulo_sub_categoria') }}" maxlength="20">
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem</label>
            <input type="file" name="imagem" class="form-control" id="imagem">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('subCategorias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

@endsection
