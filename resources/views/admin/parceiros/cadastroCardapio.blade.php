@extends('layouts.site')
<link rel="stylesheet" href="{{ asset('css/cadastroCardapio.css') }}">

@section('conteudo')
    <main class="container">

        <div id="titulo">
            <h2>Cadastro do cardápio - <span> Lanches</span></h2>
        </div>

        <div class="registroProdutos">

            <div class="agrupaRegistro">

                <div class="topicos">
                    01
                </div>

                <div class="registro">

                    <div class="imgRegistro">

                        <div class="fundoImgRegistro">
                            <button type="submit" class="botaoImg"><i class="fa-solid fa-plus"
                                    style="color: #000000;"></i></button>
                        </div>

                        <p>img: 300x300</p>
                    </div>

                    <div class="infoRegistro">

                        <input type="text" name="titulo" id="titulos" placeholder="Titulo" class="campoRegistro">

                        <input type="text" name="descricao" id="descricao" placeholder="Descrição" class="campoRegistro">

                        <div class="separaCampos">

                            <input type="text" name="valor" id="valor" placeholder="Valor"
                                class="campoRegistro campoDividido">

                            <input type="text" name="categoria" id="categoria" placeholder="Categoria"
                                class="campoRegistro campoDividido">

                            <input type="text" name="subCategoria" id="subCategoria" placeholder="Sub-Categoria"
                                class="campoRegistro campoDividido">

                        </div>


                        <!-- <textarea id="descricao" name="descricao" rows="4" cols="79" placeholder="Descrição">

                    </textarea> -->

                    </div>
                </div>

                <div class="topicos">
                    Adicional
                </div>

                </span>

                <div class="registro">

                    <div class="imgRegistro">

                        <div class="fundoImgRegistro">
                            <button type="submit" class="botaoImg"><i class="fa-solid fa-plus"
                                    style="color: #000000;"></i></button>
                        </div>

                        <p>img: 300x300</p>
                    </div>

                    <div class="infoRegistro">

                        <input type="text" name="titulo" id="titulos" placeholder="Titulo" class="campoRegistro">

                        <input type="text" name="descricao" id="descricao" placeholder="Descrição" class="campoRegistro">

                        <div class="separaCampos">

                            <input type="text" name="valor" id="valor" placeholder="Valor"
                                class="campoRegistro campoDividido adicional">

                            <input type="text" name="infoNutri" id="infoNutri" placeholder="info Nutricional"
                                class="campoRegistro campoDividido adicional">

                        </div>


                        <!-- <textarea id="descricao" name="descricao" rows="4" cols="79" placeholder="Descrição">

                    </textarea> -->

                    </div>
                </div>

            </div>

            <div class="agrupaRegistro">

                <div class="topicos">
                    02
                </div>

                <div class="registro">

                    <div class="imgRegistro">

                        <div class="fundoImgRegistro">
                            <button type="submit" class="botaoImg"><i class="fa-solid fa-plus"
                                    style="color: #000000;"></i></button>
                        </div>

                        <p>img: 300x300</p>
                    </div>

                    <div class="infoRegistro">

                        <input type="text" name="titulo" id="titulos" placeholder="Titulo" class="campoRegistro">

                        <input type="text" name="descricao" id="descricao" placeholder="Descrição"
                            class="campoRegistro">

                        <div class="separaCampos">

                            <input type="text" name="valor" id="valor" placeholder="Valor"
                                class="campoRegistro campoDividido">

                            <input type="text" name="categoria" id="categoria" placeholder="Categoria"
                                class="campoRegistro campoDividido">

                            <input type="text" name="subCategoria" id="subCategoria" placeholder="Sub-Categoria"
                                class="campoRegistro campoDividido">

                        </div>

                    </div>
                </div>

                <div class="topicos">
                    Adicional
                </div>

                </span>

                <div class="registro">

                    <div class="imgRegistro">

                        <div class="fundoImgRegistro">
                            <button type="submit" class="botaoImg"><i class="fa-solid fa-plus"
                                    style="color: #000000;"></i></button>
                        </div>

                        <p>img: 300x300</p>
                    </div>

                    <div class="infoRegistro">

                        <input type="text" name="titulo" id="titulos" placeholder="Titulo" class="campoRegistro">

                        <input type="text" name="descricao" id="descricao" placeholder="Descrição"
                            class="campoRegistro">

                        <div class="separaCampos">

                            <input type="text" name="valor" id="valor" placeholder="Valor"
                                class="campoRegistro campoDividido adicional">

                            <input type="text" name="infoNutri" id="infoNutri" placeholder="info Nutricional"
                                class="campoRegistro campoDividido adicional">

                        </div>


                        <!-- <textarea id="descricao" name="descricao" rows="4" cols="79" placeholder="Descrição">

                    </textarea> -->

                    </div>
                </div>

            </div>

            <div class="agrupaRegistro">

                <div class="topicos">
                    03
                </div>

                <div class="registro">

                    <div class="imgRegistro">

                        <div class="fundoImgRegistro">
                            <button type="submit" class="botaoImg"><i class="fa-solid fa-plus"
                                    style="color: #000000;"></i></button>
                        </div>

                        <p>img: 300x300</p>
                    </div>

                    <div class="infoRegistro">

                        <input type="text" name="titulo" id="titulos" placeholder="Titulo" class="campoRegistro">

                        <input type="text" name="descricao" id="descricao" placeholder="Descrição"
                            class="campoRegistro">

                        <div class="separaCampos">

                            <input type="text" name="valor" id="valor" placeholder="Valor"
                                class="campoRegistro campoDividido">

                            <input type="text" name="categoria" id="categoria" placeholder="Categoria"
                                class="campoRegistro campoDividido">

                            <input type="text" name="subCategoria" id="subCategoria" placeholder="Sub-Categoria"
                                class="campoRegistro campoDividido">

                        </div>

                    </div>
                </div>

                <div class="topicos">
                    Adicional
                </div>

                </span>

                <div class="registro">

                    <div class="imgRegistro">

                        <div class="fundoImgRegistro">
                            <button type="submit" class="botaoImg"><i class="fa-solid fa-plus"
                                    style="color: #000000;"></i></button>
                        </div>

                        <p>img: 300x300</p>
                    </div>

                    <div class="infoRegistro">

                        <input type="text" name="titulo" id="titulos" placeholder="Titulo" class="campoRegistro">

                        <input type="text" name="descricao" id="descricao" placeholder="Descrição"
                            class="campoRegistro">

                        <div class="separaCampos">

                            <input type="text" name="valor" id="valor" placeholder="Valor"
                                class="campoRegistro campoDividido adicional">

                            <input type="text" name="infoNutri" id="infoNutri" placeholder="info Nutricional"
                                class="campoRegistro campoDividido adicional">

                        </div>


                        <!-- <textarea id="descricao" name="descricao" rows="4" cols="79" placeholder="Descrição">

                    </textarea> -->

                    </div>
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

        </div>

    </main>
@endsection
