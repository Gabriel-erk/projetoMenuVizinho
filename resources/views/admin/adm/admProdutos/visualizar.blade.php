@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Visualizar Produtos</h2>
    </div>
    <hr>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <td>{{ $produto->id }}</td>
        </tr>
        <tr>
            <th>Imagem</th>
            <td>{{ $produto->imagem }}</td>
        </tr>
        <tr>
            <th>Nome</th>
            <td>{{ $produto->nome }}</td>
        </tr>
        <tr>
            <th>Preço</th>
            <td>{{ $produto->preco }}</td>
        </tr>
        <tr>
            <th>Descrição</th>
            <td>{{ $produto->descricao }}</td>
        </tr>
        <tr>
            <th>Info Nutricional</th>
            <td>{{ $produto->info_nutricional }}</td>
        </tr>
        
    </table>
    <a href="{{ route('produtos.edit', ['id' => $produto->id]) }}" class="btn btn-primary">Editar</a>
    <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
@endsection
