@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Visualizar Loja</h2>
    </div>
    <hr>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <td>{{ $loja->id }}</td>
        </tr>
        <tr>
            <th>Logotipo</th>
            <td>{{ $loja->logotipo }}</td>
        </tr>
        <tr>
            <th>Texto sobre nós</th>
            <td>{{ $loja->texto_sobre_restaurante }}</td>
        </tr>
        <tr>
            <th>Imagem sobre nós</th>
            <td>{{ $loja->imagem_sobre_restaurante }}</td>
        </tr>
        <tr>
            <th>Política de privacidade</th>
            <td>{{ $loja->texto_politica_privacidade }}</td>
        </tr>

    </table>
    {{-- <a href="{{ route('lojas.edit', ['id' => $loja->id]) }}" class="btn btn-primary">Editar</a> --}}
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
@endsection
