@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Visualizar Cartões</h2>
    </div>
    <hr>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <td>{{ $cartao->id }}</td>
        </tr>
        <tr>
            <th>ID Usuário</th>
            <td>{{ $cartao->user_id }}</td>
        </tr>
        <tr>
            <th>Número do cartão</th>
            <td>{{ $cartao->numero_cartao }}</td>
        </tr>
        <tr>
            <th>CVV</th>
            <td>{{ $cartao->cvv }}</td>
        </tr>
        <tr>
            <th>Data de vencimento</th>
            <td>{{ \Carbon\Carbon::parse($cartao->data_vencimento)->format('m/Y') }}</td>
        </tr>
        <tr>
            <th>Nome do titular</th>
            <td>{{ $cartao->nome_titular }}</td>

        </tr>
        <tr>
            <th>Data de vencimento</th>
            <td>{{ $cartao->cpf }}</td>

        </tr>

    </table>
    <a href="{{ route('cartao.edit', ['id' => $cartao->id]) }}" class="btn btn-primary">Editar</a>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
@endsection
