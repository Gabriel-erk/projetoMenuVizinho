@extends('admin.dashboard')

@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Lista de Cupons</h2>
        <a href="{{ route('cupom.create') }}" class="btn btn-primary">Cadastrar</a>
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
                {{-- <th>Descrição</th> --}}
                <th>Expiração</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($cupons as $cupom)
                <tr>
                    <td>{{ $cupom->id }}</td>
                    <td>{{ $cupom->nome_cupom }}</td>
                    {{-- <td>{{ $cupom->descricao_cupom }}</td> --}}
                    <td>{{ $cupom->data_expiracao }}</td>
                    <td>
                        <a href="{{ route('cupom.show', ['id' => $cupom->id]) }}" class="btn btn-primary">Visualizar</a>
                        
                        <a href="{{ route('cupom.edit', ['id' => $cupom->id]) }}" class="btn btn-secondary">Editar</a>

                        <form action="{{ route('cupom.destroy', ['id' => $cupom->id]) }}" method="post"
                            style="display: inline-block">

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
