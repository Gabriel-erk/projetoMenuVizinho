@extends('admin.dashboard')
@section('conteudo')
    <div class="d-flex justify-content-between mt-3">
        <h2>Cadastrar Cartões</h2>
    </div>
    <hr>
    @if ($errors->any())
        <div class="boxError alert alert-danger">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('pagamentos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="user_id" class="form-label">ID Usuário</label>
            <input type="number" name="user_id" class="form-control" id="user_id" placeholder="ID do usuário"
                value="{{ old('user_id') }}" maxlength="4">
        </div>

        <div class="mb-3">
            <label for="numero_cartao" class="form-label">Número do cartão</label>
            <input type="text" name="numero_cartao" class="form-control" id="numero_cartao" placeholder="Número do cartão"
                value="{{ old('numero_cartao') }}" >
        </div>

        <div class="mb-3">
            <label for="cvv" class="form-label">CVV</label>
            <input type="number" name="cvv" class="form-control" id="cvv"
                value="{{ old('cvv') }}" maxlength="3" placeholder="CVV">
        </div>

        <div class="mb-3">
            <label for="data_vencimento" class="form-label">Data de vencimento</label>
            <input type="date" name="data_vencimento" class="form-control" id="data_vencimento"
                value="{{ old('data_vencimento') }}">
        </div>

        <div class="mb-3">
            <label for="nome_titular" class="form-label">Nome do titular</label>
            <input type="text" name="nome_titular" class="form-control" id="nome_titular"
                value="{{ old('nome_titular') }}" placeholder="Nome do titular">
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" class="form-control" id="cpf"
                value="{{ old('cpf') }}" maxlength="14" placeholder="CPF">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('cartao.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

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
            $('#numero_cartao').on('input', function() {
                this.value = mcc(this.value);
            });

            $('#cvv').on('input', function() {
                this.value = cvv(this.value);
            });

            $('#nome_titular').on('input', function() {
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
