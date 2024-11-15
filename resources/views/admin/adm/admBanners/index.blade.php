@extends('admin.dashboard')

@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Lista de Banners</h2>
        <a href="{{ route('banners.create') }}" class="btn btn-primary">Cadastrar</a>
    </div>
    <hr>

    @if (session('sucesso'))
        <div class="alert alert-success">
            {{ session('sucesso') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagem</th>
                <th>Título</th>
                <th>Categoria</th>
                <th>Ações</th> <!-- Adicionado cabeçalho para ações -->
            </tr>
        </thead>
        <tbody>
            @foreach ($banners as $banner)
                <tr>
                    <td>{{ $banner->id }}</td>
                    <td>
                        <!-- Exibindo a imagem como miniatura -->
                        <img src="{{ asset($banner->imagem) }}" alt="Imagem do banner" width="80" height="60">
                    </td>
                    <td>{{ $banner->titulo }}</td>
                    <td>{{ $banner->categoria }}</td>
                    <td>
                        <a href="{{ route('banners.show', ['id' => $banner->id]) }}" class="btn btn-primary">Visualizar</a>
                        
                        <a href="{{ route('banners.edit', ['id' => $banner->id]) }}" class="btn btn-secondary">Editar</a>

                        <form action="{{ route('banners.destroy', ['id' => $banner->id]) }}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
