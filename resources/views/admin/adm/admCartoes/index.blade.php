@extends('admin.dashboard')

@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Lista de Cartões</h2>
        <a href="{{ route('cartao.create') }}" class="btn btn-primary">Cadastrar</a>
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
                <th>CVV</th>
                <th>Data de vencimento</th>
                <th>Ações</th> <!-- Adicionado cabeçalho para ações -->
            </tr>
        </thead>
        <tbody>
            @foreach ($cartoes as $cartao)
                <tr>
                    <td>{{ $cartao->id }}</td>
                    <td>{{ $cartao->user_id }}</td>
                    <td>{{ $cartao->cvv }}</td>
                    <td>{{ \Carbon\Carbon::parse($cartao->data_vencimento)->format('m/Y') }}</td>
                    <td>
                        <a href="{{ route('cartao.show', ['id' => $cartao->id]) }}" class="btn btn-primary">Visualizar</a>
                        
                        <a href="{{ route('cartao.edit', ['id' => $cartao->id]) }}" class="btn btn-secondary">Editar</a>

                        <form action="{{ route('pagamentos.deletarPagamento', ['id' => $cartao->id]) }}" method="post" style="display: inline-block">
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
