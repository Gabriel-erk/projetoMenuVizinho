@extends('layouts.site')
<link rel="stylesheet" href="{{ asset('css/posicionaBotaoSubmit.css') }}">

<!-- adicionando fonte 2 (Titan One) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap" rel="stylesheet">


@section('conteudo')
    <style>
        body {
            background-color: #F8F7F7;
        }

        .posicionaBotaoSubmit{
            justify-content: space-between;
            padding-right: 1rem;
            margin-top: 0
        }
    </style>
    <main>

        <div class="text-center" style="background-color: #fbe7ca;">
            <img src="{{ asset('img/duplo-cheddar.png') }}" style="width: 50vw; height: 70vh">
        </div>

        <div class="">

            <div class="px-3">
                <div class="d-flex justify-content-between w-100 my-2">
                    <h1 style="font-family: 'Titan One', sans-serif; color:#8C6342" class="fw-normal">Mrs. King Chedar Extra
                    </h1>

                    <h2 style="font-family: 'Poppins', sans-serif; font-weight:600">$38.99</h2>
                </div>

                <div style="font-family: 'Cabin', sans-serif; font-weight: 500; color: #979797">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis aperiam debitis dolores porro
                        magnam quos quidem, commodi blanditiis eveniet vero aspernatur nobis atque molestias ratione
                        est voluptates officiis libero eligendi.</p>
                </div>
            </div>

            <div class="bg-white px-3 py-4 mt-4 d-flex justify-content-between align-items-center w-100 shadow">
                <span
                    style="color: #8C6342; font-family:'Poppins', sans-serif; font-weight:500; font-size: 0.8em ">INFORMAÇÕES
                    NUTRICIONAIS</span>
                <i class="fa-solid fa-plus" style="color: #8C6342;"></i>
            </div>
        </div>

        <div class="my-5" style="font-family: 'Poppins', sans-serif;">
            <div class="px-3 pb-4"
                style="background-color: #d9d9d9; padding-top 2px; box-shadow: 0px 4px 8px rgba(0,0,0,0.1); ">
                <span class="d-block fs-2 fw-semibold pt-2" style="color:#4a4a4a;">Adicionais</span>
                <span class="d-block" style="font-weight:500;">Escolha até 5 opções!</span>
            </div>

            <div class="bg-white px-3 mt-4 d-flex align-items-center justify-content-between"
                style="height: 20vh; box-shadow: 0px 4px 8px rgba(0,0,0,0.1)">
                <div>
                    <h3 style="font-weight: 600; color: #464646">Adicionar Cebola</h3>
                    <p class="fw-semibold">+ R$ 2,00</p>
                </div>

                <i class="fa-solid fa-plus" style="color: #8C6342;"></i>
            </div>

            <div class="bg-white px-3 mt-4 d-flex align-items-center justify-content-between"
                style="height: 20vh; box-shadow: 0px 4px 8px rgba(0,0,0,0.1)">
                <div>
                    <h3 style="font-weight: 600; color: #464646">Adicionar Cebola</h3>
                    <p class="fw-semibold">+ R$ 2,00</p>
                </div>

                <i class="fa-solid fa-plus" style="color: #8C6342;"></i>
            </div>
        </div>

        <div class="my-5" style="font-family: 'Poppins', sans-serif;">
            <div class="px-3 pb-4"
                style="background-color: #d9d9d9; padding-top 2px; box-shadow: 0px 4px 8px rgba(0,0,0,0.1); ">
                <span class="d-block fs-2 fw-semibold pt-2" style="color:#4a4a4a;">Adicionais</span>
                <span class="d-block" style="font-weight:500;">Escolha até 5 opções!</span>
            </div>

            <div class="bg-white px-3 mt-4 d-flex align-items-center justify-content-between"
                style="height: 20vh; box-shadow: 0px 4px 8px rgba(0,0,0,0.1)">
                <div>
                    <h3 style="font-weight: 600; color: #464646">Adicionar Cebola</h3>
                    <p class="fw-semibold">+ R$ 2,00</p>
                </div>

                <i class="fa-solid fa-plus" style="color: #8C6342;"></i>
            </div>

            <div class="bg-white px-3 mt-4 d-flex align-items-center justify-content-between"
                style="height: 20vh; box-shadow: 0px 4px 8px rgba(0,0,0,0.1)">
                <div>
                    <h3 style="font-weight: 600; color: #464646">Adicionar Cebola</h3>
                    <p class="fw-semibold">+ R$ 2,00</p>
                </div>

                <i class="fa-solid fa-plus" style="color: #8C6342;"></i>
            </div>
        </div>

        <div class="posicionaBotaoSubmit">
            <a href="{{ route('site.index') }}" class="botaoAdicionar"
                id="botaoCancelar">Voltar</a>

            <button type="submit" class="botaoAdicionar">Adicionar ao carrinho</button>
        </div>
    </main>
@endsection
