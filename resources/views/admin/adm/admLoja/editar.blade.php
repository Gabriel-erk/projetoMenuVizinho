@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Editar Loja</h2>
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
    <form action="{{ route('loja.update', $loja->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nome_loja" class="form-label">Nome da loja</label>
            <input type="text" name="nome_loja" class="form-control" id="nome_loja"
                placeholder="Nome da loja" value="{{ old('nome_loja', $loja->nome_loja) }}" maxlength="20">
        </div>

        <div class="mb-3">
            <label for="logotipo" class="form-label">Logotipo</label>
            <input type="file" name="logotipo" class="form-control" id="logotipo">
            @if($loja->logotipo)
                <img src="{{ asset('storage/' . $loja->logotipo) }}" alt="Logotipo Atual" class="mt-2" style="width: 150px;">
            @endif
        </div>

        <ul class="alert alert-info">
            <span>Escolha no máximo 3 imagens, de tamanho 1920x1080</span>
        </ul>
        <div class="mb-3">
            <label for="banner_categoria" class="form-label">Categoria do Banner</label>
            <select name="banner_categoria[]" class="form-control" multiple>
                <option value="cardapio" {{ in_array('cardapio', $loja->banner_categoria ?? []) ? 'selected' : '' }}>Cardápio</option>
                <option value="ofertas" {{ in_array('ofertas', $loja->banner_categoria ?? []) ? 'selected' : '' }}>Ofertas</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="banner" class="form-label">Banners</label>
            <input type="file" name="banner[]" class="form-control" id="banner" multiple>
            @if($loja->banners && count($loja->banners) > 0)
                <div class="mt-2">
                    @foreach ($loja->banners as $banner)
                        <img src="{{ asset('storage/' . $banner) }}" alt="Banner Atual" style="width: 150px; margin-right: 5px;">
                    @endforeach
                </div>
            @endif
        </div>

        <ul class="alert alert-info">
            <span>Para definir um novo parágrafo, por favor deixe um espaço em branco entre eles.</span>
        </ul>
        <div class="mb-3">
            <label for="texto_sobre_restaurante" class="form-label">Texto sobre nós</label>
            <textarea name="texto_sobre_restaurante" class="form-control" id="texto_sobre_restaurante" 
                placeholder="Texto sobre nós" rows="4">{{ old('texto_sobre_restaurante', $loja->texto_sobre_restaurante) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="imagem_sobre_restaurante" class="form-label">Imagem sobre nós</label>
            <input type="file" name="imagem_sobre_restaurante" class="form-control" id="imagem_sobre_restaurante">
            @if($loja->imagem_sobre_restaurante)
                <img src="{{ asset('storage/' . $loja->imagem_sobre_restaurante) }}" alt="Imagem Atual" class="mt-2" style="width: 150px;">
            @endif
        </div>

        <ul class="alert alert-info">
            <span>Por favor, deixe os títulos sem um espaçamento em branco do seu conteúdo.</span>
        </ul>
        <div class="mb-3">
            <label for="texto_politica_privacidade" class="form-label">Política de privacidade</label>
            <textarea name="texto_politica_privacidade" class="form-control" id="texto_politica_privacidade" 
                placeholder="Política de privacidade" rows="4">{{ old('texto_politica_privacidade', $loja->texto_politica_privacidade) }}</textarea>
        </div>

        <ul class="alert alert-info">
            <span>Por favor, deixe os títulos sem um espaçamento em branco do seu conteúdo.</span>
        </ul>
        <div class="mb-3">
            <label for="regras_cupons" class="form-label">Regras dos cupons</label>
            <textarea name="regras_cupons" class="form-control" id="regras_cupons" 
                placeholder="Regras dos cupons" rows="4">{{ old('regras_cupons', $loja->regras_cupons) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('loja.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

    <script>
        document.getElementById('banner').addEventListener('change', function() {
            if (this.files.length > 3) {
                alert('Você pode selecionar no máximo 3 banners.');
                this.value = ''; // Limpa o campo se o limite for excedido
            }
        });
    </script>
@endsection
