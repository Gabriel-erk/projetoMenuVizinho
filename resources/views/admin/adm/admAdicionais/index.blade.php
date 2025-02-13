@extends('admin.dashboard')

@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Lista de Adicionais</h2>
        <a href="{{ route('adicional.create') }}" class="btn btn-primary">Cadastrar</a>
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
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th> <!-- Adicionado cabeçalho para ações -->
            </tr>
        </thead>
        <tbody>
            @foreach ($adicionais as $adicional)
                <tr>
                    <td>{{ $adicional->id }}</td>
                    <td>{{ $adicional->nome }}</td>
                    <td>R$ {{ number_format($adicional->valor, 2, ',', '.') }}</td> <!-- Formatação de preço -->
                    <td>
                        <a href="{{ route('adicional.show', ['id' => $adicional->id]) }}" class="btn btn-primary">Visualizar</a>
                        
                        <a href="{{ route('adicional.edit', ['id' => $adicional->id]) }}" class="btn btn-secondary">Editar</a>

                        <form action="{{ route('adicional.destroy', ['id' => $adicional->id]) }}" method="post" style="display: inline-block">
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
