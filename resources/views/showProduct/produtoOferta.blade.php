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

        .posicionaBotaoSubmit {
            justify-content: space-between;
            padding-right: 1rem;
            margin-top: 0;
        }

        .accordion-button:focus {
            box-shadow: none;
        }
    </style>

    @if (session('sucesso'))
        <script>
            window.onload = function() {
                alert('{{ session('sucesso') }}');
            };
        </script>
    @endif

    @if (session('error'))
        <script>
            window.onload = function() {
                alert('{{ session('error') }}');
            };
        </script>
    @endif

    <main>
        <div class="text-center py-5" style="background-color: #fbe7ca;">
            <img src="{{ asset($oferta->imagem) }}" style="width: 40vw; height: 60vh">
        </div>

        <div class="px-3">
            <div class="d-flex justify-content-between w-100 my-2">
                <h1 style="font-family: 'Titan One', sans-serif; color:#8C6342" class="fw-normal">{{ $oferta->nome }}</h1>
                <h2 style="font-family: 'Poppins', sans-serif; font-weight:600">${{ $oferta->preco }}</h2>
            </div>

            <div style="font-family: 'Cabin', sans-serif; font-weight: 500; color: #979797">
                {{-- utilizando método do carbon para formatar a data para mostrar apenas d/m/y  --}}
                <p>{{ $oferta->descricao }} - Disponível até: {{ \Carbon\Carbon::parse($oferta->duracao)->format('d/m/Y') }}
                </p>
            </div>
        </div>

        <div class="accordion mt-4" id="accordionExample">
            <!-- Informações Nutricionais Accordion -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne"
                        style="color: #8C6342; font-family:'Poppins', sans-serif; font-weight:500;">
                        INFORMAÇÕES NUTRICIONAIS
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {{ $oferta->info_nutricional }}
                    </div>
                </div>
            </div>

            <!-- Adicionais Accordion -->
            <div class="accordion-item mt-4">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"
                        style="color: #8C6342; font-family:'Poppins', sans-serif; font-weight:500;">
                        Adicionais - Escolha até 5 opções
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
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
                                <h3 style="font-weight: 600; color: #464646">Adicionar Bacon</h3>
                                <p class="fw-semibold">+ R$ 3,00</p>
                            </div>
                            <i class="fa-solid fa-plus" style="color: #8C6342;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="posicionaBotaoSubmit mt-4">
            <a href="{{ url()->previous() }}" class="botaoAdicionar" id="botaoCancelar">Voltar</a>

            <form action="{{ route('lista.addToCart', ['itemId' => $oferta->id, 'tipoItem' => $oferta->tipo_item]) }}"
                method="post">
                @csrf
                <button type="submit" class="botaoAdicionar">Adicionar ao carrinho</button>
            </form>
        </div>
    </main>
@endsection
