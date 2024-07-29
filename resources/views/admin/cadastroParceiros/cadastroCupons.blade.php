@extends('layouts.site')
<link rel="stylesheet" href="{{ asset('css/cadastroCupons.css') }}">

@section('conteudo')
    <main>

        <div class="tituloDesc">
            <h2>Cupons do Restaurante</h2>
        </div>

        <div class="conteudo">

            <div class="cupom">

                <div class="tituloCupom">
                    01
                </div>

                <div class="agrupaTituloDesc">

                    <div class="separaCampos">

                        <input type="text" name="titulo" id="titulo" placeholder="Título"
                            class="campoRegistro campoDividido">

                        <input type="text" name="categoria" id="categoria" placeholder="Categoria"
                            class="campoRegistro campoDividido">

                    </div>

                    <input type="text" name="duracao" id="duracao" placeholder="Duração"
                        class="campoRegistro campoDividido">

                </div>

            </div>

            <div class="cupom">

                <div class="tituloCupom">
                    02
                </div>

                <div class="agrupaTituloDesc">

                    <div class="separaCampos">

                        <input type="text" name="titulo" id="titulo" placeholder="Título"
                            class="campoRegistro campoDividido">

                        <input type="text" name="categoria" id="categoria" placeholder="Categoria"
                            class="campoRegistro campoDividido">

                    </div>

                    <input type="text" name="duracao" id="duracao" placeholder="Duração"
                        class="campoRegistro campoDividido">

                </div>

            </div>

            <div class="cupom">

                <div class="tituloCupom">
                    03
                </div>

                <div class="agrupaTituloDesc">

                    <div class="separaCampos">

                        <input type="text" name="titulo" id="titulo" placeholder="Título"
                            class="campoRegistro campoDividido">

                        <input type="text" name="categoria" id="categoria" placeholder="Categoria"
                            class="campoRegistro campoDividido">

                    </div>

                    <input type="text" name="duracao" id="duracao" placeholder="Duração"
                        class="campoRegistro campoDividido">

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
