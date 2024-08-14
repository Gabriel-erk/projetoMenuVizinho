@extends('layouts.site')

@section('conteudo')
    <style>
        body {
            background-color: #fff;
            font-family: 'Poppins', sans-serif
        }

        #centraliza {
            width: 100%;
            margin-top: 40px;

            display: flex;
            justify-content: center;
            margin-bottom: 15px
        }

        #conteudo {
            border: 1px solid #ededed;
            border-radius: 30px;
            box-shadow: 5px 5px 10px #ccc;

            padding: 20px 20px;

            width: 450px;
            height: 350px;
        }

        /* formatação titulo 'login' */
        .login {
            margin-top: 10px;
            margin-bottom: 15px;

            text-align: center
        }

        .login h2 {
            font-weight: 500;
            font-size: 31px;
        }

        /* formatação da div que agrupa os campos a serem preenchidos */

        .campos {
            margin-bottom: 15px;
        }

        .campos label {
            font-size: 14px;
            /* padding:  */
        }

        .campos input {
            display: block;

            margin-top: 5px;
            padding-left: 5px;

            height: 40px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: all 0.3s ease;

            font-family: 'Poppins', sans-serif
        }

        .campos input:hover {
            border-color: #A5A5A5;
        }

        .campos input:focus {
            background-color: #FFF;
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        #botoes {
            display: flex;
            /* justify-content: center; */
            align-items: center
        }

        #botoes button {
            font-weight: 400;
            color: #fff;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            /* Cor primária */
            background-color: #007bff;
            /* Cor da borda */
            border: 1px solid #007bff;
            /* Espaçamento interno */
            padding: 0.5rem 1rem;
            /* Tamanho da fonte */
            font-size: 1.25rem;
            line-height: 1.5;
            /* Borda arredondada */
            border-radius: 0.3rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;

            margin-left: 110px;
        }

        #botoes button:hover {
            cursor: pointer;
            color: #fff;
            background-color: #0056b3;
            /* Cor de fundo ao passar o mouse */
            border-color: #0056b3;
            /* Cor da borda ao passar o mouse */
        }

        /* altera as cores do botão ao ser clicado */
        #botoes button:active {
            color: #fff;
            background-color: #004085;
            /* Cor de fundo ao clicar */
            border-color: #003768;
            /* Cor da borda ao clicar */
        }
        

        #botoes a {
            text-decoration: none;
            padding-top: 8px;
            font-size: 15px;
            color: #007bff;
            transition: color 0.15s ease-in-out;
        }

        #botoes a:hover {
            color: #0056b3
        }
    </style>

    <div id="centraliza">

        <div class="teste">

            <div id="conteudo">

                <div class="login">
                    <h2>Login</h2>
                </div>

                <div class="campoInfo">
                    <div class="campos">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" id="email" placeholder="seuemail@hotmail.com">

                        <!-- <a href="#">Esqueceu seu e-mail?</a> -->
                    </div>

                    <div class="campos">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" name="senha" id="senha" placeholder="Senha">

                        <!-- <a href="#">Esqueceu sua senha?</a> -->
                    </div>

                    <div id="botoes">

                        <a href="{{ route('site.index') }}">Voltar</a>

                        <div>
                            <button type="submit">Entrar</button>
                        </div>

                    </div>
                </div>


            </div>
        </div>

    </div>
@endsection
