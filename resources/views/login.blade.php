@extends('layouts.site')

@section('conteudo')
<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>

        body {
            background-color: #fff;
        }

        #centraliza {
            width: 100%;
            margin-top: 40px;
        }

        #conteudo {
            border: 1px solid #ededed;
            border-radius: 30px;
            box-shadow: 5px 5px 10px #ccc;

            /* max-width: 800px; */
        }

        #botoes button {
            margin-left: 110px;
        }


        a {

            text-decoration: none;
            padding-top: 8px;
            font-size: 15px;

        }
    </style>

    <div class="mb-4" id="centraliza">

        <div class="row">
            <!--  mt-3 mb-3-->
            <div id="conteudo" class="container p-4 col-md-4">

                <div class="d-flex justify-content-center mt-2 mb-3">
                    <h2>Login</h2>
                </div>

                <div class="mb-3 campos">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" name="email" id="email" placeholder="seuemail@hotmail.com"
                        class="form-control">

                    <!-- <a href="#">Esqueceu seu e-mail?</a> -->
                </div>

                <div class="mb-3 campos">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha" placeholder="Senha" class="form-control">

                    <!-- <a href="#">Esqueceu sua senha?</a> -->
                </div>

                <div class="d-flex align-items-center" id="botoes">

                    <a href="index">Voltar</a>

                    <div>
                        <button type="submit" class="btn btn-primary  btn-lg">Entrar</button>
                    </div>

                </div>

            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@endsection

<!-- bootstrap -->
