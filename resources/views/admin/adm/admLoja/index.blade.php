@extends('admin.dashboard')

@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Sua Loja</h2>
        {{-- @if ($quantidadeLojas < 1) --}}
            <a href="{{ route('loja.create') }}" class="btn btn-primary">Cadastrar</a>
        {{-- @endif --}}
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
                <th>Logotipo</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>{{ $loja->id }}</td>
                <td>{{ $loja->nome_loja }}</td>
                <td>{{ $loja->logotipo }}</td>

                <td>
                    <a href="{{ route('loja.show') }}" class="btn btn-primary">Visualizar</a>

                    <a href="{{ route('loja.edit', ['id' => $loja->id]) }}" class="btn btn-secondary">Editar</a>

                    <form action="{{ route('loja.destroy', ['id' => $loja->id]) }}" method="post"
                        style="display: inline-block">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Excluir</button>

                    </form>
                </td>
            </tr>

        </tbody>
    </table>
@endsection
