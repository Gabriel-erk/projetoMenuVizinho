@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Cadastrar Cupom</h2>
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
    <form action="{{ route('cupom.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome_cupom" class="form-label">Titulo do Cupom</label>
            <input type="text" name="nome_cupom" class="form-control" id="nome_cupom" placeholder="Título do cupom"
                value="{{ old('nome_cupom') }}" maxlength="50">
        </div>

        <div class="mb-3">
            <label for="descricao_cupom" class="form-label">Descrição do Cupom</label>
            <input type="text" name="descricao_cupom" class="form-control" id="descricao_cupom"
                placeholder="Descrição do cupom" value="{{ old('descricao_cupom') }}" maxlength="60">
        </div>

        <div class="mb-3">
            <label for="data_expiracao" class="form-label">Data de Expiração</label>
            <input type="datetime-local" name="data_expiracao" class="form-control" id="data_expiracao"
                value="{{ old('data_expiracao') }}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('cupom.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
