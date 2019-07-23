$(document).ready(function () { // Je créer une fonction au chargement de la page
  var trigger = $('.hamburger'), // Je déclare mes variables
    overlay = $('.overlay'),
    isClosed = false;

  trigger.click(function () { // Je créer une fonction au click sur ma variable qui renverra une fonction créer plus bas
    hamburger_cross();
  });

  function hamburger_cross() { // je créer ma fonction 

    if (isClosed == true) { // je fais des conditions si ma variable définis à False est == true
      overlay.hide(); // on cache l'overlay
      trigger.removeClass('is-open'); // on retire la classe is-open
      trigger.addClass('is-closed'); // on ajoute la classe is-closed
      isClosed = false; // et on redefinis isclosed à false
    } else { // sinon
      overlay.show(); // on afficher l'overlay
      trigger.removeClass('is-closed'); // on remove la classe
      trigger.addClass('is-open'); // on ajoute la classe
      isClosed = true; // et on redefinis isclose à true
    }
  }

  $('[data-toggle="offcanvas"]').click(function () { // Je créer une fonction au click sur data-toggle
    $('#wrapper').toggleClass('toggled'); // je cible l'id, je toggle la casse toggled
  });
});

// fonction pour les popovers

$(function () {
  $('[data-toggle="popover"]').popover();
});
