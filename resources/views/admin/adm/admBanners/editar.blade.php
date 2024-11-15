@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Editar Banner</h2>
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
    <form action="{{ route('banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria do Banner</label>
            <select name="categoria" class="form-control">
                <option value="cardapio">Cardápio</option>
                <option value="ofertas">Ofertas</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem</label>
            <div>
                <img src="{{ asset($banner->imagem) }}" alt="Imagem do produto" width="100" class="mb-2">
            </div>
           
            <input type="file" name="imagem" class="form-control" id="imagem">
        </div>

        <div class="mb-3">
            <label for="titulo" class="form-label">Titulo do Banner</label>
            <input type="text" name="titulo" class="form-control" id="titulo"
                placeholder="Titulo do banner"
                value="{{ old('titulo', $banner->titulo) }}" maxlength="20">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('banners.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

@endsection
