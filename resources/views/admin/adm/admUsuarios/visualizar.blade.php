@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Visualizar Usuarios</h2>
    </div>
    <hr>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <td>{{ $usuario->id }}</td>
        </tr>
        <tr>
            <th>Nome</th>
            <td>{{ $usuario->nome }}</td>
        </tr>
        <tr>
            <th>Sobrenome</th>
            <td>{{ $usuario->sobrenome }}</td>
        </tr>
        <tr>
            <th>E-mail</th>
            <td>{{ $usuario->email }}</td>
        </tr>
        <tr>
            <th>Rua</th>
            <td>{{ $usuario->rua }}</td>
        </tr>
        <tr>
            <th>Bairro</th>
            <td>{{ $usuario->bairro }}</td>
        </tr>
        <tr>
            <th>Número</th>
            <td>{{ $usuario->numero }}</td>
        </tr>
        <tr>
            <th>Telefone</th>
            <td>{{ $usuario->telefone }}</td>
        </tr>
        <tr>
            <th>Celular</th>
            <td>{{ $usuario->celular }}</td>
        </tr>
        <tr>
            <th>Foto</th>
            <td>{{ $usuario->foto }}</td>
        </tr>

    </table>
    {{-- condição if pois $listaCarrinho pode ser 'null', então se não for null, mostra o botão direcionando para a lista carrinho do usuário --}}
    @if ($listaCarrinho)
        <a href="{{ route('lista.show', ['id' => $listaCarrinho->id]) }}" class="btn btn-info">Ver carrinho</a>
    @else
        <p>Este usuário não possui uma lista de carrinho.</p>
    @endif

    <a href="{{ route('usuarioAdm.edit', ['id' => $usuario->id]) }}" class="btn btn-primary">Editar</a>
    <a href="{{ route('usuarioAdm.index') }}" class="btn btn-secondary">Cancelar</a>
@endsection
