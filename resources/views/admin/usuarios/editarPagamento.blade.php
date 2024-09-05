@extends('layouts.site')

@section('conteudo')
    {{-- jQuerry --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        body {
            background-color: #fff;
        }

        .tituloEditUser {

            padding: 30px;
            border-bottom: 1px solid #CCCCCC;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: space-between
        }

        .tituloEditUser h2 {
            font-weight: 500;
        }

        .excluirCartao button {
            background-color: #8C6342;
            border: none;
            cursor: pointer;

            width: 55px;
            height: 40px;

            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .excluirCartao button:hover {
            background-color: #755439;
        }

        .excluirCartao button img {
            width: 26px
        }

        .blocoNovoCartao {
            padding-left: 30px;
            padding-right: 80px;
        }

        /* formatação bloco1InfoCartão */

        .campo input {
            background-color: #F8F8F8;
            padding-top: 1.25rem;
            padding-left: 0.65rem;
            /* transition: all 0.3s ease; */
            border: 1px solid #ccc;
            border-radius: 7px;

            width: 100%;
            height: 55px;

            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .campo input:hover {
            border-color: #A5A5A5;
        }

        .campo input:focus {
            background-color: #FFF;
            border-color: #80bdff;
            /* Remove o outline padrão */
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .campo label {
            position: absolute;
            top: 3px;
            left: 0.35rem;
            font-size: 0.875rem;
            color: #8B8B8B;
            pointer-events: none;

            padding: 0 0.25rem;
            font-family: 'Poppins', sans-serif;
        }

        .campoDuplo {
            display: flex;
        }

        .limitaLabel {
            position: relative;
        }

        /* formatando botão submit */

        .posicionaBotaoSubmit {
            display: flex;
            justify-content: space-between;
        }

        .posicionaBotaoSubmit a {
            padding: 7px 40px
        }

        .botaoAdicionar {

            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 1.1rem;

            padding: 6px 40px;
            margin-top: 50px;

            background-color: #8C6342;
            color: #fff;

            border: none;
            border-radius: 5px;

            transition: all 0.3s ease;
        }

        .botaoAdicionar:hover {
            background-color: #755439;
            cursor: pointer;
        }

        #botaoCancelar {
            background-color: #fff;
            color: #8C6342;
            border: 1px solid #8C6342
        }

        #botaoCancelar:hover {
            background-color: #755439;
            color: #fff;
            cursor: pointer;
        }
    </style>

    <div class="tituloEditUser">
        <h2>Editar Cartão</h2>

        <div class="excluirCartao">
            <form action="">
                <button type="submit" id="botaoExcloi"> <img src="{{ asset('img/lataDeLixo.webp') }}" alt=""></button>
            </form>
        </div>
    </div>

    <div class="blocoNovoCartao">

        <div class="bloco1InfoCartao">

            @if ($errors->any())
                <div class="boxError alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="" method="POST">
                @csrf
                <div class="agrupaCampoCartao" style="margin-top: 30px">

                    <div class="campo campoDuplo" style="margin-bottom: 15px">

                        <div class="limitaLabel" style="margin-right: 20px; width: 50%"> <label for="numeroCartao">Número do
                                cartão</label>
                            <input type="text" name="numeroCartao" id="numeroCartao" value="{{ old('numeroCartao', $metodoPagamento->numero_cartao) }}">
                        </div>

                        <div class="limitaLabel" style="width: 50%"><label for="cvv">CVV</label>
                            <input type="text" name="cvv" id="cvv" value="{{ old('cvv', $metodoPagamento->cvv) }}">
                        </div>

                    </div>

                    <div class="campo">

                        <div class="limitaLabel" style="width: 49.2%"> <label for="dataVencimento">Data de
                                vencimento</label>
                            <input type="date" name="dataVencimento" id="dataVencimento" value="{{ old('dataVencimento', $metodoPagamento->data_vencimento) }}">
                        </div>

                    </div>

                </div>

                <div class="agrupaCampoCartao" style="margin-top: 40px">

                    <div class="campo" style="margin-bottom: 15px">

                        <div class="limitaLabel"> <label for="nomeTitular">Nome do titular</label>
                            <input type="text" name="nomeTitular" id="nomeTitular" value="{{ old('nomeTitular', $metodoPagamento->nome_titular) }}">
                        </div>

                    </div>

                    <div class="campo">

                        <div class="limitaLabel"> <label for="cpf">CPF</label>
                            {{-- limitando tamanho em 14 caracteres --}}
                            <input type="text" name="cpf" id="cpf" maxlength="14" value="{{ old('cpf', $metodoPagamento->cpf) }}">
                        </div>

                    </div>

                </div>

                <div class="posicionaBotaoSubmit">

                    {{-- <button type="submit" class="botaoAdicionar" id="botaoCancelar">Excluir forma de pagamento</button> --}}

                    <div class="agrupaVoltarSalvar">
                        <a href="{{ route('usuario.gerenciarPagamentos', ['id' => Auth::user()->id]) }}"
                            class="botaoAdicionar">Voltar</a>
                        <button type="submit" class="botaoAdicionar" style="margin-left: 0.1em">Salvar</button>
                    </div>

                </div>
            </form>
        </div>

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
