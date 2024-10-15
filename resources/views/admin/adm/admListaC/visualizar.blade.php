@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Visualizar Carrinhos</h2>
    </div>
    <hr>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <td>{{ $lista->id }}</td>
        </tr>
        <tr>
            <th>User_id</th>
            <td>{{ $lista->user_id }}</td>
        </tr>
        <tr>
            <th>Cartao_cliente_id</th>
            <td>{{ $lista->Cartao_cliente_id }}</td>
        </tr>

    </table>
    <a href="{{ route('itens.index', ['id' => $lista->id]) }}" class="btn btn-info">Ver itens   
        associados</a> <!-- Botão para ver itens associados -->
    <a href="{{ route('lista.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
