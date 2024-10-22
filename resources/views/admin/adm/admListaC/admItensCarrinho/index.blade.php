@extends('admin.dashboard')

@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Itens Carrinho</h2>
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

                <th>Produto id</th>
                <th>Quantidade</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($itens as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->produto_id }}</td>
                    <td>{{ $item->quantidade }}</td>
                    <td>
                        <a href="{{ route('produtos.show', ['id' => $item->produto_id]) }}" class="btn btn-primary">Visualizar</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{-- colocar p ultima view visitada --}}
    <a href="{{ route('lista.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
