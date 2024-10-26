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
            <td><img src="{{ asset($loja->logotipo) }}" alt="Logotipo" width="100"></td> {{-- Exibe a imagem do logotipo --}}
        </tr>
        <tr>
            <th>Texto sobre nós</th>
            <td>{{ $loja->texto_sobre_restaurante }}</td>
        </tr>
        <tr>
            <th>Imagem sobre nós</th>
            <td><img src="{{ asset($loja->imagem_sobre_restaurante) }}" alt="Imagem sobre nós" width="100"></td> {{-- Exibe a imagem sobre nós --}}
        </tr>
        <tr>
            <th>Política de privacidade</th>
            <td>{{ $loja->texto_politica_privacidade }}</td>
        </tr>
        <tr>
            <th>Banners</th>
            <td>
                @if($loja->banners->isNotEmpty())
                    <ul>
                        @foreach($loja->banners as $banner)
                            <li>
                                <img src="{{ asset($banner->imagem) }}" alt="{{ $banner->titulo }}" width="100"> {{-- Exibe a imagem do banner --}}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>Nenhum banner disponível.</p>
                @endif
            </td>
        </tr>
    </table>
    <a href="{{ route('loja.edit', ['id' => $loja->id]) }}" class="btn btn-primary">Editar</a>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
@endsection
