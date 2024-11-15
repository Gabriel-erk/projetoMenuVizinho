@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Cadastrar Banners</h2>
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
    <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <ul class="alert alert-info">
            <span>Escolha no máximo 3 imagens, de tamanho 1920x1080</span>
        </ul>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria do Banner</label>
            <select name="categoria" class="form-control">
                <option value="cardapio">Cardápio</option>
                <option value="ofertas">Ofertas</option>
            </select>
        </div>
        <div class="mb-3">
            {{-- name "imagens[]" no plural e com colchetes pois irá pegar várias imagens, e multiple para permitir subir muitas imagens neste input  --}}
            <input type="file" name="imagens[]" class="form-control" id="imagem" multiple>
        </div>

        <div class="mb-3">
            <label for="titulo" class="form-label">Titulo do Banner</label>
            <input type="text" name="titulo" class="form-control" id="titulo"
                placeholder="Titulo do banner
                value="{{ old('titulo') }}" maxlength="20">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('banners.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

@endsection
