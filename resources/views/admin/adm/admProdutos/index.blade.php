@extends('admin.dashboard')

@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Lista de Produtos</h2>
        <a href="{{ route('produtos.create') }}" class="btn btn-primary">Cadastrar</a>
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
                <th>Nome</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->imagem }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->preco }}</td>
                    <td>
                        <a href="{{ route('produtos.show', ['id' => $produto->id]) }}" class="btn btn-primary">Visualizar</a>
                        
                        <a href="{{ route('produtos.edit', ['id' => $produto->id]) }}" class="btn btn-secondary">Editar</a>

                        <form action="{{ route('produtos.destroy', ['id' => $produto->id]) }}" method="post"
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
