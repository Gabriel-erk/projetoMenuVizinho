@extends('admin.dashboard')

@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Lista de Categorias</h2>
        <a href="{{ route('categorias.create') }}" class="btn btn-primary">Cadastrar</a>
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

                <th>Titulo</th>
                <th>Imagem</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($categoriasProdutos as $categoriaProduto)
                <tr>
                    <td>{{ $categoriaProduto->id }}</td>
                    <td>{{ $categoriaProduto->titulo_categoria }}</td>
                    <td>{{ $categoriaProduto->imagem }}</td>
                    <td>
                        <a href="{{ route('categorias.show', ['id' => $categoriaProduto->id]) }}" class="btn btn-primary">Visualizar</a>
                        
                        <a href="{{ route('categorias.edit', ['id' => $categoriaProduto->id]) }}" class="btn btn-secondary">Editar</a>

                        <form action="{{ route('categorias.destroy', ['id' => $categoriaProduto->id]) }}" method="post"
                            style="display: inline-block">

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
