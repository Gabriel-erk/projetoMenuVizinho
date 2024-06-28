@extends('layouts.site')

<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

@section('conteudo')
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
            font-size: 15px;
        }
    </style>

    <div class="mb-4" id="centraliza">

        <div class="row">
            <!--  mt-3 mb-3-->
            <div id="conteudo" class="container p-4 col-md-4">

                <div class="d-flex justify-content-center mt-2 mb-3">
                    <h2>Cadastro Usuário </h2>
                </div>

                <div class="mb-3">

                    <div class="row">
                        <div class="col"> <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" id="nome" placeholder="Nome" class="form-control">
                        </div>

                        <div class="col"><label for="Sobrenome" class="form-label">Sobrenome</label>
                            <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome"
                                class="form-control">
                        </div>
                    </div>

                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" name="email" id="email" placeholder="seuemail@hotmail.com"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha" placeholder="Senha" class="form-control">
                </div>

                <div class="mb-3 row">

                    <div class="col-md-6">

                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" name="endereco" id="endereco" placeholder="Endereço" class="form-control">

                    </div>

                    <div class="col-md-4">

                        <label for="bairro" class="form-label">Bairro</label>
                        <input type="text" name="bairro" id="bairro" placeholder="Bairro" class="form-control">

                    </div>

                    <div class="col-md-2">
                        <label for="numero" class="form-label">Numero</label>
                        <input type="text" name="numero" id="numero" placeholder="225/abc" class="form-control">
                    </div>

                </div>

                <div class="mb-3">
                    <label for="complemento" class="form-label">Complemento</label>
                    <input type="text" name="complemento" id="complemento" placeholder="Complemento"
                        class="form-control">
                </div>

                <div class="mb-3 row">

                    <div class="col-md-6">

                        <label for="cidade" class="form-label">Cidade</label>
                        <input type="text" name="cidade" id="cidade" placeholder="Cidade" class="form-control">

                    </div>

                    <div class="col-md-4">
                        <label for="estado" class="form-label">Estado</label>
                        <select id="estado" name="estado" class="form-control">
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

                    <div class="col-md-2">

                        <label for="cep" class="form-label">CEP</label>
                        <input type="text" name="cep" id="cep" placeholder="CEP" class="form-control">

                    </div>

                </div>

                <div class="mb-3 row">

                    <div class="col-md-6">

                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" name="telefone" id="telefone" placeholder="(00) 0000-000"
                            class="form-control">

                    </div>


                    <div class="col-md-6">

                        <label for="celular" class="form-label">Celular</label>
                        <input type="text" name="celular" id="celular" placeholder="(00) 0000-000"
                            class="form-control">

                    </div>

                </div>

                <div class="mb-3 col-md-4">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="submit" name="foto" id="foto" placeholder="foto" class="form-control">
                </div>

                <div class="d-flex align-items-center" id="botoes">

                    <a href="index">Voltar</a>

                    <div>
                        <button type="submit" class="btn btn-primary  btn-lg">Cadastrar</button>
                    </div>


                </div>

            </div>
        </div>

    </div>
@endsection

<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
