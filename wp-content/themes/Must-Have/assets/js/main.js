

$(document).ready(function(){
  var width = window.innerWidth;
  var resolucion = $( window ).width();
  
  if(resolucion <= 1000){
      cargarInclude = 0;
  }
  else{
    $('#collapseOne').addClass('show');
      cargarInclude = 1;
  }
});

let ubicationP = window.pageYOffset;
window.onscroll = function(){
  let ScrollA = window.pageYOffset;
  if(ubicationP >= ScrollA){
    document.getElementById('header').style.top = '0';
  }
  else{
    document.getElementById('header').style.top = '-120px';
  }
  ubicationP = ScrollA;
}



$(function () {
  'use strict'

  $('[data-toggle="offcanvas"]').on('click', function () {
    $('.offcanvas-collapse').toggleClass('open');
    $('body').toggleClass('over')
  })
})

$(function () {
  'use strict'

  $('.nav-link__mobile').on('click', function () {
    $('.offcanvas-collapse').removeClass('open')
    $('.hamburger').removeClass("is-active");
    $('body').removeClass("over");
  })
})

// menu hambuger

$(".hamburger").on("click", function () {
  if (!$(this).hasClass("is-active")) {
    $(this).addClass("is-active")
    $('.navbar-fixed-js').addClass('fixed');
    $('.hamburger-inner').addClass('js-hamburger');
    $('.nav-link').addClass('fixed-color');
  } else {
    $(this).removeClass("is-active")
    if ($(document).scrollTop() <= 70 && ($(window).width() >= 0)) {
      $('.navbar-fixed-js').removeClass('fixed');
      $('.hamburger-inner').removeClass('js-hamburger');
      $('.nav-link').removeClass('fixed-color');
    }
  }
});

$("#vistaList").on("click", function () {
    $(this).addClass("active");
    $('.main-listProducts__item').addClass('productList');
    $('#vistaCuadra').removeClass('active');
});
$("#vistaCuadra").on("click", function () {
  $(this).addClass("active");
  $('.main-listProducts__item').removeClass('productList');
  $('#vistaList').removeClass('active');
});



$(".navbar-buttonModal").on("click", function (){ 
    $('.hamburger-inner').addClass('js-hamburger');
    $('.modalNav').addClass('show');
    $('.hamburger-box').addClass('visible');
    $('.navbar-buttonModal__close').addClass("is-active"); 
});

$(".navbar-buttonModal__close").on("click", function (){ 
  $('.hamburger-inner').addClass('js-hamburger');
  $('.modalNav').removeClass('show');
  $('.hamburger-box').removeClass('visible');
  $(this).removeClass("is-active");
});

// Menú fixed
$(window).scroll(function () {
  if ($(document).scrollTop() > 70 && ($(window).width() >= 0)) {
    $('#header').addClass('fixed');
    $('.logoChange1').css('display','none');
    $('.logoChange2').css('display','block');
  } else {
    $('#header').removeClass('fixed');
    $('.logoChange2').css('display','none');
    $('.logoChange1').css('display','block');
  }
});

$('.woocommerce-noreviews').text('Aún no hay comentarios');
$(".form-row input[name='dokan_migration']").val('Conviértete en un vendedor');
