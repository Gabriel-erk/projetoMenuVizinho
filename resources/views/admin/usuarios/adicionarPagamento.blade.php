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
        import CreditCardInputMask from "credit-card-input-mask";

        const formattedCreditCardInput = new CreditCardInputMask({
            element: document.querySelector("#numeroCartao"),
            pattern: "{{ 9999 }} {{ 9999 }} {{ 9999 }} {{ 9999 }}",
        });

        // $(document).ready(function() {
        //     $("#numeroCartao").inputmask("9999 9999 9999 9999"); // Formato de número de cartão de crédito
        // });
    </script>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
