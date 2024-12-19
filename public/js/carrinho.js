const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

function limparCarrinho() {
    fetch('{{ route("lista.limpar") }}', {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
    });
}

function removeItem(url, itemId) {
    fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                if (data.redirect) {
                    window.location.href = data.redirect; // Redireciona para a rota
                }
            }
        });
}

function addToCart(url, itemId) {
    fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                if (data.redirect) {
                    window.location.href = data.redirect; // Redireciona para a rota
                }
            }
        });
}

function confirmFinalizar() {
    const numeroCartaoElement = document.getElementById("pagamento");
    const idCartaoSelecionado = numeroCartaoElement.getAttribute(
        "data-id-cartao-selecionado"
    );

    if (!idCartaoSelecionado) {
        alert("Por favor, selecione um método de pagamento.");
        return false; //cancela o envio
    }

    const dadosCompra = {
        id_cartao: idCartaoSelecionado,
        // Aqui você pode adicionar outros dados, como o ID do cupom
    };

    fetch('{{ route("finalizar.compra") }}', {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
        },
        body: JSON.stringify(dadosCompra),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                alert("Compra finalizada com sucesso!");
                window.location.href = '{{ route("compra.concluida") }}';
            } else {
                alert("Erro ao finalizar compra. Tente novamente.");
            }
        })
        .catch((error) => {
            console.error("Erro:", error);
            alert("Ocorreu um erro ao processar sua compra.");
        });

    return false;

    // return confirm("Deseja finalizar a compra?");
}

function selecionarCupom(element) {
    const nomeCupom = element.getAttribute("data-nome-cupom");
    const valorDesconto = parseFloat(
        element.getAttribute("data-valor-desconto")
    );

    const nomeCupomElement = document.getElementById("nomeCupomSelecionado");
    if (nomeCupomElement) {
        nomeCupomElement.value = nomeCupom;
    } else {
        console.error("Elemento com ID 'nomeCupomSelecionado' não encontrado.");
    }

    const valorDescontoElement = document.getElementById("valorDescontoCupom");
    if (valorDescontoElement) {
        valorDescontoElement.innerText = valorDesconto
            .toFixed(2)
            .replace(".", ",");
    } else {
        console.error("Elemento com ID 'valorDescontoCupom' não encontrado.");
    }

    const subtotalElement = document.getElementById("subTotalCarrinho");
    if (subtotalElement) {
        // pegando o valor do atributo data-valor, que contém o valor do 'subtotal' e convertendo para float
        const subtotal = parseFloat(subtotalElement.getAttribute("data-valor"));
        const taxaEntrega = 5.0;
        let totalComDesconto = subtotal + taxaEntrega - valorDesconto;
        totalComDesconto = Math.max(totalComDesconto, 15);

        const totalCarrinhoElement = document.getElementById("totalCarrinho");
        if (totalCarrinhoElement) {
            totalCarrinhoElement.innerText = totalComDesconto
                .toFixed(2)
                .replace(".", ",");
        } else {
            console.error("Elemento com ID 'totalCarrinho' não encontrado.");
        }
    } else {
        console.error("Elemento com ID 'subtotalCarrinho' não encontrado.");
    }

    // Fecha o modal corretamente
    const modalElement = document.getElementById("modalCupom");
    const modalInstance = bootstrap.Modal.getInstance(modalElement);
    if (modalInstance) {
        modalInstance.hide();
    } else {
        console.error(
            "Modal com ID 'modalCupom' não encontrado ou não inicializado."
        );
    }
}

function selecionarCartao(element) {
    const numeroCartao = element.getAttribute("data-numero-cartao");
    const idCartao = element.getAttribute("data-id-cartao");

    const numeroCartaoElement = document.getElementById("pagamento");

    const idCartaoElement = element.getAttribute("data-id-cartao-selecionado");

    if (numeroCartaoElement) {
        numeroCartaoElement.value = numeroCartao;
        idCartaoElement.setAttribute("data-id-cartao-selecionado", idCartao);
    } else {
        console.error(
            "Elemento com ID 'numeroCartaoSelecionado' não encontrado."
        );
    }

    const modalElement = document.getElementById("modalPagamento");
    const modalInstance = bootstrap.Modal.getInstance(modalElement);

    if (modalInstance) {
        modalInstance.hide();
    } else {
        console.error(
            "Modal com ID 'modalPagamento' não encontrado ou não inicializado."
        );
    }
}
