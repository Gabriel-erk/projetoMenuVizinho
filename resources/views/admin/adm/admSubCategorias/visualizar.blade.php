@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Visualizar Sub-Categorias</h2>
    </div>
    <hr>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <td>{{ $subCategoria->id }}</td>
        </tr>
        <tr>
            <th>Titulo Categoria</th>
            <td>{{ $subCategoria->titulo_sub_categoria }}</td>
        </tr>
        <tr>
            <th>Imagem</th>
            <td>{{ $subCategoria->imagem }}</td>
        </tr>
        
    </table>
    <a href="{{ route('subCategorias.edit', ['id' => $subCategoria->id]) }}" class="btn btn-primary">Editar</a>
    <a href="{{ route('subCategorias.index') }}" class="btn btn-secondary">Cancelar</a>
@endsection
