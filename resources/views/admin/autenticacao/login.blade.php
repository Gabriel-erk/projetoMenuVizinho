@extends('layouts.site')

@section('conteudo')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <style>
        body {
            background-color: #fff;
        }
    </style>

    <div id="centraliza">

        <div class="teste">

            <div id="conteudo">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            {{-- percorre tudo do array errors, (com all()), joga na váriavel erro, e imprime em um elemento "li" com o erro --}}
                            @foreach ($errors->all() as $erro)
                                <li>{{ $erro }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="login">
                    <h2>Login</h2>
                </div>

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="campoInfo">
                        <div class="campos">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" placeholder="seuemail@hotmail.com">

                            <!-- <a href="#">Esqueceu seu e-mail?</a> -->
                        </div>

                        <div class="campos">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" name="password" id="password" placeholder="Senha">

                            <!-- <a href="#">Esqueceu sua senha?</a> -->
                        </div>

                        <div id="botoes">

                            <a href="{{ route('site.index') }}">Voltar</a>

                            <div>
                                <button type="submit">Entrar</button>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection
