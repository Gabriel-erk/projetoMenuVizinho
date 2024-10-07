@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Visualizar Categorias</h2>
    </div>
    <hr>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <td>{{ $categoriaProduto->id }}</td>
        </tr>
        <tr>
            <th>Titulo Categoria</th>
            <td>{{ $categoriaProduto->titulo_categoria }}</td>
        </tr>
        <tr>
            <th>Descrição</th>
            <td>{{ $categoriaProduto->descricao }}</td>
        </tr>
        <tr>
            <th>Imagem</th>
            <td>{{ $categoriaProduto->imagem }}</td>
        </tr>
        <tr>
            <th>Qntd. Produtos associados</th>
            <td>{{ $quantidadeProdutos }}</td>
        </tr>

    </table>
    <a href="{{ route('categorias.produtos', ['id' => $categoriaProduto->id]) }}" class="btn btn-info">Ver produtos
        associados</a> <!-- Botão para ver produtos associados -->
    <a href="{{ route('categorias.edit', ['id' => $categoriaProduto->id]) }}" class="btn btn-primary">Editar</a>
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
@endsection
