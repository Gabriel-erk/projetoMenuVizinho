@extends('layouts.site')
<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

@section('conteudo')
    {{-- jQuerry --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  
    <!-- Inputmask JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.7-beta.16/jquery.inputmask.min.js"></script>

    <style>
        body {
            background-color: #fff;
        }

        .tituloEditUser {

            padding: 30px;
            border-bottom: 1px solid #CCCCCC;
            font-family: 'Poppins', sans-serif;

        }

        .tituloEditUser h2 {
            font-weight: 500;
        }

        .blocoNovoCartao {
            padding-left: 30px;
            padding-right: 80px;
        }

        /* formatação bloco1InfoCartão */

        .agrupaCampoCartao input {
            background-color: #F8F8F8;
            padding-top: 1.25rem;
            padding-left: 0.75rem;
        }

        .limitaLabel {
            position: relative;
        }

        .agrupaCampoCartao label {
            position: absolute;
            top: 1px;
            left: 1rem;
            font-size: 0.875rem;
            color: #8B8B8B;
            pointer-events: none;

            padding: 0 0.25rem;
        }
    </style>

    <div class="tituloEditUser">
        <h2>Adicionar um novo cartão</h2>
    </div>

    <div class="blocoNovoCartao">

        <div class="bloco1InfoCartao">

            <form action="" method="">

                <div class="mt-5 agrupaCampoCartao">

                    <div class="row ">

                        <div class="col limitaLabel"> <label for="numeroCartao" class="form-label">Número do cartão</label>
                            <input type="text" name="numeroCartao" id="numeroCartao" class="form-control">
                        </div>

                        <div class="col limitaLabel"><label for="cvv" class="form-label">CVV</label>
                            <input type="text" name="cvv" id="cvv" class="form-control">
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mt-3 limitaLabel"> <label for="dataVencimento" class="form-label">Data de
                                vencimento</label>
                            <input type="date" name="dataVencimento" id="dataVencimento" class="form-control">
                        </div>

                    </div>

                </div>

                <div class="agrupaCampoCartao mt-5">

                    <div class="row mb-3">

                        <div class="col limitaLabel"> <label for="nomeTitular" class="form-label">Nome do titular</label>
                            <input type="text" name="nomeTitular" id="nomeTitular" class="form-control">
                        </div>

                    </div>

                    <div class="row">

                        <div class="col limitaLabel"> <label for="cpf" class="form-label">CPF</label>
                            <input type="text" name="cpf" id="cpf" class="form-control">
                        </div>

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
            v = v.substring(0, 14); // Limita a 14 caracteres

            return v;
        }
    </script>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
