@extends('admin.dashboard')

@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Lista de Produtos em Oferta</h2>
        <a href="{{ route('ofertas.create') }}" class="btn btn-primary">Cadastrar</a>
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
                <th>Imagem</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th> <!-- Adicionado cabeçalho para ações -->
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>
                        <!-- Exibindo a imagem como miniatura -->
                        <img src="{{ asset($produto->imagem) }}" alt="Imagem do produto" width="80" height="60">
                    </td>
                    <td>{{ $produto->nome }}</td>
                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td> <!-- Formatação de preço -->
                    <td>
                        <a href="{{ route('ofertas.show', ['id' => $produto->id]) }}" class="btn btn-primary">Visualizar</a>
                        
                        <a href="{{ route('ofertas.edit', ['id' => $produto->id]) }}" class="btn btn-secondary">Editar</a>

                        <form action="{{ route('ofertas.destroy', ['id' => $produto->id]) }}" method="post" style="display: inline-block">
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
