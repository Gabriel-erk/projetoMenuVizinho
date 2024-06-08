$(".aproveiteTambem .owl-carousel").owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  dots: false,
  autoplay: true, // Ativar o autoplay
  autoplayTimeout: 3000, // Definir o intervalo de tempo em milissegundos (por exemplo, 3000ms = 3 segundos)
  autoplaySpeed: 900,
  responsive: {
    0: {
      items: 4,
    },
  },
});



$(".owl-carousel").owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  dots: false,
  autoplay: true, // Ativar o autoplay
  autoplayTimeout: 3000, // Definir o intervalo de tempo em milissegundos (por exemplo, 3000ms = 3 segundos)
  autoplaySpeed: 900,
  responsive: {
    0: {
      items: 1,
    },
  },
});



// definindo funcionalidade da barra lateral (menu-lateral), deixando-o funcional
document.addEventListener("DOMContentLoaded", function () {

  const iconeMenu = document.getElementById("iconeMenu");
  const fecharMenu = document.getElementById("fechar-menu");
  const menuLateral = document.getElementById("menuLateral");

  iconeMenu.addEventListener('click', function() {
    menuLateral.style.right = '0px';
    // menuLateral.style.display = 'block';
  })

  fecharMenu.addEventListener('click', function() {
    menuLateral.style.right = '-550px';
  })

});