@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Editar Cupom</h2>
    </div>
    <hr>
    @if ($errors->any())
        <div class="boxError alert alert-danger">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('cupom.update', ['id' => $cupom->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome_cupom" class="form-label">Título do Cupom</label>
            <input type="text" name="nome_cupom" class="form-control" id="nome_cupom" placeholder="Título do cupom"
                value="{{ old('nome_cupom', $cupom->nome_cupom) }}" maxlength="50">
        </div>

        <div class="mb-3">
            <label for="descricao_cupom" class="form-label">Descrição do Cupom</label>
            <input type="text" name="descricao_cupom" class="form-control" id="descricao_cupom"
                placeholder="Descrição do cupom" value="{{ old('descricao_cupom', $cupom->descricao_cupom) }}" maxlength="60">
        </div>

        <div class="mb-3">
            <label for="data_expiracao" class="form-label">Data de Expiração</label>
            <input type="datetime-local" name="data_expiracao" class="form-control" id="data_expiracao"
                value="{{ old('data_expiracao', $cupom->data_expiracao) }}">
        </div>

        <div class="mb-3">
            <label for="forma_desconto" class="form-label">Forma de Desconto</label>
            <select name="forma_desconto" class="form-control" id="forma_desconto">
                <option value="1" {{ old('forma_desconto', $cupom->forma_desconto) == 1 ? 'selected' : '' }}>Por Palavras-chave</option>
                <option value="2" {{ old('forma_desconto', $cupom->forma_desconto) == 2 ? 'selected' : '' }}>Por Categoria</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="tipo_desconto" class="form-label">Tipo de Desconto</label>
            <select name="tipo_desconto" class="form-control" id="tipo_desconto">
                <option value="1" {{ old('tipo_desconto', $cupom->tipo_desconto) == 1 ? 'selected' : '' }}>Percentual (%)</option>
                <option value="2" {{ old('tipo_desconto', $cupom->tipo_desconto) == 2 ? 'selected' : '' }}>Valor Fixo</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="valor_desconto" class="form-label">Valor do Desconto</label>
            <input type="number" step="0.01" name="valor_desconto" class="form-control" id="valor_desconto"
                placeholder="Valor do desconto" value="{{ old('valor_desconto', $cupom->valor_desconto) }}">
        </div>

        <div class="mb-3" id="palavras-chave" style="{{ old('forma_desconto', $cupom->forma_desconto) == 1 ? 'display:block;' : 'display:none;' }}">
            <label for="palavras" class="form-label">Palavras-chave (Somente para Desconto por Palavras)</label>
            @foreach ($cupom->palavras as $palavra)
                <input type="text" name="palavras[]" class="form-control mb-2" placeholder="Palavra-chave" value="{{ $palavra->palavra_chave }}">
            @endforeach
            <input type="text" name="palavras[]" class="form-control mb-2" placeholder="Palavra-chave adicional">
        </div>

        <div class="mb-3" id="categorias" style="{{ old('forma_desconto', $cupom->forma_desconto) == 2 ? 'display:block;' : 'display:none;' }}">
            <label for="categorias" class="form-label">Categorias (Somente para Desconto por Categoria)</label>
            <select name="categorias[]" class="form-control" multiple>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ in_array($categoria->id, $cupom->categorias->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $categoria->titulo_categoria }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3" id="sub_categorias" style="{{ old('forma_desconto', $cupom->forma_desconto) == 2 ? 'display:block;' : 'display:none;' }}">
            <label for="sub_categorias" class="form-label">Subcategorias (Somente para Desconto por Categoria)</label>
            <select name="sub_categorias[]" class="form-control" multiple>
                @foreach($subCategorias as $subCategoria)
                    <option value="{{ $subCategoria->id }}" {{ in_array($subCategoria->id, $cupom->subcategorias->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $subCategoria->titulo_sub_categoria }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('cupom.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const formaDesconto = document.getElementById('forma_desconto');
            const palavrasChave = document.getElementById('palavras-chave');
            const categorias = document.getElementById('categorias');
            const sub_categorias = document.getElementById('sub_categorias');

            function toggleFields() {
                if (formaDesconto.value == '1') {
                    palavrasChave.style.display = 'block';
                    categorias.style.display = 'none';
                    sub_categorias.style.display = 'none';
                } else {
                    palavrasChave.style.display = 'none';
                    categorias.style.display = 'block';
                    sub_categorias.style.display = 'block';
                }
            }

            formaDesconto.addEventListener('change', toggleFields);
            toggleFields();
        });
    </script>
@endsection
