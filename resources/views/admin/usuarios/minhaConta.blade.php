@extends('layouts.site')
<link rel="stylesheet" href="{{ asset('css/opcoesCadastro.css') }}">

@section('conteudo')
    <style>
        body {
            background-color: #ffffff
        }

        /* classe de botão cancelar trazida da view minhasinformações */
        #botaoCancelar {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 1.1rem;

            padding: 0.5rem 2.2rem;
            margin-top: 3.5rem;
            border: none;
            border-radius: 5px;
            transition: all 0.3s ease;

            background-color: #fff;
            color: #8C6342;
            border: 1px solid #8C6342;
            margin-left: 3rem
        }

        #botaoCancelar:hover {
            background-color: #755439;
            color: #fff;
            cursor: pointer;
        }
    </style>

    <main>

        @if (session('sucesso'))
            <script>
                // mostra a mensagem depois de carregar o site primeiro
                window.onload = function() {
                    alert('{{ session('sucesso') }}');
                };
            </script>
        @endif

        <div class="conteudo" style="padding-bottom: 3rem">

            <div id="titulo">
                <h2>Área do usuário</h2>
            </div>

            <div class="opcoesCadastro">
                <div class="divisor">
                    <a href="{{ route('usuario.minhasInformacoes', ['id' => Auth::user()->id]) }}"
                        class="text-decoration-none">
                        <h4>Minhas Informações</h4>
                    </a>
                    <span class="descricaoOpcao">Visualize ou altere suas informações de cadastro</span>
                </div>
            </div>

            <div class="opcoesCadastro">
                <div class="divisor">
                    <a href="{{ route('usuario.gerenciarPagamentos', ['id' => Auth::user()->id]) }}"  class="text-decoration-none">
                        <h4>Formas de pagamento</h4>
                    </a>
                    <span class="descricaoOpcao">Visualize ou altere suas formas de pagamento</span>
                </div>
            </div>

            <form action="{{ route('usuarioAdm.destroy', ['id' => Auth::user()->id]) }}" method="post">

                @csrf
                @method('DELETE')

                <button type="submit" id="botaoCancelar" onclick="return confirmDelete()">Excluir conta</button>

            </form>

        </div>
    </main>

    <script>
        function confirmDelete() {

            return confirm('Tem certeza que deseja deletar a sua conta? Esta ação não pode ser desfeita.');

        }
    </script>
@endsection
