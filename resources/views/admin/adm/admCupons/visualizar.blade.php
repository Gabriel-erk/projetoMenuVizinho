@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Visualizar Categorias</h2>
    </div>
    <hr>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <td>{{ $cupom->id }}</td>
        </tr>
        <tr>
            <th>Nome do cupom</th>
            <td>{{ $cupom->nome_cupom }}</td>
        </tr>
        <tr>
            <th>Descrição</th>
            <td>{{ $cupom->descricao_cupom }}</td>
        </tr>
        <tr>
            <th>Data de expiração</th>
            <td>{{ $cupom->data_expiracao }}</td>
        </tr>
        <tr>
            <th>Forma de desconto</th>
            <td>{{ $cupom->forma_desconto }}</td>
        </tr>
        <tr>
            <th>Valor de desconto</th>
            <td>{{ $cupom->valor_desconto }}</td>
        </tr>
        <tr>
            <th>Tipo de desconto</th>
            <td>{{ $cupom->tipo_desconto }}</td>
        </tr>
        <tr>
            <th>ID da loja</th>
            <td>{{ $cupom->loja_id }}</td>
        </tr>

    </table>
    <a href="{{ route('cupom.edit', ['id' => $cupom->id]) }}" class="btn btn-primary">Editar</a>
    <a href="{{ route('cupom.index') }}" class="btn btn-secondary">Cancelar</a>
@endsection
