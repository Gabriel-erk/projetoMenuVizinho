@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Visualizar Banners</h2>
    </div>
    <hr>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <td>{{ $banner->id }}</td>
        </tr>
        <tr>
            <th>Imagem</th>
            <td><img src="{{ asset($banner->imagem) }}" alt="Imagem do banner" width="80" height="60"></td>
            {{-- <td>{{ $banner->imagem }}</td> --}}
        </tr>
        <tr>
            <th>Titulo</th>
            <td>{{ $banner->titulo }}</td>
        </tr>
        <tr>
            <th>Categoria</th>
            <td>{{ $banner->categoria }}</td>
        </tr>
        <tr>
            <th>ID da loja</th>
            <td>{{ $banner->loja_id }}</td>
        </tr>

    </table>
    <a href="{{ route('banners.edit', ['id' => $banner->id]) }}" class="btn btn-primary">Editar</a>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
@endsection
