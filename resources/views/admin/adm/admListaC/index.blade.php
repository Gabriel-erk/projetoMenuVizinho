@extends('admin.dashboard')

@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Lista de Carrinhos</h2>
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

                <th>User_id</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($listas as $lista)
                <tr>
                    <td>{{ $lista->id }}</td>
                    <td>{{ $lista->user_id }}</td>
                    <td>
                        <a href="{{ route('lista.show', ['id' => $lista->id]) }}" class="btn btn-primary">Visualizar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
