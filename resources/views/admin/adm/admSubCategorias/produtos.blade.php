@extends('admin.dashboard')
@section('conteudo')
    <h2>Produtos associados à sub-categoria {{ $subCategoria->titulo_sub_categoria }}</h2>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>R$ {{ $produto->preco }}</td>
                    <td>{{ $produto->estoque }}</td>
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
            @empty
                <tr>
                    <td colspan="4">Nenhum produto encontrado para esta categoria.</td>
                </tr>
            @endforelse

        </tbody>
    </table>

    <a href="{{ route('subCategorias.show', ['id' => $subCategoria->id]) }}" class="btn btn-secondary">Voltar</a>
@endsection
