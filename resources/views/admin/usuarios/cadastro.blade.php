@extends('layouts.site')

@section('conteudo')
    <style>
        body {
            background-color: #fff;
            font-family: 'Poppins', sans-serif;
        }

        #centraliza {
            width: 100%;
            margin-top: 40px;
            display: flex;
            justify-content: center;
        }

        #conteudo {
            border: 1px solid #ededed;
            border-radius: 30px;
            box-shadow: 5px 5px 10px #ccc;
            padding: 20px;
            width: 100%;
            max-width: 800px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            /* font-family: 'Poppins', sans-serif; */
        }

        .form-control:focus {
            outline: none;
            border-color: #007bff;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }

        .col {
            flex: 1;
            margin-right: 10px;
        }

        .col:last-child {
            margin-right: 0;
        }

        select.form-control {
            height: 40px;
        }

        #botoesCadastro {
            display: flex;
            width: 58%;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
        }

        #botoesCadastro a {
            text-decoration: none;
            font-size: 15px;
            color: #007bff;
        }

        #botoesCadastro a:hover {
            text-decoration: underline;
        }

        #botoesCadastro button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        #botoesCadastro button:hover {
            background-color: #0056b3;
        }
    </style>

    <div id="centraliza">
        <div id="conteudo">
            <h2>Cadastro Usuário</h2>

            <div>
                <div class="row">
                    <div class="col">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Nome" class="form-control">
                    </div>
                    <div class="col">
                        <label for="sobrenome" class="form-label">Sobrenome</label>
                        <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" class="form-control">
                    </div>
                </div>
            </div>

            <div>
                <label for="email" class="form-label">E-mail</label>
                <input type="text" name="email" id="email" placeholder="seuemail@hotmail.com" class="form-control">
            </div>

            <div>
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Senha" class="form-control">
            </div>

            <div class="row">
                <div class="col">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" name="endereco" id="endereco" placeholder="Endereço" class="form-control">
                </div>
                <div class="col">
                    <label for="bairro" class="form-label">Bairro</label>
                    <input type="text" name="bairro" id="bairro" placeholder="Bairro" class="form-control">
                </div>
                <div class="col">
                    <label for="numero" class="form-label">Número</label>
                    <input type="text" name="numero" id="numero" placeholder="225/abc" class="form-control">
                </div>
            </div>

            <div>
                <label for="complemento" class="form-label">Complemento</label>
                <input type="text" name="complemento" id="complemento" placeholder="Complemento" class="form-control">
            </div>

            <div class="row">
                <div class="col">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" name="cidade" id="cidade" placeholder="Cidade" class="form-control">
                </div>

                <div class="col">
                    <label for="estado" class="form-label">Estado</label>
                    <select id="estado" name="estado" class="form-control" >
                        <option selected>UF...</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                </div>

                <div class="col">
                    <label for="cep" class="form-label">CEP</label>
                    <input type="text" name="cep" id="cep" placeholder="CEP" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" name="telefone" id="telefone" placeholder="(00) 0000-000" class="form-control"
                        maxlength="15" onkeyup="phone(event)">
                </div>
                <div class="col">
                    <label for="celular" class="form-label">Celular</label>
                    <input type="text" name="celular" id="celular" placeholder="(00) 0000-000" class="form-control"
                        maxlength="15" onkeyup="phone(event)">
                </div>
            </div>

            <div>
                <label for="foto" class="form-label">Foto</label>
                <input type="submit" name="foto" id="foto" placeholder="foto" class="form-control">
            </div>

            <div id="botoesCadastro">
                <a href="{{ route('site.index') }}">Voltar</a>
                <button type="submit">Cadastrar</button>
            </div>

        </div>
    </div>

    <script>
        /* formatação da máscara do campo telefone com regex */

        const phone = (event) => {
            let input = event.target
            input.value = phoneMask(input.value)
        }

        const phoneMask = (value) => {
            // se o valor de 'value' for falso, retorne uma string vazia
            if (!value) return ""
            value = value.replace(/\D/g, '')
            value = value.replace(/(\d{2})(\d)/, "($1) $2")
            value = value.replace(/(\d)(\d{4})$/, "$1-$2")
            return value
        }
    </script>
@endsection
