@extends('layouts.site')

@section('conteudo')

    <style>
        body {
            background-color: #fff;
        }

        /* Para telas menores */
        @media (max-width: 767px) {
            #login {
                width: 90vw;
                height: auto;
            }
        }

        /* Para telas entre 768px e 1366px */
        @media (min-width: 768px) and (max-width: 1366px) {
            #login {
                width: 40vw;
                height: auto;
            }
        }

        /* Para telas maiores que 1367px */
        @media (min-width: 1367px) {
            #login {
                width: 30vw;
                /* max-width: 400px; */
                height: auto;
            }
        }

        /* Centralizando o conteúdo */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Estilo do formulário */
        #login h2 {
            font-size: 1.75rem;
        }

        .form-label {
            font-size: 1rem;
        }

        .form-control {
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>

    <div class="login-container">

        <div class="shadow rounded-4 d-flex justify-content-center align-items-center">
            <div id="login" class="px-4 py-5"> <!-- Adicionei padding vertical para espaçamento interno -->

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
                            placeholder="seuemail@hotmail.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Senha" required>
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
