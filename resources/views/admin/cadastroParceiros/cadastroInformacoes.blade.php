@extends('layouts.site')
<link rel="stylesheet" href="{{ asset('css/parceirosCss/cadastroInformacoes.css') }}">

@section('conteudo')
    <main>

        <div class="tituloDesc">
            <h2>Informações do restaurante</h2>
        </div>

        <div class="conteudo">

            <div class="cadastroInfo">

                <div class="agrupaCampos">

                    <div class="tituloInfo">
                        <h3>Nome e logotipo</h3>
                    </div>

                    <input type="text" name="nomeRestaurante" id="nomeRestaurante" placeholder="Nome do restaurante..."
                        class="campoRegistro campoDividido">
                </div>

                <div class="imgRegistro">

                    <div class="fundoImgRegistro">
                        <button type="submit" class="botaoImg"><i class="fa-solid fa-plus"
                                style="color: #000000;"></i></button>
                    </div>

                    <p>logo - 150x150</p>
                </div>

            </div>

            <div class="cadastroInfo cadastroSobre">

                <div class="agrupaCampos">

                    <div class="tituloInfo">
                        <h3>Página sobre nós</h3>
                    </div>

                    <input type="text" name="paginaSobre" id="paginaSobre" placeholder="Informações..."
                        class="campoRegistro campoDividido campoSobre">
                </div>

                <div class="imgRegistro">

                    <div class="fundoImgRegistro fundoImgSobreNos">
                        <button type="submit" class="botaoImg"><i class="fa-solid fa-plus"
                                style="color: #000000;"></i></button>
                    </div>

                    <p>img - 1078x550</p>
                </div>

            </div>

            <div class="cadastroInfo ">

                <div class="agrupaCampos">

                    <div class="tituloInfo">
                        <h3>Página politica de privacidade</h3>
                    </div>

                    <input type="text" name="paginaSobre" id="paginaSobre" placeholder="Informações..."
                        class="campoRegistro campoDividido campoSobre">
                </div>


            </div>

            <div class="cadastroInfo ">

                <div class="agrupaCampos">

                    <div class="tituloInfo">
                        <h3>Página regras cupons</h3>
                    </div>

                    <input type="text" name="paginaCupon" id="paginaCupon" placeholder="Informações..."
                        class="campoRegistro campoDividido campoSobre">
                </div>


            </div>

        </div>

        <div class="agrupaBotoes">

            <div class="botoes">

                <a href="cadastroRestaurante">Voltar</a>

            </div>

            <div class="botoes">

                <a href="#">Salvar</a>

            </div>

        </div>

    </main>
@endsection
