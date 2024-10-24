@extends('layouts.site')

@section('conteudo')

    <style>
        body {
            background-color: #fff;
        }

        @media (min-width: 768px) and (max-width: 1366px) {
            .login {
                width: 30vw;
                height: 49vh;
            }
        }

        @media (min-width: 1367px) {
            .login {
                width: 25vw;
                height: 35vh;
            }
        }
    </style>

    <div class="container py-5 d-flex justify-content-center align-items-center">

        <div class="login card shadow-sm rounded-4">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $erro)
                                <li>{{ $erro }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="text-center mb-4">
                    <h2>Login</h2>
                </div>

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="seuemail@hotmail.com">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Senha">
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('site.index') }}" class="btn btn-link">Voltar</a>

                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection
