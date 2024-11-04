// Seleciona o botão
const backToTopButton = document.getElementById('backToTop');

// window.onscroll = function() - determinando uma função (function()) para ser executada toda vez que o usuário scrollar a página (window.onscroll)
window.onscroll = function() {
    // Calcula 30% da altura total da página (se multiplicar por 0.4 é 40% da página) (scrollHeight = altura da página basicamente, pq até onde vc pode scrollar é até onde tem conteúdo)
    // document.documentElement.scrollHeight retorna a altura total da página, incluindo a parte que não é vista, multiplicando por 0.3, é obtido um valor em pixels, que corresponde a 30% da altura total da página, armazenando na constante scrollTrigger
    const scrollTrigger = document.documentElement.scrollHeight * 0.3;
    
    // Verifica a quantidade de rolagem da janela
    // document.documentElement.scrollTop retorna o número de pixels que a página foi rolada verticalmente
    // o if verifica se o valor de pixels que a página foi rolada é maior que scrollTrigger (que tem o valor de 30% da altura total da página), se for verdade, significa que o usuário rolou mais do que 30% da página, se rolou, mostre o botão, se não, continue escondido
    if (document.documentElement.scrollTop > scrollTrigger) {
        backToTopButton.style.display = "block";
    } else {
        backToTopButton.style.display = "none";
    }
};

// Função para rolar a página de volta ao topo, será chamada quando o botão com o id backToTop for clicado (pois ele chama a função)
function scrollToTop() {
    // método scrollTo serve para rolar a janela (ou a página) até a posição vertical top: 0 (que representa o topo da página), o parâmetro behavior: 'smooth' serve para rolagem ocorrer de maneira suave, em vez de abrupta
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
