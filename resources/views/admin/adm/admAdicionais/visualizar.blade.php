@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Visualizar Adicionais</h2>
    </div>
    <hr>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <td>{{ $adicional->id }}</td>
        </tr>
        <tr>
            <th>Nome</th>
            <td>{{ $adicional->nome }}</td>
        </tr>
        <tr>
            <th>Preço</th>
            <td>{{ $adicional->valor }}</td>
        </tr>
        <tr>
            <th>ID da categoria</th>
            <td>{{ $adicional->categoria_produto_id }}</td>
        </tr>
        <tr>
            <th>ID da sub-categoria</th>
            <td>{{ $adicional->sub_categoria_produto_id }}</td>
        </tr>

    </table>
    <a href="{{ route('adicional.edit', ['id' => $adicional->id]) }}" class="btn btn-primary">Editar</a>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
@endsection
