@extends('admin.dashboard')

@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Lista de Vendas</h2>
        {{-- <a href="{{ route('venda.create') }}" class="btn btn-primary">Cadastrar</a> --}}
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
                <th>ID Usuário</th>
                <th>Frete</th>
                <th>Total</th>
                <th>Ações</th> <!-- Adicionado cabeçalho para ações -->
            </tr>
        </thead>
        <tbody>
            @foreach ($vendas as $venda)
                <tr>
                    <td>{{ $venda->id }}</td>
                    <td>{{ $venda->user_id }}</td>
                    <td>R$ {{ number_format($venda->frete, 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($venda->total, 2, ',', '.') }}</td> <!-- Formatação de preço -->
                    <td>
                        <a href="{{ route('venda.show', ['id' => $venda->id]) }}" class="btn btn-primary">Visualizar</a>
                        
                        {{-- <a href="{{ route('venda.edit', ['id' => $venda->id]) }}" class="btn btn-secondary">Editar</a> --}}

                        <form action="{{ route('venda.destroy', ['id' => $venda->id]) }}" method="post" style="display: inline-block">
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
