@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Visualizar Carrinho</h2>
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

    </table>
    <a href="{{ route('itens.index', ['id' => $lista->id]) }}" class="btn btn-info">Ver itens
        associados</a> <!-- Botão para ver itens associados -->
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a> <!-- Botão para voltar à última view -->
@endsection
