@extends('layouts.site')

@section('conteudo')
    <link rel="stylesheet" href="{{ asset('css/usuariosCss/adicionarPagamento.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tituloEditUser.css') }}">
    <link rel="stylesheet" href="{{ asset('css/posicionaBotaoSubmit.css') }}">

    {{-- jQuerry --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        body {
            background-color: #fff;
        }

        .posicionaBotaoSubmit {
            justify-content: center;
        }
    </style>

    <div class="tituloEditUser">
        <h2>Adicionar um novo cartão</h2>
    </div>

    <div class="blocoNovoCartao">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pagamentos.store') }}" method="POST">
            @csrf
            <div class="agrupaCampoCartao" style="margin-top: 30px">

                <div class="campo campoDuplo" style="margin-bottom: 15px">

                    <div class="limitaLabel" style="margin-right: 20px; width: 50%"> <label for="numeroCartao">Número do
                            cartão</label>
                        <input type="text" name="numeroCartao" id="numeroCartao" value="{{ old('numeroCartao') }}">
                    </div>

                    <div class="limitaLabel" style="width: 50%"><label for="cvv">CVV</label>
                        <input type="text" name="cvv" id="cvv" value="{{ old('cvv') }}">
                    </div>

                </div>

                <div class="campo">

                    <div class="limitaLabel" style="width: 49.2%"> <label for="dataVencimento">Data de
                            vencimento</label>
                        <input type="date" name="dataVencimento" id="dataVencimento" value="{{ old('dataVencimento') }}">
                    </div>

                </div>

            </div>

            <div class="agrupaCampoCartao" style="margin-top: 2rem">

                <div class="campo" style="margin-bottom: 1rem">

                    <div class="limitaLabel"> <label for="nomeTitular">Nome do titular</label>
                        <input type="text" name="nomeTitular" id="nomeTitular" value="{{ old('nomeTitular') }}">
                    </div>

                </div>

                <div class="campo">

                    <div class="limitaLabel"> <label for="cpf">CPF</label>
                        {{-- limitando tamanho em 14 caracteres --}}
                        <input type="text" name="cpf" id="cpf" maxlength="14" value="{{ old('cpf') }}">
                    </div>

                </div>

            </div>

            <div class="posicionaBotaoSubmit">
                <a href="{{ route('usuario.gerenciarPagamentos', ['id' => Auth::user()->id]) }}" class="botaoAdicionar"
                    id="botaoCancelar">Voltar</a>

                <button type="submit" class="botaoAdicionar">Salvar</button>
            </div>
        </form>

    </div>

    <script>
        /* 
         * máscara para o campo "número do cartão" 
         * permite apenas numeros
         * coloca um ponto a cada 4 caracteres
         * remove ponto se estiver sobrando
         * limita o tamanho em 19 caracteres
         */
        function mcc(v) {
            v = v.replace(/\D/g, ""); // Permite apenas dígitos
            v = v.replace(/(\d{4})/g, "$1."); // Coloca um ponto a cada 4 caracteres
            v = v.replace(/\.$/, ""); // Remove o ponto se estiver sobrando
            v = v.substring(0, 19) // Limita o tamanho

            return v;
        }

        /*
         * certifica-se que o DOM esteja totalmente carregado antes de chamar o evento input 
         * .ready - é para quando estiver 'pronto', ou seja, quando estiver carregado a página, será chamada a função anônima
         * $ é como se estivesse usando o prefixo "jQuerry" (dizendo que é um comando do jQuerry)
         * */
        $(document).ready(function() {
            /*
             * evento input ao camo numeroCartão, onde, cada vez que o usuário digitar algo, a função mcc será chamada para formatar o valor(this.value = mcc(this.value)) 
             * $('#numeroCartao') - quer dizer q jQuerry.(#numeroCartao) - estou pegando o elemento com o id 'NumeroCartao' através do jQuerry 
             */
            $('#numeroCartao').on('input', function() {
                this.value = mcc(this.value);
            });

            $('#cvv').on('input', function() {
                this.value = cvv(this.value);
            });

            $('#nomeTitular').on('input', function() {
                this.value = name(this.value);
            });

            // let campoCpf = $('#cpf');
            // campoCpf.mask('000.000.000-00', {reverse: true});
            // $("#cpf").inputmask("999.999.999-99")
            $('#cpf').on('input', function() {
                this.value = formatCpf(this.value);
            })
        });

        // função que permite apenas numeros no campo CVV e limita os caracteres em 3
        function cvv(v) {
            v = v.replace(/\D/g, "");
            v = v.substring(0, 3);

            return v;
        }

        // função que limita o número máximo de caracteres em 70 e não permite caracteres especiais e números (campo: nomeTitular)
        function name(v) {

            v = v.replace(/[^a-zA-Z\s]/g, ""); // Remove números e caracteres especiais
            v = v.substring(0, 70);

            return v
        }

        function formatCpf(v) {
            v = v.replace(/\D/g, ""); // Remove tudo que não é dígito
            v = v.replace(/(\d{3})(\d)/, "$1.$2"); // Coloca ponto entre o terceiro e o quarto dígitos
            v = v.replace(/(\d{3})(\d)/, "$1.$2"); // Coloca ponto entre o sexto e o sétimo dígitos
            v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2"); // Coloca hífen entre o nono e o décimo dígitos
            v = v.substring(0, 14); // Limita a 14 caracteres, também tem q limitar no campo input

            return v;
        }
    </script>
@endsection
