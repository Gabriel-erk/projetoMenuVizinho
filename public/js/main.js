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

$(".agrupaBanner .owl-carousel").owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  dots: false,
  // autoplay: true, // Ativar o autoplay
  // autoplayTimeout: 3000, // Definir o intervalo de tempo em milissegundos (por exemplo, 3000ms = 3 segundos)
  autoplaySpeed: 900,
  responsive: {
    0: {
      items: 1,
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