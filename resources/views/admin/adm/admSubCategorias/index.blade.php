@extends('admin.dashboard')

@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Lista de Sub-Categorias</h2>
        <a href="{{ route('subCategorias.create') }}" class="btn btn-primary">Cadastrar</a>
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
                <th>Descrição</th>
                <th>Imagem</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($subCategorias as $subCategoria)
                <tr>
                    <td>{{ $subCategoria->id }}</td>
                    <td>{{ $subCategoria->titulo_sub_categoria }}</td>
                    <td>{{ $subCategoria->descricao }}</td>
                    <td>{{ $subCategoria->imagem }}</td>
                    <td>
                        <a href="{{ route('subCategorias.show', ['id' => $subCategoria->id]) }}" class="btn btn-primary">Visualizar</a>
                        
                        <a href="{{ route('subCategorias.edit', ['id' => $subCategoria->id]) }}" class="btn btn-secondary">Editar</a>

                        <form action="{{ route('subCategorias.destroy', ['id' => $subCategoria->id]) }}" method="post"
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
