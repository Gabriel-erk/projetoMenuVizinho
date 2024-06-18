@extends('layouts.site')
<link rel="stylesheet" href="{{ asset('css/categorias.css') }}">

@section('conteudo')
    <main>
        <div class="tituloDesc">
            <h1>Categorias do Restaurante</h1>
            <p>estas categorias serão representadas na tela inicial caso não exista nenhuma sub-categoria</p>
        </div>

        <div class="categoriasRestaurante">

            <div class="categoria">

                <div class="fundoImgCategoria">

                    <button type="submit" class="botaoImg"><i class="fa-solid fa-plus" style="color: #000000;"></i></button>

                </div>

                <div class="tituloCategoria">
                    <input class="input" type="text" id="tituloCategoria" name="tituloCategoria"
                        placeholder="Titulo...">
                </div>

            </div>

            <div class="categoria">

                <div class="fundoImgCategoria">

                    <button type="submit" class="botaoImg"><i class="fa-solid fa-plus"
                            style="color: #000000;"></i></button>

                </div>

                <div class="tituloCategoria">
                    <input class="input" type="text" id="tituloCategoria" name="tituloCategoria"
                        placeholder="Titulo...">
                </div>

            </div>

            <div class="categoria">

                <div class="fundoImgCategoria">

                    <button type="submit" class="botaoImg"><i class="fa-solid fa-plus"
                            style="color: #000000;"></i></button>

                </div>

                <div class="tituloCategoria">
                    <input class="input" type="text" id="tituloCategoria" name="tituloCategoria"
                        placeholder="Titulo...">
                </div>

            </div>

            <div class="categoria">

                <div class="fundoImgCategoria">

                    <button type="submit" class="botaoImg"><i class="fa-solid fa-plus"
                            style="color: #000000;"></i></button>

                </div>

                <div class="tituloCategoria">
                    <input class="input" type="text" id="tituloCategoria" name="tituloCategoria"
                        placeholder="Titulo...">
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
